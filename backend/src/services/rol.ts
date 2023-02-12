import { connect } from "../database";

export class RolService{
  static async getAll(){
    const db = connect();
    const sql = 'select * from roles';
    const data =  await db.query(sql);
    await db.end();
    return data[0];
  }
}