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
UPDATE ksiazki SET tytul = 'new' WHERE id = 4;

#wstawienie dodatkowego
INSERT INTO ksiazki (tytul) values ('Ziarno Prawdy');


        DEFINE ('DB_USER', 'root');
        DEFINE ('DB_PASSWORD', '');
        DEFINE ('DB_HOST', 'localhost');
        DEFINE ('DB_NAME', 'ksiegarnia');

        // nawiąż połączenie
        $dbc = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) OR die ('Nie udało się połączyć z MySQL-em: ' . mysql_error());

        @mysql_select_db(DB_NAME) OR die ('Nie udało mi się bazy danych: ' . mysql_error());