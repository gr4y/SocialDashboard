CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT,
  username VARCHAR(128) NOT NULL,
  email VARCHAR(128) NOT NULL,
  password VARCHAR(255) NOT NULL,
  registerDate DATETIME NOT NULL,
  lastLoginDate DATETIME NOT NULL,
  PRIMARY KEY (id)
) ENGINE InnoDB;
