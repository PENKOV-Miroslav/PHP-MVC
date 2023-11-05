CREATE TABLE CATEGORIE(
   ID_CATEGORIE INT AUTO_INCREMENT,
   LIBELLE_CATEGORIE VARCHAR(50)  NOT NULL,
   PRIMARY KEY(ID_CATEGORIE),
   UNIQUE(LIBELLE_CATEGORIE)
);

CREATE TABLE RAID(
   ID_RAID INT AUTO_INCREMENT,
   LIBELLE_RAID VARCHAR(50)  NOT NULL,
   PRIMARY KEY(ID_RAID),
   UNIQUE(LIBELLE_RAID)
);

CREATE TABLE ROLE(
   ID_ROLE INT AUTO_INCREMENT,
   LIBELLE_ROLE VARCHAR(50)  NOT NULL,
   PRIMARY KEY(ID_ROLE),
   UNIQUE(LIBELLE_ROLE)
);

CREATE TABLE CIRCUIT(
   ID_CIRCUIT INT AUTO_INCREMENT,
   LIBELLE_CIRCUIT VARCHAR(50)  NOT NULL,
   ID_RAID INT,
   PRIMARY KEY(ID_CIRCUIT),
   UNIQUE(LIBELLE_CIRCUIT),
   FOREIGN KEY(ID_RAID) REFERENCES RAID(ID_RAID)
);

CREATE TABLE EPREUVE(
   ID_EPREUVE INT AUTO_INCREMENT,
   LIBELLE_EPREUVE VARCHAR(50)  NOT NULL,
   ID_CIRCUIT INT,
   PRIMARY KEY(ID_EPREUVE),
   FOREIGN KEY(ID_CIRCUIT) REFERENCES CIRCUIT(ID_CIRCUIT)
);

CREATE TABLE UTILISATEUR(
   ID_UTILISATEUR INT AUTO_INCREMENT,
   LOGIN_UTILISATEUR VARCHAR(50)  NOT NULL,
   MOT_DE_PASSE_UTILISATEUR VARCHAR(255)  NOT NULL,
   ID_ROLE INT NOT NULL,
   PRIMARY KEY(ID_UTILISATEUR),
   FOREIGN KEY(ID_ROLE) REFERENCES ROLE(ID_ROLE)
);

CREATE TABLE EQUIPE(
   ID_EQUIPE INT AUTO_INCREMENT,
   NUM_DOSSARD_EQUIPE INT,
   ID_CIRCUIT INT NOT NULL,
   ID_CATEGORIE INT NOT NULL,
   PRIMARY KEY(ID_EQUIPE),
   FOREIGN KEY(ID_CIRCUIT) REFERENCES CIRCUIT(ID_CIRCUIT),
   FOREIGN KEY(ID_CATEGORIE) REFERENCES CATEGORIE(ID_CATEGORIE)
);

CREATE TABLE PARTICIPANT(
   ID_PARTICIPANT INT AUTO_INCREMENT,
   NOM_PARTICIPANT VARCHAR(50)  NOT NULL,
   PRENOM_PARTICIPANT VARCHAR(50)  NOT NULL,
   DATE_NAISSANCE_PARTICIPANT DATE NOT NULL,
   ADRESSE_PARTICIPANT VARCHAR(50)  NOT NULL,
   CODE_POSTAL_PARTICIPANT VARCHAR(50)  NOT NULL,
   VILLE_PARTICIPANT VARCHAR(50)  NOT NULL,
   TELEPHONE_PARTICIPANT INT NOT NULL,
   CERTIFICAT_VALIDER_PARTICIPANT BOOLEAN,
   CLUB_PARTICIPANT VARCHAR(50) ,
   ID_RFID VARCHAR(50) ,
   EMAIL_PARTICIPANT VARCHAR(50)  NOT NULL,
   ID_EQUIPE INT NOT NULL,
   PRIMARY KEY(ID_PARTICIPANT),
   FOREIGN KEY(ID_EQUIPE) REFERENCES EQUIPE(ID_EQUIPE)
);

CREATE TABLE TEMPS(
   ID_TEMPS INT AUTO_INCREMENT,
   DUREE_TEMPS TIME,
   ID_PARTICIPANT INT NOT NULL,
   ID_EPREUVE INT NOT NULL,
   PRIMARY KEY(ID_TEMPS),
   FOREIGN KEY(ID_PARTICIPANT) REFERENCES PARTICIPANT(ID_PARTICIPANT),
   FOREIGN KEY(ID_EPREUVE) REFERENCES EPREUVE(ID_EPREUVE)
);

CREATE USER IF NOT EXISTS 'raid_ckc'@'%' IDENTIFIED BY 'raid_ckc';

-- Privilèges globaux
GRANT SELECT, INSERT, UPDATE, DELETE, FILE ON *.* TO 'raid_ckc'@'%';

