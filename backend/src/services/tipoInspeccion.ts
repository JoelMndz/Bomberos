import {connect} from '../database'

interface IEntity{
  descripcion: string,
  valor: number
}

export class TipoInspeccionService{

  static async getAll(){
    const db = connect();
    const data = await db.query(`select * from tipo_inspeccion`);
    await db.end();
    return data[0];
  }

  static async create(entity:IEntity){
    const {descripcion, valor} = entity;
    if(!descripcion){
      throw new Error('La descripcion es requerida!');
    }
    if(!valor){
      throw new Error('El valor es requerido!');
    }

    const db = connect();
    const sql = `
      insert into tipo_inspeccion(descripcion, valor) 
        values('${descripcion}', ${valor});
    `;
    const data = await db.query(sql);
    await db.end();
    return entity;
  }

  static async delete(id: string){
    const db = connect();
    const sql = `
      delete from tipo_inspeccion where id=${id};
    `;
    const data = await db.query(sql);
    await db.end();
    return data;
  }
}