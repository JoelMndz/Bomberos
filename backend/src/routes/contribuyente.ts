import {Router} from 'express'

import controllers from '../controllers'

const router = Router();

router.get('/', controllers.ContribuyenteController.getAll);

router.get('/:id', controllers.ContribuyenteController.getById);

router.post('/', controllers.ContribuyenteController.create);

router.get('/buscar-locales/:identificaion', controllers.ContribuyenteController.getLocales);

export default router;