-- Privilèges sur une base de données spécifique (raid_ckc)
GRANT SELECT, INSERT, UPDATE, DELETE, REFERENCES, LOCK TABLES, CREATE VIEW, SHOW VIEW, EVENT, TRIGGER ON `raid_ckc`.* TO 'raid_ckc'@'%';
FLUSH PRIVILEGES;

INSERT INTO `categorie` (`ID_CATEGORIE`, `LIBELLE_CATEGORIE`) VALUES
(2, 'Femme'),
(1, 'Homme'),
(3, 'Mixte'),
(4, 'VAE');

INSERT INTO `raid` (`ID_RAID`, `LIBELLE_RAID`) VALUES
(1, 'Bol d\'air');

INSERT INTO `circuit` (`ID_CIRCUIT`, `LIBELLE_CIRCUIT`, `ID_RAID`) VALUES
(1, 'Bol d\'air', 1),
(2, 'Mini Bol d\'air', 1);

INSERT INTO `epreuve` (`ID_EPREUVE`, `LIBELLE_EPREUVE`, `ID_CIRCUIT`) VALUES
(1, 'Course a pied', 1),
(2, 'Canoe', 1),
(3, 'Vtt', 1),
(4, 'Course a pied', 2),
(5, 'Canoe', 2),
(6, 'Vtt', 2);

INSERT INTO `role` (`ID_ROLE`, `LIBELLE_ROLE`) VALUES
(1, 'admin'),
(3, 'pointeur'),
(2, 'secretaire');

-- Supprimez les données existantes pour les tables EQUIPE, PARTICIPANT et TEMPS
DELETE FROM TEMPS;
ALTER TABLE TEMPS AUTO_INCREMENT = 1;
DELETE FROM PARTICIPANT;
ALTER TABLE PARTICIPANT AUTO_INCREMENT = 1;
DELETE FROM EQUIPE;
ALTER TABLE EQUIPE AUTO_INCREMENT = 1;

-- Jeu d'essai pour la table EQUIPE avec 20 équipes
INSERT INTO EQUIPE (NUM_DOSSARD_EQUIPE, ID_CIRCUIT, ID_CATEGORIE) VALUES
-- Equipe pour le premier circuit
-- 5 équipes avec la catégorie "Hommes"
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
-- 5 équipes avec la catégorie "Femmes"
(6, 1, 2),
(7, 1, 2),
(8, 1, 2),
(9, 1, 2),
(10, 1, 2),
-- 5 équipes avec la catégorie "Mixte"
(11, 1, 3),
(12, 1, 3),
(13, 1, 3),
(14, 1, 3),
(15, 1, 3),
-- 5 équipes avec la catégorie "VAE"
(16, 1, 4),
(17, 1, 4),
(18, 1, 4),
(19, 1, 4),
(20, 1, 4),
-- Equipe pour le deuxième circuit
-- 5 équipes avec la catégorie "Hommes"
(21, 2, 1),
(22, 2, 1),
(23, 2, 1),
(24, 2, 1),
(25, 2, 1),
-- 5 équipes avec la catégorie "Femmes"
(26, 2, 2),
(27, 2, 2),
(28, 2, 2),
(29, 2, 2),
(30, 2, 2),
-- 5 équipes avec la catégorie "Mixte"
(31, 2, 3),
(32, 2, 3),
(33, 2, 3),
(34, 2, 3),
(35, 2, 3),
-- 5 équipes avec la catégorie "VAE"
(36, 2, 4),
(37, 2, 4),
(38, 2, 4),
(39, 2, 4),
(40, 2, 4);

