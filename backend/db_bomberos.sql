drop database if exists db_bomberos;
create database db_bomberos;
use db_bomberos;

create table configuracion_reportes(
	id int primary key auto_increment,
    nombre_empresa varchar(100),
    nombre_departamento varchar(100),
    nombre_coronel varchar(100),
    telefono varchar(15),
    pagina_web text,
    url_logo1 text,
    url_logo2 text
);

create table privilegios(
	id int primary key auto_increment,
    descripcion varchar(100)
);

create table roles(
	id int primary key auto_increment,
    descripcion varchar(100),
    estado char default '1'
);

create table privilegios_por_rol(
	id_rol int not null,
    id_provilegio int not null,
    foreign key(id_rol) references roles(id),
    foreign key(id_provilegio) references privilegios(id)
);

create table rangos(
	id int primary key auto_increment,
    descripcion varchar(100),
    estado char default '1'
);

create table contribuyentes(
	id int primary key auto_increment,
    identificacion varchar(13),
    nombre varchar(50),
    apellidos varchar(50),
    direccion varchar(100),
    telefono varchar(15),
    email varchar(100),
    fecha_nacimiento date,
    estado char default '1',
    discapacidad varchar(50)
);

create table usuarios(
	id int primary key auto_increment,
    identificacion varchar(13),
    nombre varchar(50),
    apellidos varchar(50),
    direccion varchar(100),
    telefono varchar(15),
    email varchar(100),
    password varchar(100),
    fecha_nacimiento date,
    estado char default '1',
    id_rol int,
    id_rango int,
    foreign key(id_rol) references roles(id),
    foreign key(id_rango) references rangos(id)
);

create table parroquias(
	id int primary key auto_increment,
    descripcion varchar(100)
);


create table tipo_inspeccion(
	id int primary key auto_increment,
    descripcion varchar(100),
    estado int default 1,
    valor double
);

create table locales(
	id int primary key auto_increment,
    nombre varchar(100),
    calle_principal varchar(100),
    calle_secundaria varchar(100),
    numero_casa varchar(50),
    referencia varchar(100),
    estado int default 1,
    id_parroquia int,
    id_contribuyente int,
    foreign key(id_parroquia) references parroquias(id),
    foreign key(id_contribuyente) references contribuyentes(id)
);

create table solicitudes(
	id int primary key auto_increment,
    fecha_creacion datetime default now(),
    estado char default '1',
    id_usuario int,
    id_local int,
    id_tipo_inspeccion int,
    foreign key(id_usuario) references usuarios(id),
    foreign key(id_local) references locales(id),
    foreign key(id_tipo_inspeccion) references tipo_inspeccion(id)
);
create table permisos(
	id int primary key auto_increment,
    descripcion varchar(100)
);

create table inspecciones(
	id int primary key auto_increment,
    fecha_creacion datetime default now(),
    aprobacion varchar(3),
    notificaciones int default 0,
    id_solicitud int,
    id_permiso int,
    foreign key(id_solicitud) references solicitudes(id),
    foreign key(id_permiso) references permisos(id)
);

create table evidencias(
	id int primary key auto_increment,
    url_foto text
);

create table evidencias_por_inspeccion(
	id_inspeccion int,
    id_evidencia int,
    foreign key(id_inspeccion) references inspecciones(id),
    foreign key(id_evidencia) references evidencias(id)
);

create table obervaciones(
	id int primary key auto_increment,
    descripcion varchar(100)
);

create table tipo_cobro(
	id int primary key auto_increment,
    descripcion varchar(100)
);

create table cobros(
	id int primary key auto_increment,
    fecha_creacion datetime default now(),
    valor_pago_patente double,
    valor_permisos_especiales double,
    valor_no_patente double,
    valor_aprobacion_permisos_ocupacion double,
    subtotal double,
    valor_notificaciones double,
    descuento double,
    total double,
    id_usuario int,
    id_tipo_cobro int,
    id_inspeccion int,
    foreign key(id_usuario) references usuarios(id),
    foreign key(id_tipo_cobro) references tipo_cobro(id),
    foreign key(id_inspeccion) references inspecciones(id)
);

INSERT INTO parroquias VALUES
(1, '	Aurelio Bayas'),
(2, '	Azogues'),
(3, '	Borrero'),
(4, '	San Francisco'),
(5, '	Cojitambo'),
(6, '	Guapán'),
(7, '	Javier Loyola'),
(8, '	Luis Cordero'),
(9, '	Pindilig'),
(10, '	Rivera'),
(11, '	San Miguel'),
(12, '	Taday');

INSERT INTO tipo_cobro VALUES
(1, 'Valor Total'),
(2, 'Valor Unitario'),
(3, 'Sin Valor');

INSERT INTO permisos VALUES
(1, 'Obtener permiso año actual'),
(2, 'obtener permiso año(s) anterior(es)');

INSERT INTO privilegios VALUES
(1, 'Archivos'),
(2, 'Contribuyentes'),
(3, 'Inspecciones'),
(4, 'Cobros'),
(5, 'Reportes'),
(6, 'Configuracion');

INSERT INTO rangos(id,descripcion)  VALUES 
(1, 'Crnel (B)'),
(2, 'Tnte. Crnel (B)'),
(3, 'Mayor (B)'),
(4, 'Capitan (B)'), 
(5, 'Tnte. (B)'),
(6, 'SubTnte. (B)'),
(7, 'Sub Of. (B)'),
(8, 'Sgto. (B)'),
(9, 'Cabo (B)'),
(10, 'Bombero');

INSERT INTO roles(id,descripcion)VALUES
(1, 'Admistrador total'),
(2, 'Inspector');

INSERT INTO privilegios_por_rol VALUES
(2, 3),
(2, 4),
(2, 5),
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6);


INSERT INTO tipo_inspeccion (id, descripcion, valor) VALUES 
(1, 'Locales', 0), 
(2, 'Instituciones Educativas Públicas y Privadas ',12.75), 
(3, 'Transporte de cilindros de GLP ', 0.4), 
(4, 'Depósitos de Cilindros de GLP (100 cilindros) ', 212.5), 
(5, 'Transporte combustible', 63.75), 
(6, 'Transporte oxígen y afines ', 42.5), 
(7, 'Espectáculos públicos nacionales ', 212.5), 
(8, 'Espectáculos públicos internacionales ', 425), 
(9, 'Ferias ',127.5), 
(10, 'Circos ', 127.5), 
(11, 'Juegos Mecánicos (pequeños) ',42.5), 
(12, 'Juegos Mecánicos (grandes) ', 170), 
(13, 'Fábricas de cemento ', 10625);

INSERT INTO usuarios (id, identificacion, nombre, apellidos, direccion, telefono, fecha_nacimiento, email, id_rol, id_rango, password) VALUES
(1, '1312386931', 'Admin', 'Total', 'calle 13', '0983336665','1980-01-01', 'admin@gmail.com', 1, 1, 'admin');

insert into configuracion_reportes(nombre_empresa,nombre_departamento,nombre_coronel,telefono) 
values('CUERPO DE BOMBEROS DE LOJA','DEPARTAMENTO DE BOMBEROS','CORONEL A CARGO','0986663652');

-- select * from roles;