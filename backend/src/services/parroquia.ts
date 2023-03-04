import {connect} from '../database'


export class ParroquiaService{
  static async getAll(){
    const db = connect();
    const data = await db.query('select * from parroquias') as any;
    await db.end();
    return data[0];
  }
}