-- Jeu d'essai pour la table PARTICIPANT avec 40 participants (2 par équipe)
-- Chaque participant aura un temps pour chaque épreuve (de 1 à 3)
-- Vous pouvez ajouter plus d'informations sur les participants si nécessaire
INSERT INTO PARTICIPANT (NOM_PARTICIPANT, PRENOM_PARTICIPANT, DATE_NAISSANCE_PARTICIPANT, ADRESSE_PARTICIPANT, CODE_POSTAL_PARTICIPANT, VILLE_PARTICIPANT, TELEPHONE_PARTICIPANT, CERTIFICAT_VALIDER_PARTICIPANT, CLUB_PARTICIPANT, ID_RFID, EMAIL_PARTICIPANT, ID_EQUIPE) VALUES
-- Participants pour les équipes de catégorie "Hommes"
('Participant 1', 'Homme 1', '1990-01-01', 'Adresse 1', '12345', 'Ville 1', '1111111111', 1, 'Club A', 'RFID001', 'participant1@exemple.com', 1),
('Participant 2', 'Homme 2', '1990-01-02', 'Adresse 2', '12346', 'Ville 2', '1111111112', 1, 'Club A', 'RFID002', 'participant2@exemple.com', 1),
('Participant 3', 'Homme 3', '1990-01-03', 'Adresse 3', '12347', 'Ville 3', '1111111113', 1, 'Club B', 'RFID003', 'participant3@exemple.com', 2),
('Participant 4', 'Homme 4', '1990-01-04', 'Adresse 4', '12348', 'Ville 4', '1111111114', 1, 'Club B', 'RFID004', 'participant4@exemple.com', 2),
('Participant 5', 'Homme 5', '1990-01-05', 'Adresse 5', '12349', 'Ville 5', '1111111115', 1, 'Club C', 'RFID005', 'participant5@exemple.com', 3),
('Participant 6', 'Homme 6', '1990-01-06', 'Adresse 6', '12350', 'Ville 6', '1111111116', 1, 'Club C', 'RFID006', 'participant6@exemple.com', 3),
('Participant 7', 'Homme 7', '1990-01-07', 'Adresse 7', '12351', 'Ville 7', '1111111117', 1, 'Club D', 'RFID007', 'participant7@exemple.com', 4),
('Participant 8', 'Homme 8', '1990-01-08', 'Adresse 8', '12352', 'Ville 8', '1111111118', 1, 'Club D', 'RFID008', 'participant8@exemple.com', 4),
('Participant 9', 'Homme 9', '1990-01-09', 'Adresse 9', '12353', 'Ville 9', '1111111119', 1, 'Club E', 'RFID009', 'participant9@exemple.com', 5),
('Participant 10', 'Homme 10', '1990-01-10', 'Adresse 10', '12354', 'Ville 10', '1111111120', 1, 'Club E', 'RFID010', 'participant10@exemple.com', 5),
-- Participants pour les équipes de catégorie "Femmes"
('Participant 11', 'Femme 1', '1990-01-11', 'Adresse 11', '12355', 'Ville 11', '1111111121', 1, 'Club F', 'RFID011', 'participant11@exemple.com', 6),
('Participant 12', 'Femme 2', '1990-01-12', 'Adresse 12', '12356', 'Ville 12', '1111111122', 1, 'Club F', 'RFID012', 'participant12@exemple.com', 6),
('Participant 13', 'Femme 3', '1990-01-13', 'Adresse 13', '12357', 'Ville 13', '1111111123', 1, 'Club G', 'RFID013', 'participant13@exemple.com', 7),
('Participant 14', 'Femme 4', '1990-01-14', 'Adresse 14', '12358', 'Ville 14', '1111111124', 1, 'Club G', 'RFID014', 'participant14@exemple.com', 7),
('Participant 15', 'Femme 5', '1990-01-15', 'Adresse 15', '12359', 'Ville 15', '1111111125', 1, 'Club H', 'RFID015', 'participant15@exemple.com', 8),
('Participant 16', 'Femme 6', '1990-01-16', 'Adresse 16', '12360', 'Ville 16', '1111111126', 1, 'Club H', 'RFID016', 'participant16@exemple.com', 8),
('Participant 17', 'Femme 7', '1990-01-17', 'Adresse 17', '12361', 'Ville 17', '1111111127', 1, 'Club I', 'RFID017', 'participant17@exemple.com', 9),
('Participant 18', 'Femme 8', '1990-01-18', 'Adresse 18', '12362', 'Ville 18', '1111111128', 1, 'Club I', 'RFID018', 'participant18@exemple.com', 9),
('Participant 19', 'Femme 9', '1990-01-19', 'Adresse 19', '12363', 'Ville 19', '1111111129', 1, 'Club J', 'RFID019', 'participant19@exemple.com', 10),
('Participant 20', 'Femme 10', '1990-01-20', 'Adresse 20', '12364', 'Ville 20', '1111111130', 1, 'Club J', 'RFID020', 'participant20@exemple.com', 10),
-- Participants pour les équipes de catégorie "Mixte"
('Participant 21', 'Mixte 1', '1990-01-21', 'Adresse 21', '12365', 'Ville 21', '1111111131', 1, 'Club K', 'RFID021', 'participant21@exemple.com', 11),
('Participant 22', 'Mixte 2', '1990-01-22', 'Adresse 22', '12366', 'Ville 22', '1111111132', 1, 'Club K', 'RFID022', 'participant22@exemple.com', 11),
('Participant 23', 'Mixte 3', '1990-01-23', 'Adresse 23', '12367', 'Ville 23', '1111111133', 1, 'Club L', 'RFID023', 'participant23@exemple.com', 12),
('Participant 24', 'Mixte 4', '1990-01-24', 'Adresse 24', '12368', 'Ville 24', '1111111134', 1, 'Club L', 'RFID024', 'participant24@exemple.com', 12),
('Participant 25', 'Mixte 5', '1990-01-25', 'Adresse 25', '12369', 'Ville 25', '1111111135', 1, 'Club M', 'RFID025', 'participant25@exemple.com', 13),
('Participant 26', 'Mixte 6', '1990-01-26', 'Adresse 26', '12370', 'Ville 26', '1111111136', 1, 'Club M', 'RFID026', 'participant26@exemple.com', 13),
('Participant 27', 'Mixte 7', '1990-01-27', 'Adresse 27', '12371', 'Ville 27', '1111111137', 1, 'Club N', 'RFID027', 'participant27@exemple.com', 14),
('Participant 28', 'Mixte 8', '1990-01-28', 'Adresse 28', '12372', 'Ville 28', '1111111138', 1, 'Club N', 'RFID028', 'participant28@exemple.com', 14),
('Participant 29', 'Mixte 9', '1990-01-29', 'Adresse 29', '12373', 'Ville 29', '1111111139', 1, 'Club O', 'RFID029', 'participant29@exemple.com', 15),
('Participant 30', 'Mixte 10', '1990-01-30', 'Adresse 30', '12374', 'Ville 30', '1111111140', 1, 'Club O', 'RFID030', 'participant30@exemple.com', 15),
-- Participants pour les équipes de catégorie "VAE"
('Participant 31', 'VAE 1', '1990-01-31', 'Adresse 31', '12375', 'Ville 31', '1111111141', 1, 'Club P', 'RFID031', 'participant31@exemple.com', 16),
('Participant 32', 'VAE 2', '1990-02-01', 'Adresse 32', '12376', 'Ville 32', '1111111142', 1, 'Club P', 'RFID032', 'participant32@exemple.com', 16),
('Participant 33', 'VAE 3', '1990-02-02', 'Adresse 33', '12377', 'Ville 33', '1111111143', 1, 'Club Q', 'RFID033', 'participant33@exemple.com', 17),
('Participant 34', 'VAE 4', '1990-02-03', 'Adresse 34', '12378', 'Ville 34', '1111111144', 1, 'Club Q', 'RFID034', 'participant34@exemple.com', 17),
('Participant 35', 'VAE 5', '1990-02-04', 'Adresse 35', '12379', 'Ville 35', '1111111145', 1, 'Club R', 'RFID035', 'participant35@exemple.com', 18),
('Participant 36', 'VAE 6', '1990-02-05', 'Adresse 36', '12380', 'Ville 36', '1111111146', 1, 'Club R', 'RFID036', 'participant36@exemple.com', 18),
('Participant 37', 'VAE 7', '1990-02-06', 'Adresse 37', '12381', 'Ville 37', '1111111147', 1, 'Club S', 'RFID037', 'participant37@exemple.com', 19),
('Participant 38', 'VAE 8', '1990-02-07', 'Adresse 38', '12382', 'Ville 38', '1111111148', 1, 'Club S', 'RFID038', 'participant38@exemple.com', 19),
('Participant 39', 'VAE 9', '1990-02-08', 'Adresse 39', '12383', 'Ville 39', '1111111149', 1, 'Club T', 'RFID039', 'participant39@exemple.com', 20),
('Participant 40', 'VAE 10', '1990-02-09', 'Adresse 40', '12384', 'Ville 40', '1111111150', 1, 'Club T', 'RFID040', 'participant40@exemple.com', 20),

