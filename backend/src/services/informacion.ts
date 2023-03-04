import {connect} from '../database'

interface IInformacion{
  nombreEmpresa: string,
  nombreDepartamento: string,
  nombreCoronel: string,
  telefono: string,
  paginaWeb: string
}

export class InformacionService{
  static async get(){
    const db = connect();
    const data = await db.query('select * from configuracion_reportes') as any;
    await db.end();
    return data[0];
  }

  static async update(id:string, entity:IInformacion){
    let {nombreEmpresa,nombreDepartamento,nombreCoronel,telefono,paginaWeb} = entity;

    if(!id){
      throw new Error('El id es requerido!');
    }

    if (!nombreEmpresa) {
      throw new Error('El nombreEmpresa es requerido!');
    }
    if (!nombreDepartamento) {
      throw new Error('El nombreDepartamento es requerido!');
    }
    if(!nombreCoronel){
      throw new Error('El nombreCoronel es requerido!');
    }
    if(!telefono){
      throw new Error('El telefono es requerido!');
    }
    if(!paginaWeb){
      paginaWeb = '';
    }

    const db = connect();
    const sql = `
    update configuracion_reportes 
      set nombre_empresa='${nombreEmpresa}', 
        nombre_departamento='${nombreDepartamento}', 
        nombre_coronel='${nombreCoronel}',
        telefono='${telefono}',
        pagina_web='${paginaWeb}'
      where id = ${id}
    `;
    const data = await db.query(sql) as any;
    await db.end();
    return data[0];
  }
}