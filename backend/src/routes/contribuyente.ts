import {Router} from 'express'

import controllers from '../controllers'

const router = Router();

router.get('/', controllers.ContribuyenteController.getAll);

router.post('/', controllers.ContribuyenteController.create);

export default router;