-- Participants pour les équipes de catégorie "Hommes" (Circuit 2)
-- Participants pour les équipes 21 à 25
('Participant 41', 'Homme 21-1', '1990-03-01', 'Adresse 21-1', '12385', 'Ville 21-1', '1111111151', 1, 'Club A', 'RFID041', 'participant41@exemple.com', 21),
('Participant 42', 'Homme 21-2', '1990-03-02', 'Adresse 21-2', '12386', 'Ville 21-2', '1111111152', 1, 'Club A', 'RFID042', 'participant42@exemple.com', 21),
('Participant 43', 'Homme 22-1', '1990-03-03', 'Adresse 22-1', '12387', 'Ville 22-1', '1111111153', 1, 'Club B', 'RFID043', 'participant43@exemple.com', 22),
('Participant 44', 'Homme 22-2', '1990-03-04', 'Adresse 22-2', '12388', 'Ville 22-2', '1111111154', 1, 'Club B', 'RFID044', 'participant44@exemple.com', 22),
('Participant 45', 'Homme 23-1', '1990-03-05', 'Adresse 23-1', '12389', 'Ville 23-1', '1111111155', 1, 'Club C', 'RFID045', 'participant45@exemple.com', 23),
('Participant 46', 'Homme 23-2', '1990-03-06', 'Adresse 23-2', '12390', 'Ville 23-2', '1111111156', 1, 'Club C', 'RFID046', 'participant46@exemple.com', 23),
('Participant 47', 'Homme 24-1', '1990-03-07', 'Adresse 24-1', '12391', 'Ville 24-1', '1111111157', 1, 'Club D', 'RFID047', 'participant47@exemple.com', 24),
('Participant 48', 'Homme 24-2', '1990-03-08', 'Adresse 24-2', '12392', 'Ville 24-2', '1111111158', 1, 'Club D', 'RFID048', 'participant48@exemple.com', 24),
('Participant 49', 'Homme 25-1', '1990-03-09', 'Adresse 25-1', '12393', 'Ville 25-1', '1111111159', 1, 'Club E', 'RFID049', 'participant49@exemple.com', 25),
('Participant 50', 'Homme 25-2', '1990-03-10', 'Adresse 25-2', '12394', 'Ville 25-2', '1111111160', 1, 'Club E', 'RFID050', 'participant50@exemple.com', 25),

