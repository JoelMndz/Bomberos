import { Router } from "express";
import controllers from "../controllers";

const router = Router();
const usuarioController = new controllers.UsuarioController();

router.get('/',usuarioController.getAll);

router.get('/:id',usuarioController.get);

router.post('/', usuarioController.create);

router.delete('/:id', usuarioController.delete);

export default router;