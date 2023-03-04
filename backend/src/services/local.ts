import {connect} from '../database'

interface ILocal{
  nombre: string,
  callePrincipal: string,
  calleSecundaria: string,
  numeroCasa: string,
  referencia: string,
  idParroquia: number,
  idContribuyente: number
}

export class LocalService{
  static async getAll(){
    const db = connect();
    const sql = `
      select
        l.id,
        l.nombre,
        l.calle_principal,
        l.calle_secundaria,
        l.numero_casa,
        l.referencia,
        l.id_parroquia,
        l.id_contribuyente,
        p.descripcion as nombre_parroquia,
        concat(c.nombre, ' ', c.apellidos) as nombre_contribuyente
        from locales as l
        inner join parroquias as p on p.id = l.id_parroquia
        inner join contribuyentes as c on c.id = l.id_contribuyente;
    `;
    const data = await db.query(sql) as any;
    await db.end();
    return data[0];
  }

  static async create(entity:ILocal){
    const {nombre,callePrincipal,calleSecundaria,idContribuyente,idParroquia,numeroCasa,referencia} = entity;
    if(!nombre){
      throw new Error('El nombre es requerido!');
    }
    if(!callePrincipal){
      throw new Error('La callePrincipal es requerida!');
    }
    if(!calleSecundaria){
      throw new Error('La calleSecundaria es requerida!');
    }
    if(!referencia){
      throw new Error('La referencia es requerida!');
    }
    if(!numeroCasa){
      throw new Error('El numeroCasa es requerido!');
    }
    if(!idContribuyente){
      throw new Error('El idContribuyente es requerido!');
    }
    if(!idParroquia){
      throw new Error('El idParroquia es requerido!');
    }
    
    const db = connect();
    const sql = `
    insert into locales(nombre,calle_principal,calle_secundaria,numero_casa,referencia,id_parroquia,id_contribuyente)
	  values('${nombre}','${callePrincipal}','${calleSecundaria}','${numeroCasa}','${referencia}',${idParroquia},${idContribuyente});
    `;
    const data = await db.query(sql) as any;
    await db.end();
    return entity;
  }

  static async delete(id:string){
    const db = connect();
    const sql = `delete from locales where id=${id};`
    const data = await db.query(sql) as any;
    await db.end();
    return data[0];
  }
}