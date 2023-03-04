import {Router} from 'express'

import controllers from '../controllers'

const router = Router();

router.get('/', controllers.LocalController.getAll);

router.post('/', controllers.LocalController.create);

router.delete('/:id', controllers.LocalController.delete);

export default router;