-- Participants pour les équipes de catégorie "Femmes" (Circuit 2)
-- Participants pour les équipes 26 à 30
('Participant 51', 'Femme 26-1', '1990-03-11', 'Adresse 26-1', '12395', 'Ville 26-1', '1111111161', 1, 'Club F', 'RFID051', 'participant51@exemple.com', 26),
('Participant 52', 'Femme 26-2', '1990-03-12', 'Adresse 26-2', '12396', 'Ville 26-2', '1111111162', 1, 'Club F', 'RFID052', 'participant52@exemple.com', 26),
('Participant 53', 'Femme 27-1', '1990-03-13', 'Adresse 27-1', '12397', 'Ville 27-1', '1111111163', 1, 'Club G', 'RFID053', 'participant53@exemple.com', 27),
('Participant 54', 'Femme 27-2', '1990-03-14', 'Adresse 27-2', '12398', 'Ville 27-2', '1111111164', 1, 'Club G', 'RFID054', 'participant54@exemple.com', 27),
('Participant 55', 'Femme 28-1', '1990-03-15', 'Adresse 28-1', '12399', 'Ville 28-1', '1111111165', 1, 'Club H', 'RFID055', 'participant55@exemple.com', 28),
('Participant 56', 'Femme 28-2', '1990-03-16', 'Adresse 28-2', '12400', 'Ville 28-2', '1111111166', 1, 'Club H', 'RFID056', 'participant56@exemple.com', 28),
('Participant 57', 'Femme 29-1', '1990-03-17', 'Adresse 29-1', '12401', 'Ville 29-1', '1111111167', 1, 'Club I', 'RFID057', 'participant57@exemple.com', 29),
('Participant 58', 'Femme 29-2', '1990-03-18', 'Adresse 29-2', '12402', 'Ville 29-2', '1111111168', 1, 'Club I', 'RFID058', 'participant58@exemple.com', 29),
('Participant 59', 'Femme 30-1', '1990-03-19', 'Adresse 30-1', '12403', 'Ville 30-1', '1111111169', 1, 'Club J', 'RFID059', 'participant59@exemple.com', 30),
('Participant 60', 'Femme 30-2', '1990-03-20', 'Adresse 30-2', '12404', 'Ville 30-2', '1111111170', 1, 'Club J', 'RFID060', 'participant60@exemple.com', 30),

-- Participants pour les équipes de catégorie "Mixte" (Circuit 2)
-- Participants pour les équipes 31 à 35
('Participant 61', 'Mixte 31-1', '1990-03-21', 'Adresse 31-1', '12405', 'Ville 31-1', '1111111171', 1, 'Club K', 'RFID061', 'participant61@exemple.com', 31),
('Participant 62', 'Mixte 31-2', '1990-03-22', 'Adresse 31-2', '12406', 'Ville 31-2', '1111111172', 1, 'Club K', 'RFID062', 'participant62@exemple.com', 31),
('Participant 63', 'Mixte 32-1', '1990-03-23', 'Adresse 32-1', '12407', 'Ville 32-1', '1111111173', 1, 'Club L', 'RFID063', 'participant63@exemple.com', 32),
('Participant 64', 'Mixte 32-2', '1990-03-24', 'Adresse 32-2', '12408', 'Ville 32-2', '1111111174', 1, 'Club L', 'RFID064', 'participant64@exemple.com', 32),
('Participant 65', 'Mixte 33-1', '1990-03-25', 'Adresse 33-1', '12409', 'Ville 33-1', '1111111175', 1, 'Club M', 'RFID065', 'participant65@exemple.com', 33),
('Participant 66', 'Mixte 33-2', '1990-03-26', 'Adresse 33-2', '12410', 'Ville 33-2', '1111111176', 1, 'Club M', 'RFID066', 'participant66@exemple.com', 33),
('Participant 67', 'Mixte 34-1', '1990-03-27', 'Adresse 34-1', '12411', 'Ville 34-1', '1111111177', 1, 'Club N', 'RFID067', 'participant67@exemple.com', 34),
('Participant 68', 'Mixte 34-2', '1990-03-28', 'Adresse 34-2', '12412', 'Ville 34-2', '1111111178', 1, 'Club N', 'RFID068', 'participant68@exemple.com', 34),
('Participant 69', 'Mixte 35-1', '1990-03-29', 'Adresse 35-1', '12413', 'Ville 35-1', '1111111179', 1, 'Club O', 'RFID069', 'participant69@exemple.com', 35),
('Participant 70', 'Mixte 35-2', '1990-03-30', 'Adresse 35-2', '12414', 'Ville 35-2', '1111111180', 1, 'Club O', 'RFID070', 'participant70@exemple.com', 35),

