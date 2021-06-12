CREATE TABLE user (
                          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          login VARCHAR(30) NOT NULL,
                          haslo VARCHAR(30) NOT NULL,
                          ilosc_wypozyczen INT(6),
                          admin BIT
);

INSERT INTO user (login, haslo, admin,ilosc_wypozyczen)
VALUES ('admin','admin', 1, 0);

INSERT INTO user (login, haslo, admin,ilosc_wypozyczen)
VALUES ('user','user', 0, 0);

CREATE TABLE historia (
                          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          login VARCHAR(30) NOT NULL,
                          tytul VARCHAR(30) NOT NULL,
                          akcja VARCHAR(30) NOT NULL,
                          data datetime NOT NULL
);

CREATE TABLE biblioteka (
                          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          termin datetime,
                          wypozyczona VARCHAR(30) NOT NULL,
                          tytul VARCHAR(30) NOT NULL,
                          autor VARCHAR(30) NOT NULL

);