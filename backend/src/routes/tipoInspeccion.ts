import {Router} from 'express'

import controllers from '../controllers'

const router = Router();

router.get('/', controllers.TipoInspeccionController.getAll);

router.post('/', controllers.TipoInspeccionController.create);

router.delete('/:id', controllers.TipoInspeccionController.delete);

export default router;