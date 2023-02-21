import { connect } from "../database";

export class RangoService{
  static async getAll(){
    const db = connect();
    const sql = 'select * from rangos';
    const data =  await db.query(sql);
    await db.end();
    return data[0];
  }
}