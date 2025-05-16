<template>
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Apellido_p</th>
              <th>Apellido_m</th>
              <th>Telefono</th>
              <th>Puesto</th>
              <th>Empresa</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <tr v-for="(prod, i) in empleados" :key="prod.id">
              <td>{{ (i + 1) }}</td>
              <td>{{ prod.nombre }}</td>
              <td>{{ prod.apellido_p }}</td>
              <td>{{ prod.apellido_m }}</td>
              <td>{{ prod.telefono }}</td>
              <td>{{ prod.puesto }}</td>
              <td>{{ prod.empresa }}</td>
              <td>
                <router-link :to="{ path: 'edit/' + prod.id }" class="btn btn-warning">
                  <i class="fa-solid fa-edit"></i>
                </router-link>
                &nbsp;
                <button class="btn btn-danger" @click="eliminar(prod.id, prod.nombre)">
                  <i class="fa-regular fa-thumbs-down" style="color: #000000;"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { confirmar } from '../funciones';
export default{
  data(){
    return{ empleados:null }
  },
  mounted(){
    this.getEmpleados();
  },
  methods:{
    getEmpleados(){
      axios.get('http://127.0.0.1:8000/api/empleados').then(
        response => (
          this.empleados = response.data
        )
      );
    },
    eliminar(id,nombre){
      confirmar(id,nombre);
    }
  }
}
</script>
