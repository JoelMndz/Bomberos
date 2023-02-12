import {connect} from '../database'
import { generateToken } from '../utils/generateToken';

export class AuthService{
  static async login(entity:any){
    if(!entity.email){
      const error = new Error('Debe enviar el email!');
      throw error;
    }
    if(!entity.password){
      const error = new Error('Debe enviar el password!');
      throw error;
    }

    const db = connect();
    const result:any = await db.query(`select * from usuarios 
      where email='${entity.email}' and password='${entity.password}'`);
      
    if(result[0].length == 0){
      const error = new Error('Credenciales incorrectas!');
      throw error;
    }

    let usuario:any = result[0][0]
    usuario.token = generateToken(usuario['id']);
    await db.end()
    return usuario;
  }

  static async registrar(entidad:{
    nombres:string,
    apellidos: string,
    direccion: string,
    telefono: string,
    email: string,
    fecha_nacimiento: string
    id_rol: number,
    id_rango: number
  }){

    const {nombres,apellidos,direccion,telefono,email,fecha_nacimiento,id_rol,id_rango} = entidad;

    if(!nombres){
      throw new Error('Los nombres son requeridos!');
    }
    if(!apellidos){
      throw new Error('Los apellidos son requeridos!');
    }
    if(!direccion){
      throw new Error('La dirección es requerida!');
    }
    if(!telefono){
      throw new Error('El telefono es requerido!');
    }
    if(!email){
      throw new Error('El email es requerido!');
    }
    if(!fecha_nacimiento){
      throw new Error('La fecha_nacimiento es requerida!');
    }
    if(!id_rol){
      throw new Error('El id_rol es requerido!');
    }
    if(!id_rango){
      throw new Error('El id_rango es requerido!');
    }
  
    const db = connect();
    const sql = `insert into usuarios(nombre,apellidos,direccion,telefono,email,fecha_nacimiento,password,id_rol,id_rango)
    values('${nombres}','${apellidos}','${direccion}','${telefono}','${email}','${fecha_nacimiento}','12345678','${id_rol}','${id_rango}')`;

    await db.query(sql)
    await db.end();

    return entidad;
  }
}