import {connect} from '../database'

interface IContribuyente{
  identificacion: string,
  nombre: string,
  apellidos: string,
  direccion: string,
  telefono: string,
  email: string,
  fechaNacimiento: string,
  discapacidad: string
}

export class ContribuyenteService{
  static async getAll(){
    const db = connect();
    const data = await db.query('select * from contribuyentes') as any;
    await db.end();
    return data[0];
  }

  static async create(entity:IContribuyente){
    if(!entity.identificacion){
      throw new Error('La identificacion es requerida!');
    }
    if(!entity.nombre){
      throw new Error('El nombre es requerido!');
    }
    if(!entity.apellidos){
      throw new Error('Los apellidos son requeridos!');
    }
    if(!entity.direccion){
      throw new Error('La direccion es requerida!');
    }
    if(!entity.telefono){
      throw new Error('El telefono es requerido!');
    }
    if(!entity.email){
      throw new Error('El email es requerido!');
    }
    if(!entity.fechaNacimiento){
      throw new Error('La fechaNacimiento es requerida!');
    }
    if(!entity.discapacidad){
      throw new Error('La discapacidad es requerida!');
    }
    
    const db = connect();
    const {identificacion,nombre,apellidos,direccion,telefono,email,fechaNacimiento,discapacidad} = entity;
    const sql = `
    insert into contribuyentes(identificacion,nombre,apellidos,direccion,telefono,email,fecha_nacimiento,discapacidad) 
    values('${identificacion}','${nombre}','${apellidos}','${direccion}','${telefono}','${email}','${fechaNacimiento}','${discapacidad}');
    `;
    const data = await db.query(sql) as any;
    await db.end();
    return entity;
  }
}