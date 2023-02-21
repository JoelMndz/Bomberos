import { Request, Response } from "express";
import services from "../services";
import { manejarError } from "../utils/manejarError";

export class UsuarioController{

  async getAll(req:Request, res:Response){
    try {
      const data = await services.UsuarioService.getAll();
      return res.json(data)
    } catch (error:any) {
      manejarError(error,res);
    }
  }

  async get(req:Request, res:Response){
    try {
      const {id} = req.params;
      const data = await services.UsuarioService.get(id);
      return res.json(data)
    } catch (error:any) {
      manejarError(error,res);
    }
  }

  async create(req:Request, res:Response){
    try {
      const data = await services.UsuarioService.create(req.body);
      return res.json(data)
    } catch (error:any) {
      manejarError(error,res);
    }
  }
}