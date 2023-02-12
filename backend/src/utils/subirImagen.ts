import {v2 as cloudynary} from 'cloudinary';

import config from '../config';

export const subirImagen = async(base64:string)=>{
  try {
    cloudynary.config({
      cloud_name: config.CLOUDINARY_NAME,
      api_key: config.CLOUDINARY_KEY,
      api_secret: config.CLOUDINARY_SECRET
    });

    const respuesta = await cloudynary.uploader.upload(base64);
    return respuesta.url;
    
  } catch (error) {
    console.log(error);
    return null;
  }
}