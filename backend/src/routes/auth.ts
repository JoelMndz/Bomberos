import { Router } from "express";
import controllers from "../controllers";

const router = Router();

router.post('/login',controllers.AuthController.login);

router.put('/login-con-token', controllers.AuthController.loginConToken)

export default router;