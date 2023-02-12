import { Router } from "express";

import controllers from "../controllers";
import middlewares from "../middlewares";

const router = Router();
const solicitudController = new controllers.SolicitudController();

router.use(middlewares.verifyToken);

router.get('/',solicitudController.getAll);

router.get('/all/pending', solicitudController.getAllPending)

router.delete('/:id', solicitudController.delete);

export default router;