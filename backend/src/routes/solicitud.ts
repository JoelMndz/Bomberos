import { Router } from "express";

import controllers from "../controllers";

const router = Router();
const solicitudController = new controllers.SolicitudController();

router.get('/',solicitudController.getAll);

router.post('/',solicitudController.create);

router.get('/approved/:id',solicitudController.approved);

/*
router.get('/all/pending', solicitudController.getAllPending)

router.delete('/:id', solicitudController.delete);
*/
export default router;