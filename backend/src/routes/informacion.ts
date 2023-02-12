import {Router} from 'express';
import controllers from '../controllers'
const router = Router();

/**
 * @swagger
 * components:
 *  schemas:
 *    InformacionResponse:
 *      type: Object
 *      properties:
 *        id: int
 *        nombre_empresa: string
 *        nombre_departamento: string
 *        telefono: string
 *        pagina_web: string
 *        url_logo1: string
 *        url_logo2: string
 *      example:
 *        id: 1
 *        nombre_empresa: 'cuerpo de bomberos de loja'
 *        nombre_departamento: 'bomberos'
 *        telefono: '098333656'
 *        pagina_web: null
 *        url_logo1: null
 *        url_logo2: null 
 */

/**
 * @swagger
 * tags:
 *  name: Informacion
 *  descripcion: Información endpoints
 */

/**
 * @swagger
 * /api/informacion:
 *  get:
 *    summary: Devuelve la información principal del cuerpo de bomberos
 *    tags: [Informacion]
 *    responses:
 *      200:
 *        content:
 *          apllication/json:
 *            schema:
 *              type: array
 *              items:
 *                $ref: '#/components/schemas/InformacionResponse'
 */

router.get('/',controllers.InformacionController.get)

export default router;