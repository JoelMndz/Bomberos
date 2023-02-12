import {connect} from '../database'

export class TipoInspeccionService{

  async getAll(){
    const db = connect();
    const data = await db.query(`select * from tipo_inspeccion`);
    await db.end();
    return data;
  }
}