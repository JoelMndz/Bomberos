import { Router } from "express";
import controllers from "../controllers";

const router = Router();

router.post('/login',controllers.AuthController.login);

router.put('/login-con-token', controllers.AuthController.loginConToken)

router.put('/recuperar-clave', controllers.AuthController.recoveryPassword)

export default router;