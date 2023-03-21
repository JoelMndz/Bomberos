import { Router } from "express";

import controllers from "../controllers";
import middlewares from "../middlewares";

const router = Router();
const inspeccionController = new controllers.InspeccionController();

//router.use(middlewares.verifyToken);

router.get('/',inspeccionController.getAll);
/*
router.get('/all/pending', inspeccionController.getAllPending)

router.post('/', inspeccionController.create);
*/
router.put('/:id', inspeccionController.updateState);

export default router;