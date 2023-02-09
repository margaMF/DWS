CREATE DATABASE IF NOT EXISTS BD_Direcciones;
DROP DATABASE IF EXISTS BD_Direcciones;

CREATE TABLE direcciones_ip(
	ID INT PRIMARY KEY,
    IP VARCHAR(35)
);
INSERT INTO direcciones_ip VALUES (1, '11111111.11111111.11111111.00000001');
select ID, IP from direcciones_ip;

CREATE TABLE direcciones_ip_bloqueadas(
	ID INT PRIMARY KEY,
    IP VARCHAR(200)
);

INSERT INTO direcciones_ip_bloqueadas VALUES (1, '12345678.11111111.00000001.10011111111111111010101');
SELECT * FROM direcciones_ip_bloqueadas;

CREATE TABLE direcciones_ip_validas(
	ID INT PRIMARY KEY,
    IP VARCHAR(13)
);

SELECT * FROM direcciones_ip_validas;