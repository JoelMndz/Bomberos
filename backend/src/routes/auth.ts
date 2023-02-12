import { Router } from "express";
import controllers from "../controllers";
import { verificarTokenAdmin } from "../middlewares/verifyToken";

const router = Router();

/**
 * @swagger
 * components:
 *  schemas:
 *    LoginRequest:
 *      type: Object
 *      properties:
 *        email:
 *          type: string
 *        password:
 *          type: string
 *      example:
 *        email: 'example@gmail.com'
 *        password: 'Admin123JH'
 *    LoginResponse:
 *      type: Object
 *      properties:
 *        id: int
 *        identificacion: string
 *        nombres: string
 *        apellidos: string
 *        telefono: string
 *        direccion: string
 *        email: string
 *        fecha_nacimiento: string
 *        estado: string
 *      example:
 *        id: 1
 *        identificacion: '1312386931'
 *        nombres: 'Juan Andres'
 *        apellidos: 'Mendoza Loor'
 *        telefono: '0983365895'
 *        direccion: calle 13
 *        email: example@gmail.com
 *        fecha_nacimiento: '1970-01-01'
 *        estado: '1'
 *    RegistrarRequest:
 *      type: Object
 *      properties:
 *        identificacion: string
 *        nombres: string
 *        apellidos: string
 *        telefono: string
 *        direccion: string
 *        email: string
 *        fecha_nacimiento: string
 *      example:
 *        identificacion: "1312386922"
 *        nombres: "Lusi David"
 *        apellidos: "Loor Loor"
 *        telefono: "0986635612"
 *        direccion: "calle 13"
 *        email: "davil@gmail.com"
 *        fecha_nacimiento: '1992-02-27'
 *    RegistrarResponse:
 *      type: Object
 *      properties:
 *        id: int
 *        identificacion: string
 *        nombres: string
 *        apellidos: string
 *        telefono: string
 *        direccion: string
 *        email: string
 *        fecha_nacimiento: string
 *        estado: string
 *      example:
 *        id: 1
 *        identificacion: '1312386931'
 *        nombres: 'Juan Andres'
 *        apellidos: 'Mendoza Loor'
 *        telefono: '0983365895'
 *        direccion: calle 13
 *        email: example@gmail.com
 *        fecha_nacimiento: '1970-01-01'
 *        estado: '1'    
 *    ErrorResponse:
 *      type: Object
 *      properties:
 *        error:
 *          type: string
 *      example:
 *        error: 'Credenciales incorrectas!'
 */

/**
 * @swagger
 * tags:
 *  name: Auth
 *  descripcion: Authenticacion endpoints
 */

/**
 * @swagger
 * /api/auth/login:
 *  post:
 *    summary: Login de usuarios
 *    tags: [Auth]
 *    requestBody:
 *      required: true
 *      content:
 *        application/json:
 *          schema:
 *            $ref: '#/components/schemas/LoginRequest'
 *    responses:
 *      200:
 *        description: Devuelve los datos del usuario y el token
 *        content:
 *          application/json:
 *            schema:
 *              $ref: '#/components/schemas/LoginResponse'
 *      400:
 *        description: Devuelve el error
 *        content:
 *          application/json:
 *            schema:
 *              $ref: '#/components/schemas/ErrorResponse'    
 */
router.post('/login',controllers.AuthController.login);

/**
 * @swagger
 * /api/auth/registrar:
 *  post:
 *    summary: Registrar usuarios (Solo lo puede hacer el administrador)
 *    tags: [Auth]
 *    parameters:
 *      - in: header
 *        name: token
 *        required: true
 *        schema:
 *          type: string
 *        description: Este debe ser el mismo token que se envío cuando se inicio sesión el administrador
 *    requestBody:
 *      required: true
 *      content:
 *        application/json:
 *          schema:
 *            $ref: '#/components/schemas/RegistrarRequest'
 *    responses:
 *      200:
 *        description: Devuelve los datos del usuario registrado
 *        content:
 *          application/json:
 *            schema:
 *              $ref: '#/components/schemas/RegistrarResponse'
 *      400:
 *        description: Devuelve el error
 *        content:
 *          application/json:
 *            schema:
 *              $ref: '#/components/schemas/ErrorResponse'   
 */
router.post('/registrar',
verificarTokenAdmin,controllers.AuthController.registrar);


export default router;