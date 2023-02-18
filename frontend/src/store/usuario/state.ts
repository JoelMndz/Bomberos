export interface IUsuarioState {
  usuario: {
    id?: string,
    identificacion?:string,
    nombre?: string,
    apellidos?: string,
    telefono?: string,
    email?: string,
    id_rol?: number,
    id_rango?: number,
    fechaCreacion?: Date,
    token?: string
  };
}

export function state(): IUsuarioState{
  return {
      usuario: {}
  }
}
