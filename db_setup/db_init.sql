DROP TABLE IF EXISTS racquet_specifications;
DROP TABLE IF EXISTS players;


-- Create the players table
CREATE TABLE players (
  player_id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  country VARCHAR(50) NOT NULL,
  points INT NOT NULL,
  birth_date DATE NOT NULL
);

-- Create the racquet_specifications table
CREATE TABLE racquet_specifications (
  spec_id INT AUTO_INCREMENT PRIMARY KEY,
  player_id INT NOT NULL,
  brand VARCHAR(50) NOT NULL,
  model VARCHAR(50) NOT NULL,
  head_size FLOAT NOT NULL,
  weight FLOAT NOT NULL,
  string_pattern VARCHAR(50) NOT NULL,
  FOREIGN KEY (player_id) REFERENCES players(player_id)
);

-- Insert data into the players table
INSERT INTO players (first_name, last_name, country, ranking, points, birth_date)
VALUES ("Novak", "Djokovic", "SRB",  7070, '1987-05-22'),
	   ("Carlos", "Alcaraz", "ESP",  6480, '2003-05-05)'),
	   ("Stefanos", "Tsitsipas", "GRE", 5940, '1998-08-12'),
	   ("Casper", "Ruud", "NOR", 5515, '1998-12-22'),
	   ("Andrey", "Rublev", "RUS", 3860, '1997-10-20'),
	   ("Rafael", "Nadal", "ESP", 3815, '1986-06-03'),
	   ("Taylor", "Fritz", "USA", 3660, '1997-10-28'),
	   ("Daniil", "Medvedev", "RUS", 3805, '1996-02-11'),
	   ("Felix", "Auger-Aliassime", "CAN", 3200, '2000-08-08'),
	   ("Holger", "Rune", "NOR",  3161, '1997-06-20'),
	   ("Hubert", "Hurkacz", "POL",  2995, '1997-02-11'),
	   ("Jannik", "Sinner", "ITA",  2745, '2001-08-16'),
	   ("Cameron", "Norrie", "GBR",  2615, '1995-08-23'),
	   ("Karen", "Khachanov", "RUS",  2470, '1996-05-21'),
	   ("Frances", "Tiafoe", "USA",  2350, '1998-01-20'),
	   ("Alexander", "Zverev", "GER",  2320, '1997-04-20'),
	   ("Pablo Carenno", "Busta", "ESP",  2285, '1991-07-12'),
	   ("Lorenzo", "Musetti", "ITA",  1855, '2002-03-03' ),
	   ("Nick", "Kyrgios", "AUS",  1825, '1995-04-27'),
	   ("Borna", "Coric", "CRO",  1815, '1996-11-14');


-- Insert data into the racquet_specifications table
INSERT INTO racquet_specifications (player_id, brand, model, head_size, weight, string_pattern)
VALUES (1, "Head", "PT 346.1 Pro Stock", 95, 354, "18x19"),
	   (2, "Babolat", "Pure Aero VS 2020",98, 320, "16x20"),
	   (3, "Wilson", "Blade 98 v4", 98, 335, "18x20"),
	   (4, "Yonex", "Ezone DR 100+", 100, 330, "16x19"),
	   (5, "Head", "Gravity Pro", 100, 358, "18x20"),
	   (6, "Babolat", "AeroPro Drive Original", 100, 340, "16x19"),
	   (7, "Head", "IG Radical MP", 98, 315, "18x20"),
	   (8, "Technifibre", "T Fight Dynacore 95", 95, 354, "18x19"),
	   (9, "Babolat", "Pure Aero VS", 98, 330, "16x20"),
	   (10, "Babolat", "Pure Aero VS 2020", 98, 337, "16x20"),
	   (11, "Yonex", "Vcore Pro", 97, 323, "16x19"),
	   (12, "Head", "Speed MP", 100, 325, "16x19"),
	   (13, "Babolat", "Pure Control", 98, 323, "16x19"),
	   (14, "Wilson", "Blade 98", 98, 347, "18x20"),
	   (15, "Yonex", "Vcore Pro 97", 97, 326, "16x19"),
	   (16, "Head", "Head Graphene 360+ Gravity Pro", 100, 332, "18x20"),
	   (17, "Wilson", "Burn", 98, 346, "18x20"),
	   (18, "Head", "Boom Pro", 98, 323, "16x19"),
	   (19, "Yonex", "Xi 98", 98, 343, "16x19"),
	   (20, "Wilson", "Ultra 100", 100, 318, "16x19");




