import { connect } from "../database";

export class UsuarioService{

  static async get(id:any){
    const db = connect();
    const result:any = await db.query(`select * from usuarios where id=${id}`);
    await db.end()
    return result[0].length ? result[0][0]:null;
  }

}