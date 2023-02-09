CREATE DATABASE IF NOT EXISTS BD_Torneos;
DROP DATABASE IF EXISTS BD_Torneos;

/*-----------------------------------------------------------------------TABLAS----------------------------------------------------------------------------------*/
CREATE TABLE T_Jugador(
ID INT AUTO_INCREMENT PRIMARY KEY,
Nombre VARCHAR(255) NOT NULL,
partidosJugados INT DEFAULT 0,
partidosGanados INT DEFAULT 0,
porcentajeVictorias VARCHAR(8) DEFAULT '0,00%',
totalTorneos INT DEFAULT 0,
torneosGanados INT DEFAULT 0
);
drop table T_Jugador;

CREATE TABLE T_Partido(
ID INT AUTO_INCREMENT PRIMARY KEY,
JugadorA INT NOT NULL,
JugadorB INT NOT NULL,
Ganador INT DEFAULT 0,
Ronda ENUM('Cuartos', 'Semifinales', 'Final') NOT NULL,
Torneo INT NOT NULL,
FOREIGN KEY (JugadorA) REFERENCES T_Jugador (ID),
FOREIGN KEY (JugadorB) REFERENCES T_Jugador (ID)
);
drop table T_Partido;

CREATE TABLE T_Torneo(
ID INT AUTO_INCREMENT PRIMARY KEY,
Nombre VARCHAR(255) NOT NULL,
Fecha DATE NOT NULL,
Estado ENUM('Finalizado', 'En curso') NOT NULL,
Jugadores INT,
Ganador INT DEFAULT 0
);
drop table T_Torneo;

CREATE TABLE T_Usuario(
ID INT AUTO_INCREMENT PRIMARY KEY,
Nombre VARCHAR(255) NOT NULL,
Perfil ENUM('Jugador', 'Administrador'),
clave VARCHAR(255) NOT NULL
);
drop table t_usuario;
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------USUARIO-------------------------------------------------------------------------------*/
select * from t_usuario;
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------JUGADOR-------------------------------------------------------------------------------*/
INSERT INTO T_Jugador (Nombre) VALUES 
('Jorge'), 
('Teresa'), 
('Hugo'),
('Lucía'),
('Mateo'),
('Júlia'),
('Lucas'),
('Isabella');
select * from t_jugador;
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------TORNEOS-------------------------------------------------------------------------------*/
INSERT INTO t_torneo (Nombre, Fecha, Estado, Jugadores) VALUES ('Torneo 2021', '21-12-22', 'Finalizado', 8), 
('Torneo Navidad 2022', '22-12-22', 'Finalizado', 8);
select * from t_torneo;
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------PARTIDOS-------------------------------------------------------------------------------*/
INSERT INTO T_Partido (JugadorA, JugadorB, Ronda, Torneo) VALUES ('1', '4', 'Cuartos', '1'), 
('3', '6', 'Cuartos', '1'), 
('5', '2', 'Cuartos', '1'), 
('7', '8', 'Cuartos', '1'),
('1', '3', 'Semifinales', '1'),
('5', '8', 'Semifinales', '1'),
('1', '8', 'Final', '1');

INSERT INTO T_Partido (JugadorA, JugadorB, Ronda, Torneo) VALUES ('2', '4', 'Cuartos', '2'), 
('1', '7', 'Cuartos', '2'), 
('5', '3', 'Cuartos', '2'), 
('6', '8', 'Cuartos', '2'),
('4', '7', 'Semifinales', '2'),
('3', '6', 'Semifinales', '2'),
('4', '6', 'Final', '2');
select * from t_partido;

/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------CONSULTAS------------------------------------------------------------------------------*/
SELECT ID, Nombre, Fecha, Estado, Jugadores FROM t_torneo;
SELECT ID, Nombre FROM T_JUGADOR;
SELECT ID, JugadorA, JugadorB, Ganador, Ronda, Torneo FROM t_partido;