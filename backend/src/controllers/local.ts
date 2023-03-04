import { Request, Response } from "express";
import services from "../services";
import { manejarError } from "../utils/manejarError";

export class LocalController{
  static async getAll(req:Request, res:Response) {
    try {
      const data = await services.LocalService.getAll();
      res.json(data);
    } catch (error:any) {
      manejarError(error,res);
    }
  }

  static async create(req:Request, res:Response) {
    try {
      const data = await services.LocalService.create(req.body);
      res.json(data);
    } catch (error:any) {
      manejarError(error,res);
    }
  }

  static async delete(req:Request, res:Response) {
    try {
      const {id} = req.params;
      const data = await services.LocalService.delete(id);
      res.json(data);
    } catch (error:any) {
      manejarError(error,res);
    }
  }
}