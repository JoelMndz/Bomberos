import { NextFunction, Request, Response } from 'express';
import jwt from 'jsonwebtoken';

import config from '../config';
import { UsuarioService } from '../services/usuario';


export async function verifyToken(req:Request, res:Response, next:NextFunction){
  try {
    const token:any = req.headers['token'];
    if(!token){
      const error = new Error();
      error.message = 'No ha enviado el token';
      throw error;
    }

    const decode:any = jwt.verify(token, config.SECRET!);
    
    const usuario = await UsuarioService.get(decode.id);
    if(!usuario){
      const error = new Error();
      error.message = 'Token invalido';
      throw error;
    }

    req.body = {
      ...req.body,
      "id": usuario.id,
      "idRol": usuario.id_rol
    }
    next();
  } catch (error:any) {
    res.status(400).json({error:error.message});
  }

}

export async function verificarTokenAdmin(req:Request, res:Response, next:NextFunction){
  try {
    const token:any = req.headers['token'];
    if(!token){
      const error = new Error();
      error.message = 'No ha enviado el token';
      throw error;
    }

    const decode:any = jwt.verify(token, config.SECRET!);
    
    const usuario = await UsuarioService.get(decode.id);
    if(!usuario){
      const error = new Error();
      error.message = 'Token invalido';
      throw error;
    }

    if(usuario.id != 1){
      throw new Error('Permiso denegado!')
    }
    
    next();
  } catch (error:any) {
    res.status(400).json({error:error.message});
  }

}