-- Participants pour les équipes de catégorie "VAE" (Circuit 2)
-- Participants pour les équipes 36 à 40
('Participant 71', 'VAE 36-1', '1990-03-31', 'Adresse 36-1', '12415', 'Ville 36-1', '1111111181', 1, 'Club P', 'RFID071', 'participant71@exemple.com', 36),
('Participant 72', 'VAE 36-2', '1990-04-01', 'Adresse 36-2', '12416', 'Ville 36-2', '1111111182', 1, 'Club P', 'RFID072', 'participant72@exemple.com', 36),
('Participant 73', 'VAE 37-1', '1990-04-02', 'Adresse 37-1', '12417', 'Ville 37-1', '1111111183', 1, 'Club Q', 'RFID073', 'participant73@exemple.com', 37),
('Participant 74', 'VAE 37-2', '1990-04-03', 'Adresse 37-2', '12418', 'Ville 37-2', '1111111184', 1, 'Club Q', 'RFID074', 'participant74@exemple.com', 37),
('Participant 75', 'VAE 38-1', '1990-04-04', 'Adresse 38-1', '12419', 'Ville 38-1', '1111111185', 1, 'Club R', 'RFID075', 'participant75@exemple.com', 38),
('Participant 76', 'VAE 38-2', '1990-04-05', 'Adresse 38-2', '12420', 'Ville 38-2', '1111111186', 1, 'Club R', 'RFID076', 'participant76@exemple.com', 38),
('Participant 77', 'VAE 39-1', '1990-04-06', 'Adresse 39-1', '12421', 'Ville 39-1', '1111111187', 1, 'Club S', 'RFID077', 'participant77@exemple.com', 39),
('Participant 78', 'VAE 39-2', '1990-04-07', 'Adresse 39-2', '12422', 'Ville 39-2', '1111111188', 1, 'Club S', 'RFID078', 'participant78@exemple.com', 39),
('Participant 79', 'VAE 40-1', '1990-04-08', 'Adresse 40-1', '12423', 'Ville 40-1', '1111111189', 1, 'Club T', 'RFID079', 'participant79@exemple.com', 40),
('Participant 80', 'VAE 40-2', '1990-04-09', 'Adresse 40-2', '12424', 'Ville 40-2', '1111111190', 1, 'Club T', 'RFID080', 'participant80@exemple.com', 40);

