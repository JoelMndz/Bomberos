import { GetterTree } from 'vuex';
import { IState } from '..';
import { IUsuarioState } from './state';

export const getters: GetterTree<IUsuarioState, IState> = {
  usuario(state){
    return state.usuario
  }
}