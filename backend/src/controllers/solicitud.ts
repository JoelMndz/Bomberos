import { Request, Response } from "express";
import services from "../services";

const solicitudService = new services.SolicitudService;

export class SolicitudController{
  async getAll(req:Request, res:Response){
    try {
      const data = await solicitudService.getAll();
      return res.json({data})
    } catch (error:any) {
      res.json({error:error.message});
    }
  }
  
  async getAllPending(req:Request, res:Response){
    try {
      const data = await solicitudService.getAllPending();
      return res.json({data})
    } catch (error:any) {
      res.json({error:error.message});
    }
  }

  async delete(req:Request, res:Response){
    try {
      const {id} = req.params;
      const data = await solicitudService.delete(id);
      return res.json({data})
    } catch (error:any) {
      res.json({error:error.message});
    }
  }
}