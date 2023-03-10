import {connect} from '../database'
import moment from 'moment';

export class InspeccionService{
  async getAll() {
    const db = connect();
    const sql = `
      
    `;
    const data = await db.query(sql);
    await db.end()
    return data[0];
  }

  async getAllPending() {
    const db = connect();
    const sql = `
      select
      s.IntIdSolicitud as id_solicitud,
      s.DateFecha as fecha,
      l.StrNombreLocal as local,
      l.StrCallePrincipal as calle_principal,
      l.StrCalleSecundaria as calle_secundaria,
      l.StringNCasa as numero_casa,
      l.StringReferencia as referencia,
      p.StrNombreParroquia as parroquia,
      concat(c.StrNombreContribuyente,' ',c.StrApellidosContribuyente) as contribuyente,
      c.StrNIdentidad as identidad,
      c.StrTelefono as telefono,
      i.IntIdInspeccion as id_inspeccion
      from tblsolicitud as s
      inner join tbllocal as l on l.IntIdLocal = s.IntIdLocal
      inner join tblcontribuyente as c on c.IntIdContribuyente = l.IntIdContribuyente
      inner join tblparroquia as p on p.IntIdParroquia = l.IntIdParroquia
      inner join tblinspeccion as i on i.IntIdSolicitud = s.IntIdSolicitud
      where i.StrAprovacion='N/A'`;
    const data = await db.query(sql);
    await db.end()
    return data[0];
  }

  async create(entity:any){
    const db = connect();
    const sql = `
      
    `;
    const result = await db.query(sql);
    await db.end();
    return result[0];
  }

  async updateState(entity:any){
    const db = connect();
    if(!entity.state){
      throw new Error('Debe enviar el estado (state)');
    }
    if(!entity.description){
      throw new Error('Debe enviar la descripcion (description)');
    }
    let sql = `update tblinspeccion set DateFecha='${moment().format("YYYY-MM-DD")}', StrAprovacion='${entity.state.toUpperCase()}' where IntIdInspeccion=${entity.id}`;
    let data = await db.query(sql);
    sql = `
      insert into tblobservaciones(IntIdInspeccion,StrDescripcion) 
      values(${entity.id},'${entity.description}')`
    data = await db.query(sql);
    await db.end()
    return data[0];
  }
}