<template>
  <div>
    <h2>Empleados</h2>
    <form @submit.prevent="handleSubmit">
      <input v-model="form.first_name" placeholder="Nombre" required />
      <input v-model="form.last_name" placeholder="Apellido" required />
      <input v-model="form.email" placeholder="Email" required />
      <input v-model="form.phone" placeholder="Teléfono" />
      <input v-model="form.position" placeholder="Cargo" />
      <button>{{ editMode ? 'Actualizar' : 'Crear' }}</button>
      <button v-if="editMode" @click.prevent="resetForm">Cancelar</button>
    </form>

    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Email</th>
          <th>Teléfono</th>
          <th>Cargo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="emp in employees" :key="emp.id">
          <td>{{ emp.first_name }} {{ emp.last_name }}</td>
          <td>{{ emp.email }}</td>
          <td>{{ emp.phone }}</td>
          <td>{{ emp.position }}</td>
          <td>
            <button @click="editEmployee(emp)">Editar</button>
            <button @click="deleteEmployee(emp.id)">Eliminar</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const API = 'http://localhost:8000/api/employees'

const employees = ref([])
const form = ref({
  id: null,
  first_name: '',
  last_name: '',
  email: '',
  phone: '',
  position: ''
})
const editMode = ref(false)

const getEmployees = async () => {
  const res = await axios.get(API)
  employees.value = res.data
}

const handleSubmit = async () => {
  if (editMode.value) {
    await axios.put(`${API}/${form.value.id}`, form.value)
  } else {
    await axios.post(API, form.value)
  }
  resetForm()
  getEmployees()
}

const editEmployee = (emp) => {
  form.value = { ...emp }
  editMode.value = true
}

const deleteEmployee = async (id) => {
  await axios.delete(`${API}/${id}`)
  getEmployees()
}

const resetForm = () => {
  form.value = {
    id: null,
    first_name: '',
    last_name: '',
    email: '',
    phone: '',
    position: ''
  }
  editMode.value = false
}

onMounted(getEmployees)
</script>

<style scoped>
form {
  margin-bottom: 20px;
}
input {
  margin: 4px;
}
table {
  width: 100%;
  border-collapse: collapse;
}
th, td {
  padding: 8px;
  border: 1px solid #ccc;
}
</style>

