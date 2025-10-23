DROP DATABASE IF EXISTS examen1_db;
CREATE DATABASE  examen1_db;
USE examen1_db;

CREATE TABLE equipos(
	id_equipo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL,
    email VARCHAR(360) NOT NULL,
    num_integrantes DECIMAL(2,0) UNSIGNED,
    puntuacion DECIMAL(4,2) UNSIGNED
);

CREATE USER IF NOT EXISTS 'usuarioBD'@'%' IDENTIFIED BY 'abc123';
GRANT ALL ON examen1_db.* TO 'usuarioBD'@'%';

-- CARGA DE DATOS
INSERT INTO equipos (nombre, email, num_integrantes, puntuacion) VALUES
('Los Ases', 'ases@torneo.com', 4, 87.50),
('Reyes del Naipe', 'reyes@torneo.com', 5, 32.30),
('Full House', 'fullhouse@torneo.com', 3, 75.20),
('Jokers Team', 'jokers@torneo.com', 5, 68.45),
('Cuatro Corazones', 'cuatrocorazones@torneo.com', 4, 81.70),
('Trébol Power', 'trebolpower@torneo.com', 2, 60.00),
('Diamantes Rojos', 'diamantes@torneo.com', 5, 45.10),
('Los Guerreros', 'guerreros@torneo.com', 3, 72.85),
('Black Jack', 'blackjack@torneo.com', 4, 39.40),
('Poker Stars', 'pokerstars@torneo.com', 5, 99.00),
('Escalera Real', 'escalerareal@torneo.com', 5, 97.75),
('Los Truhanes', 'truhanes@torneo.com', 3, 54.60),
('Cartas Bravas', 'cartasbravas@torneo.com', 4, 77.80),
('Naipe Salvaje', 'naipesalvaje@torneo.com', 2, 66.30),
('Corazones Locos', 'corazoneslocos@torneo.com', 5, 83.25);
