-- Create the players table
CREATE TABLE players (
  player_id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  ranking INT NOT NULL,
  points INT NOT NULL,
  birth_date DATE NOT NULL
);

-- Create the racquet_specifications table
CREATE TABLE racquet_specifications (
  spec_id INT AUTO_INCREMENT PRIMARY KEY,
  player_id INT NOT NULL,
  brand VARCHAR(50) NOT NULL,
  model VARCHAR(50) NOT NULL,
  head_size INT NOT NULL,
  weight FLOAT NOT NULL,
  balance FLOAT NOT NULL,
  string_pattern VARCHAR(50) NOT NULL,
  FOREIGN KEY (player_id) REFERENCES players(player_id)
);