import jwt from 'jsonwebtoken'
import config from '../config'


export function generateToken(id:any){
  const token = jwt.sign(
    {id},
    config.SECRET!,
    {expiresIn:'30d'});

  return token;
}
