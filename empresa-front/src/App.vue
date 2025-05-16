<template>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Empleados</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <router-link to="/create" class="nav-link active" aria-current="page" href="#">Crear</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/" class="nav-link" href="#">Mostrar</router-link>
        </li>
      </ul>
    </div>
  </div>
</nav>

<nav>
  <div class="container-fluid">
    <router-view/>
  </div>
</nav>

</template>