-- Jeu d'essai pour la table TEMPS avec les temps pour chaque participant et chaque épreuve
-- Vous pouvez ajuster les valeurs des temps comme nécessaire
-- Chaque participant a un temps pour chaque épreuve (de 1 à 3)
INSERT INTO TEMPS (DUREE_TEMPS, ID_PARTICIPANT, ID_EPREUVE) VALUES
-- Temps pour l'épreuve 1 (Course à pied)
('02:00:45', 1, 1),
('02:05:30', 2, 1),
('02:10:15', 3, 1),
('02:15:00', 4, 1),
('02:20:30', 5, 1),
('02:11:55', 6, 1),
('02:12:40', 7, 1),
('02:18:20', 8, 1),
('02:25:45', 9, 1),
('02:30:10', 10, 1),
('01:55:10', 11, 1),
('01:50:20', 12, 1),
('01:58:10', 13, 1),
('01:45:30', 14, 1),
('01:52:45', 15, 1),
('01:48:55', 16, 1),
('01:58:15', 17, 1),
('01:53:20', 18, 1),
('01:59:35', 19, 1),
('01:47:15', 20, 1),
('02:00:45', 21, 1),
('02:05:30', 22, 1),
('02:10:15', 23, 1),
('02:15:00', 24, 1),
('02:20:30', 25, 1),
('02:11:55', 26, 1),
('02:12:40', 27, 1),
('02:18:20', 28, 1),
('02:25:45', 29, 1),
('02:30:10', 30, 1),
('01:55:10', 31, 1),
('01:50:20', 32, 1),
('01:58:10', 33, 1),
('01:45:30', 34, 1),
('01:52:45', 35, 1),
('01:48:55', 36, 1),
('01:58:15', 37, 1),
('01:53:20', 38, 1),
('01:59:35', 39, 1),
('01:47:15', 40, 1),
-- Temps pour l'épreuve 2 (Canoe)
('01:15:10', 1, 2),
('01:10:20', 2, 2),
('01:20:10', 3, 2),
('01:05:30', 4, 2),
('01:12:45', 5, 2),
('01:08:55', 6, 2),
('01:18:15', 7, 2),
('01:13:20', 8, 2),
('01:19:35', 9, 2),
('01:07:15', 10, 2),
('01:05:10', 11, 2),
('01:10:20', 12, 2),
('01:08:10', 13, 2),
('01:15:30', 14, 2),
('01:12:45', 15, 2),
('01:18:55', 16, 2),
('01:10:15', 17, 2),
('01:14:20', 18, 2),
('01:09:35', 19, 2),
('01:07:15', 20, 2),
('01:15:10', 21, 2),
('01:10:20', 22, 2),
('01:20:10', 23, 2),
('01:05:30', 24, 2),
('01:12:45', 25, 2),
('01:08:55', 26, 2),
('01:18:15', 27, 2),
('01:13:20', 28, 2),
('01:19:35', 29, 2),
('01:07:15', 30, 2),
('01:05:10', 31, 2),
('01:10:20', 32, 2),
('01:08:10', 33, 2),
('01:15:30', 34, 2),
('01:12:45', 35, 2),
('01:18:55', 36, 2),
('01:10:15', 37, 2),
('01:14:20', 38, 2),
('01:09:35', 39, 2),
('01:07:15', 40, 2),
-- Temps pour l'épreuve 3 (VTT)
('01:25:10', 1, 3),
('01:30:20', 2, 3),
('01:28:10', 3, 3),
('01:35:30', 4, 3),
('01:42:45', 5, 3),
('01:38:55', 6, 3),
('01:48:15', 7, 3),
('01:53:20', 8, 3),
('01:49:35', 9, 3),
('01:57:15', 10, 3),
('01:35:10', 11, 3),
('01:40:20', 12, 3),
('01:38:10', 13, 3),
('01:45:30', 14, 3),
('01:52:45', 15, 3),
('01:48:55', 16, 3),
('01:58:15', 17, 3),
('01:53:20', 18, 3),
('01:59:35', 19, 3),
('01:47:15', 20, 3),
('01:25:10', 21, 3),
('01:30:20', 22, 3),
('01:28:10', 23, 3),
('01:35:30', 24, 3),
('01:42:45', 25, 3),
('01:38:55', 26, 3),
('01:48:15', 27, 3),
('01:53:20', 28, 3),
('01:49:35', 29, 3),
('01:57:15', 30, 3),
('01:35:10', 31, 3),
('01:40:20', 32, 3),
('01:38:10', 33, 3),
('01:45:30', 34, 3),
('01:52:45', 35, 3),
('01:48:55', 36, 3),
('01:58:15', 37, 3),
('01:53:20', 38, 3),
('01:59:35', 39, 3),
('01:47:15', 40, 3),
-- Temps pour l'épreuve 4 (Course à pied)
('00:25:35', 41, 4),
('00:26:20', 42, 4),
('00:24:45', 43, 4),
('00:25:30', 44, 4),
('00:24:15', 45, 4),
('00:24:55', 46, 4),
('00:26:45', 47, 4),
('00:25:15', 48, 4),
('00:24:40', 49, 4),
('00:25:05', 50, 4),
('00:25:55', 51, 4),
('00:24:30', 52, 4),
('00:25:10', 53, 4),
('00:26:35', 54, 4),
('00:25:20', 55, 4),
('00:24:25', 56, 4),
('00:25:50', 57, 4),
('00:24:10', 58, 4),
('00:25:40', 59, 4),
('00:26:15', 60, 4),
('00:24:20', 61, 4),
('00:25:45', 62, 4),
('00:25:00', 63, 4),
('00:24:50', 64, 4),
('00:26:00', 65, 4),
('00:25:25', 66, 4),
('00:24:35', 67, 4),
('00:25:30', 68, 4),
('00:26:30', 69, 4),
('00:25:35', 70, 4),
('00:25:45', 71, 4),
('00:26:05', 72, 4),
('00:25:05', 73, 4),
('00:24:45', 74, 4),
('00:26:15', 75, 4),
('00:25:20', 76, 4),
('00:25:15', 77, 4),
('00:24:30', 78, 4),
('00:25:25', 79, 4),
('00:24:55', 80, 4),
-- Temps pour l'épreuve 5 (Canoe)
('01:45:10', 41, 5),
('01:40:20', 42, 5),
('01:48:10', 43, 5),
('01:35:30', 44, 5),
('01:42:45', 45, 5),
('01:38:55', 46, 5),
('01:48:15', 47, 5),
('01:53:20', 48, 5),
('01:49:35', 49, 5),
('01:57:15', 50, 5),
('01:35:10', 51, 5),
('01:40:20', 52, 5),
('01:38:10', 53, 5),
('01:45:30', 54, 5),
('01:52:45', 55, 5),
('01:48:55', 56, 5),
('01:58:15', 57, 5),
('01:53:20', 58, 5),
('01:59:35', 59, 5),
('01:47:15', 60, 5),
('01:45:10', 61, 5),
('01:40:20', 62, 5),
('01:48:10', 63, 5),
('01:35:30', 64, 5),
('01:42:45', 65, 5),
('01:38:55', 66, 5),
('01:48:15', 67, 5),
('01:53:20', 68, 5),
('01:49:35', 69, 5),
('01:57:15', 70, 5),
('01:35:10', 71, 5),
('01:40:20', 72, 5),
('01:38:10', 73, 5),
('01:45:30', 74, 5),
('01:52:45', 75, 5),
('01:48:55', 76, 5),
('01:58:15', 77, 5),
('01:53:20', 78, 5),
('01:59:35', 79, 5),
('01:47:15', 80, 5),
-- Temps pour l'épreuve 6 (VTT)
('00:35:10', 41, 6),
('00:30:20', 42, 6),
('00:38:10', 43, 6),
('00:25:30', 44, 6),
('00:32:45', 45, 6),
('00:28:55', 46, 6),
('00:38:15', 47, 6),
('00:33:20', 48, 6),
('00:39:35', 49, 6),
('00:27:15', 50, 6),
('00:25:10', 51, 6),
('00:30:20', 52, 6),
('00:28:10', 53, 6),
('00:35:30', 54, 6),
('00:32:45', 55, 6),
('00:38:55', 56, 6),
('00:30:15', 57, 6),
('00:34:20', 58, 6),
('00:29:35', 59, 6),
('00:27:15', 60, 6),
('00:35:10', 61, 6),
('00:30:20', 62, 6),
('00:38:10', 63, 6),
('00:25:30', 64, 6),
('00:32:45', 65, 6),
('00:28:55', 66, 6),
('00:38:15', 67, 6),
('00:33:20', 68, 6),
('00:39:35', 69, 6),
('00:27:15', 70, 6),
('00:25:10', 71, 6),
('00:30:20', 72, 6),
('00:28:10', 73, 6),
('00:35:30', 74, 6),
('00:32:45', 75, 6),
('00:38:55', 76, 6),
('00:30:10', 77, 6),
('00:34:20', 78, 6),
('00:29:35', 79, 6),
('00:27:15', 80, 6);

