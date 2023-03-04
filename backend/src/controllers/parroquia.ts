import { Request, Response } from "express";
import services from "../services";
import { manejarError } from "../utils/manejarError";

export class ParroquiaController{
  static async getAll(req:Request, res:Response) {
    try {
      const data = await services.ParroquiaService.getAll();
      res.json(data);
    } catch (error:any) {
      manejarError(error,res);
    }
  }

}