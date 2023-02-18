import {Response} from 'express'

export const manejarError = (error:any, res:Response)=>{
  res.status(400).json({
    message: error.message ?? 'Error en el servidor!'
  });
}