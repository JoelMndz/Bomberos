import {connect} from '../database'

export class SolicitudService{

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
      c.StrTelefono as telefono
      from tblsolicitud as s
      inner join tbllocal as l on l.IntIdLocal = s.IntIdLocal
      inner join tblcontribuyente as c on c.IntIdContribuyente = l.IntIdContribuyente
      inner join tblparroquia as p on p.IntIdParroquia = l.IntIdParroquia
      left join tblinspeccion as i on i.IntIdSolicitud = s.IntIdSolicitud
      where i.IntIdSolicitud is null
    `;
    const result:any = await db.query(sql);
    await db.end()
    return result[0];
  }

  async getAll() {
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
      c.StrTelefono as telefono
      from tblsolicitud as s
      inner join tbllocal as l on l.IntIdLocal = s.IntIdLocal
      inner join tblcontribuyente as c on c.IntIdContribuyente = l.IntIdContribuyente
      inner join tblparroquia as p on p.IntIdParroquia = l.IntIdParroquia
    `;
    const result:any = await db.query(sql);
    await db.end()
    return result[0];
  }

  async delete(id:any){
    const db = connect();
    const sql = `delete from tblsolicitud where IntIdSolicitud=${id}`;
    const result:any = await db.query(sql);
    await db.end()
    return result[0];
  }

}