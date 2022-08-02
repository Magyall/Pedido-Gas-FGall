CREATE TABLE compania(
	cmp_CompaniaId INT AUTO_INCREMENT PRIMARY KEY,
	cmp_Nombre VARCHAR(25) DEFAULT NULL,
	cmp_Descripcion TEXT DEFAULT NULL,
	cmp_Historia TEXT DEFAULT NULL,
	cmp_Mision TEXT DEFAULT NULL,
	cmp_Vision TEXT DEFAULT NULL,
	cmp_Logo VARCHAR(100) DEFAULT NULL,
	cmp_Imagen VARCHAR(100) DEFAULT NULL,
	cmp_Estado CHAR(1) DEFAULT NULL
);

CREATE TABLE noticia(
	ntc_NoticiaId INT AUTO_INCREMENT PRIMARY KEY,
	ntc_Titulo VARCHAR(25) DEFAULT NULL,
	ntc_Descripcion TEXT DEFAULT NULL,
	ntc_Imagen VARCHAR(100) DEFAULT NULL,
	ntc_Url VARCHAR(100) DEFAULT NULL,
	ntc_Fecha DATE DEFAULT NULL,
	ntc_Hora TIME DEFAULT NULL,
	ntc_Tipo INT DEFAULT NULL,
	ntc_Estado CHAR(1) DEFAULT NULL
);

CREATE TABLE slider(
	sld_SlidersId INT AUTO_INCREMENT PRIMARY KEY,
	sld_Nombre VARCHAR(100) DEFAULT NULL,
	sld_Descripcion TEXT DEFAULT NULL,
	sld_Pagina VARCHAR(100) DEFAULT NULL,
	slr_Url VARCHAR(100) DEFAULT NULL,
	slr_Estado CHAR(1)
);

CREATE TABLE rol(
	rol_RolId INT AUTO_INCREMENT PRIMARY KEY,
	rol_Descripcion VARCHAR(25) DEFAULT NULL,
	rol_Estado CHAR(1) DEFAULT "I"
);

CREATE TABLE vehiculo(
	vhc_VehiculoId INT AUTO_INCREMENT PRIMARY KEY,
	vhc_Modelo VARCHAR(25) DEFAULT NULL,
	vhc_Placa VARCHAR(10) DEFAULT NULL,
	vhc_Imagen VARCHAR(100) DEFAULT NULL,
	vhc_Estado CHAR(1)
);

CREATE TABLE usuario(
	usr_UsuarioId INT AUTO_INCREMENT PRIMARY KEY,
	usr_RolId INT,
	usr_VehiculoId INT,
	usr_Identificacion VARCHAR(13) DEFAULT NULL,
	usr_PrimerNombre VARCHAR(25) DEFAULT NULL,
	usr_SegundoNombre VARCHAR(25) DEFAULT NULL,
	usr_PrimerApellido VARCHAR(25) DEFAULT NULL,
	usr_SegundoApellido VARCHAR(25) DEFAULT NULL,
	usr_Email VARCHAR(25) DEFAULT NULL,
	usr_Password VARCHAR(100) DEFAULT NULL,
	usr_Direccion VARCHAR(100) DEFAULT NULL,
	usr_Celular VARCHAR(13) DEFAULT NULL,
	usr_FechaNacimiento DATE DEFAULT NULL,
	usr_FechaRegistro DATE DEFAULT NULL,
	usr_Foto VARCHAR(100) DEFAULT NULL,
	usr_Estado CHAR(1) DEFAULT "I",
	usr_ActualizarPassword CHAR(1) DEFAULT "0",
	FOREIGN KEY (usr_RolId) REFERENCES rol (rol_RolId),
	FOREIGN KEY (usr_VehiculoId) REFERENCES vehiculo (vhc_VehiculoId)
);

CREATE TABLE menu(
	men_MenuId INT PRIMARY KEY NOT NULL,
	men_Descripcion VARCHAR(25) DEFAULT NULL,
	men_Pertenece CHAR(3) DEFAULT NULL,
	men_Carpeta VARCHAR(25) DEFAULT NULL,
	men_Url VARCHAR(25) DEFAULT NULL,
	men_Icono VARCHAR(20) DEFAULT NULL,
	men_Tipo CHAR(1) DEFAULT NULL,
	men_Estado CHAR(1) DEFAULT "I"
);

CREATE TABLE menu_rol(
	mnr_MenuRolId INT AUTO_INCREMENT PRIMARY KEY,
	mnr_RolId INT,
	mnr_MenuId INT,
	FOREIGN KEY (mnr_RolId) REFERENCES rol (rol_RolId),
	FOREIGN KEY (mnr_MenuId) REFERENCES menu (men_MenuId)
);

CREATE TABLE pedido(
	ped_PedidoId INT AUTO_INCREMENT PRIMARY KEY,
	ped_UsuarioId INT,
	ped_RepartidorId INT,
	ped_Numero VARCHAR(10) DEFAULT NULL,
	ped_FechaIngreso DATE DEFAULT NULL,
	ped_HoraIngreso TIME DEFAULT NULL,
	ped_FechaEntrega DATE DEFAULT NULL,
	ped_HoraEntrega TIME DEFAULT NULL,
	ped_FechaMaxima DATE DEFAULT NULL,
	ped_HoraMaxima TIME DEFAULT NULL,
	ped_Cantidad INT DEFAULT NULL,
	ped_Descripcion TEXT DEFAULT NULL,
	ped_Latitud VARCHAR(20) DEFAULT NULL,
	ped_Longitud VARCHAR(20) DEFAULT NULL,
	ped_Tipo INT DEFAULT NULL,
	ped_Comentario TEXT DEFAULT NULL,
	ped_CantidadI INT DEFAULT 0,
	ped_Estado CHAR(1) DEFAULT "N",
	FOREIGN KEY (ped_UsuarioId) REFERENCES usuario (usr_UsuarioId),
	FOREIGN KEY (ped_RepartidorId) REFERENCES usuario (usr_UsuarioId)
);

CREATE TABLE chat(
	cht_ChatId INT AUTO_INCREMENT PRIMARY KEY,
	cht_Receptor INT DEFAULT 0,
	cht_Emisor VARCHAR(25) DEFAULT NULL,
	cht_Numero VARCHAR(10) DEFAULT NULL,
	cht_Email VARCHAR(25) DEFAULT NULL,
	cht_Estado CHAR(1) DEFAULT 'A',
	FOREIGN KEY (cht_Receptor) REFERENCES usuario (usr_UsuarioId)
);

CREATE TABLE mensaje(
	msg_MensajeId INT AUTO_INCREMENT PRIMARY KEY,
	msg_ChatId INT,
	msg_UsuarioId INT DEFAULT 0,
	msg_Respuesta INT DEFAULT 0,
	msg_Mensaje TEXT DEFAULT NULL,
	msg_Estado CHAR(1) DEFAULT 'N',
	FOREIGN KEY (msg_ChatId) REFERENCES chat(cht_ChatId),
	FOREIGN KEY (msg_UsuarioId) REFERENCES usuario (usr_UsuarioId)
);