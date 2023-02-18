<template>
  <v-container fluid class="fill-height contenedor">
     <v-row  justify="center">
      <v-col cols="9" sm="6" md="4">
        <v-card 
          elevation="5">
          <v-row justify="center">
            <v-col cols="auto">
              <v-img
                src="@/assets/escudo.png"
                height="150px"
                width="150px"
                cover
              ></v-img>
            </v-col>
          </v-row>
            <v-row justify="center">
              <v-col cols="auto" class="pa-0">
                <h3 class="titulo">Bomberos de Azogues</h3>
              </v-col>
            </v-row>
            <v-row justify="center">
              <v-col cols="auto">
                <h3 class="titulo mt-6">¡Bienvenido!</h3>
              </v-col>
            </v-row>
          <v-card-text>
            <p>Ingrese correo y contraseña para iniciar sesión</p>
            <v-form
              @submit.prevent ="procesar"
              v-model="datosValidos">
              <v-text-field
                v-model="usuario.email"
                label="Email"
                :rules="rules.emailRules"
                required
                solo
              ></v-text-field>

              <v-text-field
                v-model="usuario.password"
                label="Contraseña"
                class="mb-2"
                :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                :type="show ? 'text' : 'password'"
                :rules="rules.passwordRules"
                counter
                @click:append="show = !show"
                solo
              ></v-text-field>

              <v-checkbox
                v-model="custom"
                label="Recuerdame"
              ></v-checkbox>
            
              <v-btn 
                class="white--text inicio" 
                large block rounded 
                type="submit"
                color="blue"
                :loading="cargando"
                
              >INICIAR SESIÓN</v-btn>
            </v-form>
          </v-card-text>
          <v-card-actions>
            <router-link class="mx-2" to="/">
              Recuperar contraseña
            </router-link>
            <v-spacer></v-spacer>
            <router-link class="mx-2" to="/">
              Registrarse
            </router-link>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script lang="ts">
import Vue from 'vue'
export default Vue.extend({
  
  data:()=>{
    return{
      show:false,
      rules:{
        emailRules:[
          (v:string) => !!v || 'El email requerido',
          (v:string) => /.+@.+\..+/.test(v) || 'El email debe ser valido',
        ],
        passwordRules:[
          (v:string) => !!v || 'La contraseña es requerida',
          (v:string) => v.length >= 8 || 'Mínimo 8 caracteres'
        ]
      },
      usuario:{
        email:'',
        password:''
      },
      cargando: false,
      datosValidos: false,
    }
  }
})
</script>

<style>
  .contenedor{
    background: rgb(77, 69, 69);
  }

  .titulo{
    color: #dc3545;
    font-weight: 500;
    line-height: 1.2;
    font-size: 24px;
  }

.inicio {
    display: block;
    width: 100%;
    height: 50px;
    border-radius: 50px;
    outline: none;
    border: none;
    background-image: linear-gradient(to right, #dc3545, #0d6efd, #dc3545);
    background-size: 200%;
    font-size: 1.2rem;
    color: rgb(255, 255, 255);
    font-family: 'Poppins', sans-serif;
    text-transform: uppercase;
    margin: 1rem 0;
    cursor: pointer;
    transition: .5s;
}

.inicio:hover {
    background-position: right;
}

</style>