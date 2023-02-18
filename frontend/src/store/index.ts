import Vue from "vue";
import Vuex from 'vuex'
import { IErrorState } from './error/state';
import { IUsuarioState } from './usuario/state';
import {moduloUsuario} from './usuario'
import {moduloError} from './error'

Vue.use(Vuex);

export interface IState{
  moduloUsuario: IUsuarioState,
  moduloError: IErrorState
}

export default new Vuex.Store<IState>({
  modules:{
    moduloUsuario,
    moduloError
  }
});
