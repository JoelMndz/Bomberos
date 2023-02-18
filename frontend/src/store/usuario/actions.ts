import axios, { AxiosError, AxiosResponse } from 'axios';

import router from '@/router';
import { ActionTree } from 'vuex';
import { IState } from '../index';
import { IUsuarioState } from './state';

const API = process.env.VUE_APP_API;

export const actions:ActionTree<IUsuarioState, IState> = {

  async iniciarSesion({commit,dispatch}, {email, password}){
    try {
      await dispatch('moduloError/restablecerError',{},{root:true})
      await axios({
        method:'POST',
        url: `${API}/auth/login`,
        data:{
          email,
          password
        }
      })
      .then(async(x:AxiosResponse)=>{
        commit('setUsuario',x.data)
        localStorage.setItem('tokenBomberos', x.data.token)
        //await router.push('/dashboard')
      })
      .catch(async(x:AxiosError)=>{
        await dispatch('moduloError/asignarError',x.response?.data, {root:true})
      })
    } catch (error) {
      console.log(error);      
    }
  },

  cerrarSesion({commit}){
    commit('setUsuario', {});
    localStorage.removeItem('tokenBomberos');
    router.push('/');
  },

  async iniciarSesionConToken({commit}){
    try {
      const token = localStorage.getItem('tokenBomberos');
      if (token) {
        await axios({
          method:'PUT',
          url: `${API}/auth/login-con-token`,
          data:{
            token
          }
        })
        .then((x:AxiosResponse)=>{
          commit('setUsuario',x.data)
        })
        .catch((x:AxiosError)=>{
          console.log(x);          
          localStorage.removeItem('tokenBomberos')
          router.push('/login')
        })
      }
    } catch (error) {
      console.log(error);      
    }
  },

}