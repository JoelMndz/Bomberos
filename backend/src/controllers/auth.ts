import { Request, Response } from "express";
import services from "../services";
import { manejarError } from "../utils/manejarError";

export class AuthController{
  static async login(req:Request, res:Response) {
    try {
      const data = await services.AuthService.login(req.body);
      res.json(data);
    } catch (error:any) {
      manejarError(error,res);
    }
  }
/*
  static async registrar(req:Request, res:Response) {
    try {
      const data = await services.AuthService.registrar(req.body);
      res.json(data);
    } catch (error:any) {
      res.status(400).json({error:error.message});
    }
  }*/

  static async loginConToken(req:Request, res:Response){
    try {
      const data = await services.AuthService.loginConToken(req.body.token);
      res.json(data);
    } catch (error:any) {
      manejarError(error,res);
    }
  }

  static async recoveryPassword(req:Request, res:Response){
    try {
      const data = await services.AuthService.recoveryPassword(req.body.email);
      res.json(data);
    } catch (error:any) {
      manejarError(error,res);
    }
  }
}