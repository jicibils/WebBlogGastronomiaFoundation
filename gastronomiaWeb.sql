CREATE TABLE publicaciones 	(id INTEGER AUTO_INCREMENT NOT NULL,
						 titulo VARCHAR (100),
						 descripcion VARCHAR (100),
						 fecha DATE,
						 foto LONGTEXT,
						 PRIMARY KEY (nro_publicacion));

CREATE TABLE comentarios (
 id INT NOT NULL AUTO_INCREMENT,
 comentario VARCHAR(45) ,
 tituloPubli VARCHAR(150),
 PRIMARY KEY (idcomentarios));
