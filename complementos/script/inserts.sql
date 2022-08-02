/*-- INSERT TABLA compania --*/
INSERT INTO compania VALUES(1,'Pedidos Gas','Descripción compania','Historia','Mision','Vision','logo.png','Sinfoto','A');

/*-- INSERT TABLA noticias --*/
INSERT INTO noticia VALUES(1,'Noticia 1','Descripción','Sinfoto','url','2022-01-01','08:00:00',3,'A');

/*-- INSERT TABLA sliders --*/
INSERT INTO slider VALUES(1,'Slider 1','Descripción','pedido','Sinfoto','A');
INSERT INTO slider VALUES(2,'Slider 2','Descripción','inicio','Sinfoto','A');

/*-- INSERT TABLA rol --*/
INSERT INTO rol VALUES(1,'Super Administrador','A');
INSERT INTO rol VALUES(2,'Administrador','A');
INSERT INTO rol VALUES(3,'Cliente','A');
INSERT INTO rol VALUES(4,'Repartidor','A');
INSERT INTO rol VALUES(5,'Recepcionista','A');

/*-- INSERT TABLA vehiculo --*/
INSERT INTO vehiculo VALUES ('','Sin datos','Sin datos','Sin datos','N');

/*-- INSERT TABLA usuario --*/
INSERT INTO usuario VALUES(0, 1, 1,'9999999999','User','','Mensajes','','','','','','','','','N','0');
INSERT INTO usuario VALUES('', 1, 1,'1725561649','Stalin','Benjamín','Perigüeza','Sula','stalin-1649@live.com','001b429f72a7099ca79c396f8ba0470c','Carapungo','+593997491995','1995-09-10','2021-09-20','admin.jpg','A', '0');

/*-- INSERT TABLA menu --*/
INSERT INTO menu VALUES('10','PANEL DE USUARIO',NULL,NULL,NULL,'fas fa-user','P','A');
INSERT INTO menu VALUES('11','PERFIL',10,'panel','perfil','NULL','S','A');
INSERT INTO menu VALUES('12','PERMISOS',10,'panel','permisos','NULL','S','A');
INSERT INTO menu VALUES('20','GESTION',NULL,NULL, NULL,'fas fa-cogs','P','A');
INSERT INTO menu VALUES('21','USUARIOS',20,'gestion','usuarios','NULL','S','A');
INSERT INTO menu VALUES('22','ROLES',20,'gestion','roles','NULL','S','A');
INSERT INTO menu VALUES('23','VEHICULOS',20,'gestion','vehiculos','NULL','S','A');
INSERT INTO menu VALUES('24','REPARTIDORES',20,'gestion','repartidores','NULL','S','A');
INSERT INTO menu VALUES('30','PEDIDOS',NULL,NULL, NULL,'fab fa-elementor','P','A');
INSERT INTO menu VALUES('31','VER PEDIDOS',30,'pedidos','verpedidos','NULL','S','A');
INSERT INTO menu VALUES('32','MIS PEDIDOS',30,'pedidos','mispedidos','NULL','S','A');
INSERT INTO menu VALUES('40','WEB',NULL,NULL,NULL,'fas fa-globe','P','A');
INSERT INTO menu VALUES('41','COMPAÑIA',40,'web','compania','NULL','S','A');
INSERT INTO menu VALUES('42','NOTICIAS',40,'web','noticias','NULL','S','A');
INSERT INTO menu VALUES('43','SLIDERS',40,'web','sliders','NULL','S','A');
INSERT INTO menu VALUES('44','CHAT',40,'web','chat','NULL','S','A');
INSERT INTO menu VALUES('50','REPORTES',NULL,NULL,NULL,'fas fa-file-alt','P','A');
INSERT INTO menu VALUES('51','PEDIDOS',50,'reportes','pedidos','NULL','S','A');
INSERT INTO menu VALUES('52','CLIENTES',50,'reportes','clientes','NULL','S','A');
INSERT INTO menu VALUES('53','RUTAS DE PEDIDOS',50,'reportes','rutas','NULL','S','A');

/*-- INSERT TABLA menu_rol --*/
INSERT INTO menu_rol VALUES('',1,10);
INSERT INTO menu_rol VALUES('',1,11);
INSERT INTO menu_rol VALUES('',1,12);
INSERT INTO menu_rol VALUES('',1,20);
INSERT INTO menu_rol VALUES('',1,21);
INSERT INTO menu_rol VALUES('',1,22);
INSERT INTO menu_rol VALUES('',1,23);
INSERT INTO menu_rol VALUES('',1,24);
INSERT INTO menu_rol VALUES('',1,30);
INSERT INTO menu_rol VALUES('',1,31);
INSERT INTO menu_rol VALUES('',1,32);
INSERT INTO menu_rol VALUES('',1,40);
INSERT INTO menu_rol VALUES('',1,41);
INSERT INTO menu_rol VALUES('',1,42);
INSERT INTO menu_rol VALUES('',1,43);