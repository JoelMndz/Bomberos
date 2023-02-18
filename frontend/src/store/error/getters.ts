import {GetterTree} from 'vuex'
import { IState } from '..'
import { IErrorState } from './state'

export const getters:GetterTree<IErrorState,IState> = {
  error(state){
    return state.error
  }
}