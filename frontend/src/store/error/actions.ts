import { ActionTree } from 'vuex';
import { IState } from '..';
import { IErrorState } from './state';

export const actions:ActionTree<IErrorState, IState> = {
  restablecerError({commit}) {
    commit('setError',{});
  },
  asignarError({commit}, error){
    commit('setError',error)
  }
} 