INSERT INTO `utilisateur` (`ID_UTILISATEUR`, `LOGIN_UTILISATEUR`, `MOT_DE_PASSE_UTILISATEUR`, `ID_ROLE`) VALUES
(1, 'admin', '$2y$10$Ktm9u86AoLD8ua9hW9J/5uhdhFvuWqK8QHwhXV8Dl1mpMsTfHwdxe', 1),
(2, 'secretaire', '$2y$10$2GQGr5WAQVJtf4KrYSbpH.3TpNGPL7WCf7YnLj8Psdb7cloJGDgwW', 2),
(3, 'pointeur', '$2y$10$u2k1PC8Lu61yOKNgJNCSLuZqDC7UPgGXuwUOMDBalpAghx6vlu6YG', 3);

CREATE VIEW TempsMinParticipantCircuit1 AS 
SELECT T.ID_PARTICIPANT, 
  MIN(CASE WHEN T.ID_EPREUVE = 1 THEN T.DUREE_TEMPS ELSE NULL END) AS "Course_a_pied", 
  MIN(CASE WHEN T.ID_EPREUVE = 2 THEN T.DUREE_TEMPS ELSE NULL END) AS "Canoe", 
  MIN(CASE WHEN T.ID_EPREUVE = 3 THEN T.DUREE_TEMPS ELSE NULL END) AS "VTT",
  SEC_TO_TIME(
    SUM(
      TIME_TO_SEC(CASE WHEN T.ID_EPREUVE = 1 THEN T.DUREE_TEMPS ELSE '00:00:00' END) +
      TIME_TO_SEC(CASE WHEN T.ID_EPREUVE = 2 THEN T.DUREE_TEMPS ELSE '00:00:00' END) +
      TIME_TO_SEC(CASE WHEN T.ID_EPREUVE = 3 THEN T.DUREE_TEMPS ELSE '00:00:00' END)
    )
  ) AS TempsCumule
FROM TEMPS T 
JOIN PARTICIPANT P ON T.ID_PARTICIPANT = P.ID_PARTICIPANT
JOIN EQUIPE E ON P.ID_EQUIPE = E.ID_EQUIPE
WHERE E.ID_CIRCUIT = 1
GROUP BY T.ID_PARTICIPANT;

CREATE VIEW TempsMinParticipantCircuit2 AS 
SELECT T.ID_PARTICIPANT, 
  MIN(CASE WHEN T.ID_EPREUVE = 4 THEN T.DUREE_TEMPS ELSE NULL END) AS "Course_a_pied", 
  MIN(CASE WHEN T.ID_EPREUVE = 5 THEN T.DUREE_TEMPS ELSE NULL END) AS "Canoe", 
  MIN(CASE WHEN T.ID_EPREUVE = 6 THEN T.DUREE_TEMPS ELSE NULL END) AS "VTT",
  SEC_TO_TIME(
    SUM(
      TIME_TO_SEC(CASE WHEN T.ID_EPREUVE = 4 THEN T.DUREE_TEMPS ELSE '00:00:00' END) +
      TIME_TO_SEC(CASE WHEN T.ID_EPREUVE = 5 THEN T.DUREE_TEMPS ELSE '00:00:00' END) +
      TIME_TO_SEC(CASE WHEN T.ID_EPREUVE = 6 THEN T.DUREE_TEMPS ELSE '00:00:00' END)
    )
  ) AS TempsCumule
FROM TEMPS T 
JOIN PARTICIPANT P ON T.ID_PARTICIPANT = P.ID_PARTICIPANT
JOIN EQUIPE E ON P.ID_EQUIPE = E.ID_EQUIPE
WHERE E.ID_CIRCUIT = 2
GROUP BY T.ID_PARTICIPANT;