import {connect} from '../database'
import moment from 'moment';

export class InspeccionService{
  async getAll() {
    const db = connect();
    const sql = `
    select 
    i.id,
      i.fecha_creacion,
      i.aprobacion,
      i.observacion,
      l.nombre as local,
      concat(c.nombre,' ',c.apellidos) as contribuyente,
      l.calle_principal,
      l.calle_secundaria,
      l.referencia,
      p.descripcion as parroquia
    from inspecciones as i
      inner join solicitudes as s on s.id = i.id_solicitud
      inner join locales as l on s.id_local = l.id
      inner join contribuyentes as c on c.id = l.id_contribuyente
      inner join parroquias as p on p.id = l.id_parroquia;
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
    let sql = `
      select max(IntIdInspeccion) as maximo from tblinspeccion`;
    let result:any = await db.query(sql);
    let idInspeccion = result[0][0]['maximo'] == null ? 1:1+result[0][0]['maximo']
    
    sql = `
      insert into tblinspeccion(IntIdInspeccion,IntCodigoInspeccion,IntIdSolicitud,StrAprovacion) value
      (
        ${idInspeccion},
        ${idInspeccion},
        ${entity.idSolicitud},
        'N/A'
      )
    `;
    result = await db.query(sql);
    await db.end()
    return result[0];
  }

  async updateState(entity:any){
    const db = connect();
    if(!entity.id || !entity.aprobacion || !entity.observacion){
      throw new Error('Debe enviar el id, aprobacion, observacion');
    }
    let sql = `update inspecciones set aprobacion='${entity.aprobacion}', observacion='${entity.observacion}' where id=${entity.id}`;
    let data = await db.query(sql);
    await db.end()
    return data[0];
  }
}