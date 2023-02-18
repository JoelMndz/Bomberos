import {Module} from 'vuex';

import { IState } from "../index";
import { IErrorState,state } from "./state";
import { mutations } from "./mutations";
import { actions } from "./actions";
import { getters } from "./getters";



export const moduloError:Module<IErrorState,IState> = {
  namespaced  : true,
  state,
  mutations,
  actions,
  getters
}