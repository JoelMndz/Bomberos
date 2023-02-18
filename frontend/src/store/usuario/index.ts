import {Module} from 'vuex';

import { IState } from "../index";
import { IUsuarioState,state } from "./state";
import { mutations } from "./mutations";
import { actions } from "./actions";
import { getters } from "./getters";



export const moduloUsuario:Module<IUsuarioState,IState> = {
  namespaced  : true,
  state,
  mutations,
  actions,
  getters
}