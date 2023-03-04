import { Request, Response } from "express";
import services from "../services";
import { manejarError } from "../utils/manejarError";

export class ContribuyenteController{
  static async getAll(req:Request, res:Response) {
    try {
      const data = await services.ContribuyenteService.getAll();
      res.json(data);
    } catch (error:any) {
      manejarError(error,res);
    }
  }

  static async create(req:Request, res:Response) {
    try {
      const data = await services.ContribuyenteService.create(req.body);
      res.json(data);
    } catch (error:any) {
      manejarError(error,res);
    }
  }
}