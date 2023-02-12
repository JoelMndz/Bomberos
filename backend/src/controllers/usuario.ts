import { Request, Response } from "express";
import services from "../services";

export class UsuarioController{

  async get(req:Request, res:Response){
    try {
      const {id} = req.body;
      const data = await services.UsuarioService.get(id);
      return res.json({data})
    } catch (error:any) {
      res.json({error:error.message});
    }
  }
}