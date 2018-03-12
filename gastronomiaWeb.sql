drop table if exists publicacion;
CREATE TABLE publicacion 	(nro_publicacion INTEGER AUTO_INCREMENT NOT NULL,
						 titulo VARCHAR (100),
						 descripcion VARCHAR (100),
						 fecha DATE,
						 PRIMARY KEY (nro_publicacion));

CREATE TABLE comentarios (
 idcomentarios INT NOT NULL AUTO_INCREMENT,
 comentario VARCHAR(45) NULL,
 PRIMARY KEY (idcomentarios));
