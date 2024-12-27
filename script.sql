-- Active: 1735292849618@@127.0.0.1@3306
CREATE DATABASE Ultimate_Team2;
USE Ultimate_Team2

CREATE Table players(
    player_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nom VARCHAR(50),
    id_img INT,
    nationality_id INT,
    club_id INT,
    posiition enum('RW','ST','CM1','CM2','CM3','CB1','CB2','LW','GK','CDM','LB','RB'),
    rating INT,
    pace INT,
    shooting INT,
    pasing INT,
    dribbling INT,
    defending INT,
    physical INT
);



INSERT INTO players (nom, id_img, nationality_id, club_id, posiition, rating, pace, shooting, pasing, dribbling, defending, physical) VALUES
('Lionel Messi', 62, 11, 21, 'RW', 93, 85, 92, 91, 95, 40, 70),
('Cristiano Ronaldo', 63, 7, 23, 'ST', 91, 87, 93, 82, 89, 40, 78),
('Neymar Jr', 64, 3, 24, 'LW', 91, 91, 84, 86, 95, 32, 61),
('Kevin De Bruyne', 65, 14, 26, 'CM3', 91, 76, 86, 93, 88, 64, 78),
('Virgil van Dijk', 66, 9, 27, 'CB1', 90, 71, 60, 71, 72, 91, 86),
('Kylian Mbappé', 62, 12, 22, 'ST', 92, 97, 88, 78, 92, 42, 76),
('Mohamed Salah', 63, 8, 29, 'RW', 91, 93, 88, 81, 90, 45, 70),
('Robert Lewandowski', 64, 10, 28, 'ST', 92, 78, 93, 82, 86, 40, 82),
('Sergio Ramos', 65, 4, 30, 'CB2', 89, 70, 60, 75, 75, 88, 85),
('Luka Modrić', 66, 13, 25, 'CM2', 89, 74, 78, 91, 90, 71, 64);

