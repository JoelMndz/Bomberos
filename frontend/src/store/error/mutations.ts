import { MutationTree } from 'vuex';
import { IErrorState } from './state';

export const mutations: MutationTree<IErrorState>={
  setError(state, payload){
    state.error = payload
  }
}