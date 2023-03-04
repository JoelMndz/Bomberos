import { Request, Response } from "express";
import services from "../services";

export class InformacionController{

  static async get(req:Request, res:Response) {
    try {
      const data = await services.InformacionService.get();
      res.json(data);
    } catch (error:any) {
      res.status(400).json({error:error.message});
    }
  }

  static async update(req:Request, res:Response) {
    try {
      const {id} = req.params;
      const data = await services.InformacionService.update(id, req.body);
      res.json(data);
    } catch (error:any) {
      res.status(400).json({error:error.message});
    }
  }
}