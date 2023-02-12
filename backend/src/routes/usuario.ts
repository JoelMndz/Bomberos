import { Router } from "express";
import controllers from "../controllers";
import middlewares from "../middlewares";

const router = Router();
const usuarioController = new controllers.UsuarioController();

router.use(middlewares.verifyToken);

router.get('/',usuarioController.get);

export default router;