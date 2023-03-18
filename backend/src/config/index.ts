import { config } from 'dotenv'

if(process.env.NODE_ENV !== "production"){
  config();
}

export default {
  PORT: process.env.PORT,
  SECRET: process.env.SECRET,
  CLOUDINARY_NAME:process.env.CLOUDINARY_NAME,
  CLOUDINARY_KEY: process.env.CLOUDINARY_KEY,
  CLOUDINARY_SECRET: process.env.CLOUDINARY_SECRET,
  EMAIL_USER: process.env.EMAIL_USER,
  EMAIL_PASSWORD: process.env.EMAIL_PASSWORD,
}