drop table if exists publicacion;
CREATE TABLE publicacion 	(nro_publicacion INTEGER AUTO_INCREMENT NOT NULL,
						 titulo VARCHAR (100),
						 descripcion VARCHAR (100),
						 PRIMARY KEY (nro_publicacion));
