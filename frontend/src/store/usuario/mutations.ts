import { MutationTree } from 'vuex';
import { IUsuarioState } from './state';

export const mutations: MutationTree<IUsuarioState>={
  setUsuario(state, payload){
    state.usuario = payload
  }
}