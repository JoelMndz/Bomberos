import {connect} from '../database'

interface ISolicitud{
  idLocal: number,
  idTipoInspeccion: number,
  idUsuario: number
}

export class SolicitudService{

  static async getAll() {
    const db = connect();
    const sql = `
      select 
        s.id,
        s.fecha_creacion,
        s.estado,
        s.id_usuario,
        s.id_local,
        s.id_tipo_inspeccion,
        l.nombre as local,
        concat(c.nombre,' ',c.apellidos) as contribuyente,
        t.descripcion as tipo_inspeccion
        from solicitudes as s
          inner join locales as l on s.id_local = l.id
          inner join contribuyentes as c on c.id = l.id_contribuyente
          inner join tipo_inspeccion as t on t.id = s.id_tipo_inspeccion
    `;
    const result:any = await db.query(sql);
    await db.end()
    return result[0];
  }

  static async create(entity:ISolicitud){
    if(!entity.idLocal){
      throw new Error('Debe enviar el idLocal');
    }
    if(!entity.idTipoInspeccion){
      throw new Error('Debe enviar el idTipoInspeccion');
    }
    if(!entity.idUsuario){
      throw new Error('Debe enviar el idUsuario');
    }
    const db = connect();
    const sql = `
      insert into solicitudes(id_usuario, id_tipo_inspeccion, id_local) 
        values(${entity.idUsuario},${entity.idTipoInspeccion},${entity.idLocal});
    `;
    const result:any = await db.query(sql);
    await db.end();
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