import { Request, Response } from "express";
import services from "../services";

export class AuthController{
  static async login(req:Request, res:Response) {
    try {
      const data = await services.AuthService.login(req.body);
      res.json(data);
    } catch (error:any) {
      res.status(400).json({error:error.message});
    }
  }

  static async registrar(req:Request, res:Response) {
    try {
      const data = await services.AuthService.registrar(req.body);
      res.json(data);
    } catch (error:any) {
      res.status(400).json({error:error.message});
    }
  }
}