
<template>
  <b-navbar toggleable="lg" type="dark" variant="dark">
    <b-navbar-brand href="#" class="ml-10 text-navbar">Página de cadastro</b-navbar-brand>

    <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

    <b-collapse id="nav-collapse" is-nav>
      <!-- Right aligned nav items -->
      <b-navbar-nav class="ml-auto">
        <b-navbar-nav class="mr-10">
          <b-nav-item href="#" class="text-navbar" @click="$bvModal.show('bv-modal-example')">Novo cadastro</b-nav-item>
        </b-navbar-nav>
      </b-navbar-nav>
    </b-collapse>
  </b-navbar>
</template>

