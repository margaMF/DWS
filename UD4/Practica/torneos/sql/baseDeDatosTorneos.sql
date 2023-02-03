CREATE DATABASE IF NOT EXISTS BD_Torneos;
DROP DATABASE IF EXISTS BD_Torneos;

/*-----------------------------------------------------------------------TABLAS----------------------------------------------------------------------------------*/
CREATE TABLE T_Jugador(
ID INT AUTO_INCREMENT PRIMARY KEY, /*todos los ID tienen que ser autoincrementables*/
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
('Alex'), 
('Carlos'),
('Belén'),
('Marta'),
('Jaime'),
('Maria'),
('Miguel'),
('Raquel');

select * from t_jugador;
delete from t_jugador where ID > 0; 
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------TORNEOS-------------------------------------------------------------------------------*/
INSERT INTO t_torneo (Nombre, Fecha, Estado, Jugadores) VALUES ('Torneo 2021', '21-12-22', 'Finalizado', 8), 
('Torneo Navidad 2022', '22-12-22', 'Finalizado', 8);
select * from t_torneo;
/*--------------------------------------------------------------------------------------------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------CONSULTAS------------------------------------------------------------------------------*/
SELECT ID, Nombre, Fecha, Estado, Jugadores FROM t_torneo;
SELECT ID, Nombre FROM T_JUGADOR;