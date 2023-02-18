import {Router} from 'express'

import controllers from '../controllers'
import { verificarTokenAdmin } from '../middlewares/verifyToken';
const router = Router();

router.get('/', verificarTokenAdmin, controllers.RolController.getAll);

export default router;