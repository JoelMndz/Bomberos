import {Router} from 'express'

import controllers from '../controllers'

const router = Router();

router.get('/', controllers.ContribuyenteController.getAll);

router.post('/', controllers.ContribuyenteController.create);

router.get('/buscar-locales/:identificaion', controllers.ContribuyenteController.getLocales);

export default router;