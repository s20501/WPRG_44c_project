CREATE TABLE user (
                          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          login VARCHAR(30) NOT NULL,
                          haslo VARCHAR(30) NOT NULL,
                          admin BIT
);

INSERT INTO user (login, haslo, admin)
VALUES ('admin','admin', 1);

INSERT INTO user (login, haslo, admin)
VALUES ('user','user', 1);