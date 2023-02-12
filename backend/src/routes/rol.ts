import {Router} from 'express'

import controllers from '../controllers'
import { verificarTokenAdmin } from '../middlewares/verifyToken';
const router = Router();

/**
 * @swagger
 * components:
 *  schemas:
 *    RolRequest:
 *      type: Object
 *      properties:
 *        descripcion: string
 *      example:
 *        descripcion: 'Admin total'
 *    RolResponse:
 *      type: Object
 *      properties:
 *        id: int
 *        descripcion: string
 *        estado: string
 *      example:
 *        id: 1
 *        descripcion: 'Admin total'
 *        estado: '1'
 */

/**
 * @swagger
 * tags:
 *  name: Rol
 *  descripcion: Rol endpoints
 */

/**
 * @swagger
 * /api/rol:
 *  get:
 *    summary: Devuelve los roles
 *    tags: [Rol]
 *    parameters:
 *      - in: header
 *        name: token
 *        required: true
 *        schema:
 *          type: string
 *        description: Este debe ser el mismo token que se envío cuando se inicio sesión el administrador
 *    responses:
 *      200:
 *        content:
 *          apllication/json:
 *            schema:
 *              type: array
 *              items:
 *                $ref: '#/components/schemas/RolResponse'
 */
router.get('/', verificarTokenAdmin, controllers.RolController.getAll);

export default router;