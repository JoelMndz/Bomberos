import express from "express"
import morgan from "morgan"
import cors from "cors"
import swaggerExpress from 'swagger-ui-express'
import swaggerJsDoc from 'swagger-jsdoc'

import { Request, Response } from "express"

import config from "./config"
import routes from "./routes"
import { swaggerOptions } from "./docs/swaggerOptions"

export class Server{
  private app

  constructor(){
    this.app = express()
    this.configuration()
    this.middlewares()
    this.routes()
  }

  routes() {
    this.app.get('/',(req:Request, res:Response)=>{
      res.json({
        name:'REST API - BOMBEROS'
      })
    })

    this.app.use('/api/auth', routes.AuthRouter);
    this.app.use('/api/solicitud', routes.SolicitudRouter);
    this.app.use('/api/inspeccion', routes.InspeccionRouter);
    this.app.use('/api/usuario', routes.UsuarioRouter);
    this.app.use('/api/informacion', routes.InformacionRouter);
    this.app.use('/api/rol', routes.RolRouter);
    this.app.use('/api/rango', routes.RangoRouter);
    this.app.use('/api/contribuyente', routes.ContribuyenteRouter);
    this.app.use('/api/parroquia', routes.ParroquiaRouter);
    this.app.use('/api/local', routes.LocalRouter);
  }
  
  middlewares() {
    this.app.use(cors())
    this.app.use(morgan('dev'))
    this.app.use(express.urlencoded({extended:false}))
    this.app.use(express.json({limit: '50mb'}))
  }

  configuration() {
    this.app.set('port',config.PORT || 5000)
    const spec = swaggerJsDoc(swaggerOptions)
    this.app.use('/docs', 
      swaggerExpress.serve, 
      swaggerExpress.setup(spec))
  }

  listen(){
    this.app.listen(this.app.get('port'),()=>{
      console.log(`Server on port ${this.app.get('port')}`);
      
    })
  }

}