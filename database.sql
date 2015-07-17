#Schemat bazy
CREATE TABLE ksiazki
( id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
tytul varchar(25) NOT NULL,
autor varchar(20) NULL,
rok_wydania int(4) NULL,
wydawnictwo varchar(20) NULL,
ISBN int(13) NULL);

#Wyswietlenie wszystkich
SELECT * FROM ksiazki;

#Wyswietlenie konkretnego
SELECT tytul FROM ksiazki WHERE id = 4;

#Usuniecie jednego
DELETE FROM ksiazki WHERE id = 4;

#Edycja jednego
UPDATE ksiazki SET title = new WHERE id = 4;
