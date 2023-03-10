import { Request, Response } from "express";
import services from "../services";
import { manejarError } from "../utils/manejarError";

export class TipoInspeccionController{
  static async getAll(req:Request, res:Response) {
    try {
      const data = await services.TipoInspeccionService.getAll();
      res.json(data);
    } catch (error:any) {
      manejarError(error,res);
    }
  }

  static async create(req:Request, res:Response) {
    try {
      const data = await services.TipoInspeccionService.create(req.body);
      res.json(data);
    } catch (error:any) {
      manejarError(error,res);
    }
  }

  static async delete(req:Request, res:Response) {
    try {
      const {id} = req.params;
      const data = await services.TipoInspeccionService.delete(id);
      res.json(data);
    } catch (error:any) {
      manejarError(error,res);
    }
  }
}