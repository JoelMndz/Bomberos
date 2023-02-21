import { connect } from "../database";

interface IUser{
  identificacion: string,
  nombre: string,
  apellidos: string,
  direccion: string,
  telefono: string,
  email: string,
  password: string,
  fechaNacimiento: string, 
  idRol: number, 
  idRango: number
}

export class UsuarioService{

  static async getAll(){
    const db = connect();
    const result:any = await db.query(`select * from usuarios`);
    await db.end()
    const data = result[0];

    data.map((x:any) => {
      delete x.password;
      return x;
    })

    return data;
  }

  static async get(id:any){
    const db = connect();
    const result:any = await db.query(`select * from usuarios where id=${id}`);
    await db.end()
    if(result[0].length == 0){
      throw new Error('Usuario no encontrado!');
    }
    const data = result[0][0];
    delete data.password;
    return data;
  }

  static async create(entity:IUser){
    if(!entity.identificacion){
      throw new Error('Debe enviar la identificacion');
    }
    if(!entity.nombre){
      throw new Error('Debe enviar el nombre');
    }
    if(!entity.apellidos){
      throw new Error('Debe enviar los apellidos');
    }
    if(!entity.direccion){
      throw new Error('Debe enviar la direccion');
    }
    if(!entity.telefono){
      throw new Error('Debe enviar el telefono');
    }
    if(!entity.email){
      throw new Error('Debe enviar el email');
    }
    if(!entity.password){
      throw new Error('Debe enviar el password');
    }
    if(!entity.fechaNacimiento){
      throw new Error('Debe enviar la fechaNacimiento');
    }
    if(!entity.idRango){
      throw new Error('Debe enviar el idRango');
    }
    if(!entity.idRol){
      throw new Error('Debe enviar el idRol');
    }
    const db = connect();
    const sql = `insert into usuarios(identificacion,nombre,apellidos,direccion,telefono,email,password,fecha_nacimiento,id_rol,id_rango)
                  values('${entity.identificacion}','${entity.nombre}','${entity.apellidos}','${entity.direccion}','${entity.telefono}','${entity.email}','${entity.password}','${entity.fechaNacimiento}',${entity.idRol},${entity.idRango})`
    const result:any = await db.query(sql);
    await db.end()
    return entity;
  }

}