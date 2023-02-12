import {connect} from '../database'

export class InformacionService{
  static async get(){
    const db = connect();
    const data = await db.query('select * from configuracion_reportes') as any;
    await db.end();
    return data[0];
  }
}