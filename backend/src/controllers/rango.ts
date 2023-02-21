import { Request, Response } from "express";

import services from '../services'

export class RangoController{

  static async getAll(req:Request, res:Response){
    try {
      const data = await services.RangoService.getAll();
      res.json(data);
    } catch (error:any) {
      res.status(400).json({error:error.message});
    }
  }
}