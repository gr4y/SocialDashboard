DROP TABLE IF EXISTS users;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT,
  username VARCHAR(128) NOT NULL,
  email VARCHAR(128) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role_id INT DEFAULT 0,
  registration_date DATETIME NOT NULL,
  last_login_date DATETIME NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY (email)
) ENGINE InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

INSERT INTO users (username, email, `password`, `role_id`, registration_date)
VALUES ( 'admin', 'admin@example.com', '$2y$05$5cQuysBmK9eGOWvnc0vSkuBwHE1qWT9gTR19nC2IyTa2p7tnVIY7i',
  999, 'NOW()' );

DROP TABLE IF EXISTS roles;
CREATE TABLE IF NOT EXISTS roles (
  id INT(3) AUTO_INCREMENT,
  role VARCHAR(16) NOT NULL,
  PRIMARY KEY (id)
) ENGINE InnoDB CHARSET=utf8 COLLATE utf8_general_ci;

INSERT INTO roles VALUES (0, 'user');
INSERT INTO roles VALUES (999, 'admin');
