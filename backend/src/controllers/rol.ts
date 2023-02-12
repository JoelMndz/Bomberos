import { Request, Response } from "express";

import services from '../services'

export class RolController{

  static async getAll(req:Request, res:Response){
    try {
      const data = await services.RolService.getAll();
      res.json(data);
    } catch (error:any) {
      res.status(400).json({error:error.message});
    }
  }
}