CREATE DATABASE IF NOT EXISTS cartelera;
/*-----------------------------------------------------------------------TABLAS----------------------------------------------------------------------------------*/
CREATE TABLE `t_actor` (
  `ID` int NOT NULL,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `t_actor_pelicula` (
  `id_pelicula` int NOT NULL,
  `id_actor` int NOT NULL,
  PRIMARY KEY (`id_pelicula`,`id_actor`),
  KEY `id_actor` (`id_actor`),
  CONSTRAINT `t_actor_pelicula_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `t_peliculas` (`ID`),
  CONSTRAINT `t_actor_pelicula_ibfk_2` FOREIGN KEY (`id_actor`) REFERENCES `t_actor` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `t_categoria` (
  `id` int NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `t_director` (
  `ID` int NOT NULL,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `t_peliculas` (
  `ID` int NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `año` int DEFAULT NULL,
  `duracion` int DEFAULT NULL,
  `sinopsis` varchar(500) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `votos` int DEFAULT NULL,
  `id_categoria` int DEFAULT NULL,
  `id_director` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_director` (`id_director`),
  CONSTRAINT `t_peliculas_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `t_categoria` (`id`),
  CONSTRAINT `t_peliculas_ibfk_2` FOREIGN KEY (`id_director`) REFERENCES `t_director` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*----------------------------------------------------------------------------CATEGORIA OK----------------------------------------------------------------------------*/
insert into t_categoria values (1, 'Terror');
insert into t_categoria values (2, 'Acción');
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*----------------------------------------------------------------------------PELICULAS------------------------------------------------------------------------------*/
/*TERROR*/
insert into t_peliculas  values 
(1, 'Sinister', 2012, 110, 'Un periodista viaja con su familia a lo largo y ancho del país para investigar terribles asesinatos que luego convierte en libros. Cuando llega a una casa donde ha tenido lugar el asesinato de una familia, encuentra una cinta que desvela horribles pistas que van más allá del esclarecimiento de la tragedia.', 'img/terror/pelicula1.jpg', 0, 1, 1),

(2, 'La visita', 2015, 94, 'Una madre deja a sus dos hijos durante una semana en la remota granja de sus abuelos, en Pensilvania. Los niños descubrirán que la anciana pareja está implicada en algo profundamente inquietante.', 'img/terror/pelicula10.jpg', 0, 1, 8),

(3, 'Expediente Warren: The Conjuring', 2013, 112, 'Basada en una historia real documentada por los reputados demonólogos Ed y Lorraine Warren. Narra los encuentros sobrenaturales que vivió la familia Perron en su casa de Rhode Island a principios de los 70. El matrimonio Warren, investigadores de renombre en el mundo de los fenómenos paranormales, acudieron a la llamada de esta familia aterrorizada por la presencia en su granja de un ser maligno.', 'img/terror/pelicula3.jpg', 0, 1, 3),

(4, 'Hereditary', 2018, 126, 'Cosas extrañas comienzan a suceder en casa de los Graham tras la muerte de la abuela, que deja en herencia su casa a su hija Annie. Annie Graham, una galerista casada y con dos hijos, no tuvo una infancia demasiado feliz junto a su madre, y cree que la muerte de ésta puede hacer que pase página. Pero todo se complica cuando su hija menor comienza a ver figuras fantasmales, que también empiezan a aparecer ante su hermano.', 'img/terror/pelicula8.jpg', 0, 1, 7),

(5, 'Poltergeist', 1982, 114, 'Una familia americana de clase media se traslada a vivir a un idílico barrio, pero dentro de la casa empiezan a suceder cosas extrañas, fenómenos paranormales para los que no hay explicación posible.', 'img/terror/pelicula5.jpg', 0, 1, 5);

/*TARANTINO*/
insert into t_peliculas  values 
(6, 'Kill Bill', 1982, 114, 'El día de su boda, una asesina profesional sufre el ataque de algunos miembros de su propia banda, que obedecen las órdenes de Bill, el jefe de la organización criminal. Logra sobrevivir al ataque, aunque queda en coma. Cuatro años después despierta dominada por un gran deseo de venganza.', 'img/tarantino/pelicula1.jpg', 0, 2, 9),

(7, 'Pulp Fiction', 1994, 153, 'Jules y Vincent, dos asesinos a sueldo con no demasiadas luces, trabajan para el gángster Marsellus Wallace. Vincent le confiesa a Jules que Marsellus le ha pedido que cuide de Mia, su atractiva mujer. Jules le recomienda prudencia porque es muy peligroso sobrepasarse con la novia del jefe. Cuando llega la hora de trabajar, ambos deben ponerse "manos a la obra". Su misión: recuperar un misterioso maletín.', 'img/tarantino/pelicula2.jpg', 0, 2, 9),

(8, 'Django Desencadenado', 2012, 165, 'En Texas, dos años antes de estallar la Guerra Civil Americana, King Schultz, un cazarrecompensas alemán que sigue la pista a unos asesinos para cobrar por sus cabezas, le promete al esclavo negro Django dejarlo en libertad si le ayuda a atraparlos. Él acepta, pues luego quiere ir a buscar a su esposa Broomhilda, esclava en una plantación del terrateniente Calvin Candie.', 'img/tarantino/pelicula3.jpg', 0, 2, 9),

(9, 'Malditos Bastardos', 2009, 146, 'En la Francia ocupada por los alemanes, Shosanna Dreyfus presencia la ejecución de su familia por orden del coronel y huye a París. El teniente Aldo Raine adiestra a un grupo de soldados judíos ("The Basterds") para atacar objetivos concretos. Los hombres de Raine y una actriz alemana, deben llevar a cabo una misión para hacer caer a los jefes del Tercer Reich. El destino quiere que todos se encuentren bajo la marquesina del cine donde Shosanna espera para vengarse.', 'img/tarantino/pelicula4.jpg', 0, 2, 9),

(10, 'Los odiosos ocho', 2015, 167, 'El cazarrecompensas John Ruth, intentan llegar al pueblo de Red Rock, donde entregará a Daisy Domergue a la justicia. Por el camino, se encuentran con el mayor Marquis Warren, un antiguo soldado convertido en cazarrecompensas y Chris Mannix, que afirma ser el nuevo sheriff. Se refugian en la Mercería de Minnie y se topan con: el mexicano Bob, Oswaldo Mobray, verdugo de Red Rock, el vaquero Joe Gage y el general Sanford Smithers. Los ocho viajeros descubren que tal vez no lleguen hasta Red Rock.', 'img/tarantino/pelicula5.jpg', 0, 2, 9);
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*----------------------------------------------------------------------------DIRECTOR-------------------------------------------------------------------------------*/
insert into t_director values 
		(1, 'Scott Derrickson'),
        (2, 'Fede Álvarez'),
        (3, 'James Wan'),
        (4, 'Takashi Shimizu'),
        (5, 'Tobe Hooper'),
        (6, 'James DeMonaco'),
        (7, 'Ari Aster'),
        (8, 'M. Night Shyamalan'),
        (9, 'Quentin Tarantino');
        /*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
        
/*------------------------------------------------------------------------------ACTOR--------------------------------------------------------------------------------*/
insert into t_actor values 
		(1, 'Ethan Hawke'),
		(2, 'Juliet Rylance'),
        (3, 'Olivia DeJonge'),
        (4, 'Ed Oxenbould'),
        (5, 'Vera Farmiga'),
        (6, 'Patrick Wilson'),
        (7, 'Toni Collette'),
        (8, 'Milly Shapiro'),
        (9, 'JoBeth Williams'),
        (10, 'Craig T. Nelson'),
        (11, 'Uma Thurman'),
        (12, 'Lucy Liu'),
        (13, 'John Travolta'),
        (14, 'Jamie Foxx'),
        (15, 'Leonardo DiCaprio'),
        (16, 'Brad Pitt'),
        (17, 'Christoph Waltz'),
        (18, 'Samuel L. Jackson'),
        (19, 'Kurt Russell');
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

 /*--------------------------------------------------------------------T_ACTOR_PELICULA------------------------------------------------------------------------------*/
        insert into t_actor_pelicula values 
				(1, 1), (1, 2), (2, 3), (2, 4), (3, 5), (3, 6), (4, 7), (4, 8), (5, 9), (5, 10), (6, 11),
                (6, 12), (7, 11), (7, 13), (8, 14), (8, 15), (9, 16), (9, 17), (10, 18), (10, 19);
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

