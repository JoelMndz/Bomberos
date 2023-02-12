import {createPool} from 'mysql2/promise'

export function connect(){
  const connection = createPool({
    host:'localhost',
    user:'root',
    password:'admin',
    database:'db_bomberos',
    connectionLimit: 10
  });
  return connection;
}