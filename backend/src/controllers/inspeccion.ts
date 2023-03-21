import { Request, Response } from "express";
import services from "../services";

const inspeccionService = new services.InspeccionService();

export class InspeccionController{
  async getAll(req:Request, res:Response){
    try {
      const data = await inspeccionService.getAll();
      return res.json(data)
    } catch (error:any) {
      res.json({error:error.message});
    }
  }

  async getAllPending(req:Request, res:Response){
    try {
      const data = await inspeccionService.getAllPending();
      return res.json({data})
    } catch (error:any) {
      res.json({error:error.message});
    }
  }

  async create(req:Request, res:Response){
    try {
      const data = await inspeccionService.create(req.body);
      return res.json({data})
    } catch (error:any) {
      res.json({error:error.message});
    }
  }

  async updateState(req:Request, res:Response){
    try {
      const body = {
        id: req.params.id,
        aprobacion: req.body.aprobacion,
        observacion: req.body.observacion
      }      
      const data = await inspeccionService.updateState(body);
      return res.json({data})
    } catch (error:any) {
      res.json({error:error.message});
    }
  }
}