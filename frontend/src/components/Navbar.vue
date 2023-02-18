<template>
  <v-app-bar 
    v-if="usuario.token"
    app>
      <v-toolbar-title>
        <router-link to="/dashboard" class="text-decoration-none text-h6 text--primary">
          {{nombreApp}}
        </router-link>
      </v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn
        text
        color="red"
        @click="cerrarSesion()"
      >
        <span>Salir</span>
      </v-btn>
    </v-app-bar>
</template>

<script lang="ts">
import Vue from 'vue'
import {mapGetters, mapActions} from 'vuex'

export default Vue.extend({
  name:'Navbar',
  data: () => {
    return{
      nombreApp: 'Bomberos'
    }
  },
  methods:{
    ...mapActions('moduloUsuario',['cerrarSesion']),
  },
  computed:{
    ...mapGetters('moduloUsuario',['usuario'])
  }
})
</script>