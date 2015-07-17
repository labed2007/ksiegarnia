<?php

/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 15.07.15
 * Time: 16:47
 */
class bookRepository
{

    /**
     * @var
     */
    private $fileName = 'database.txt';
    private $bookList;


    function __construct()
    {

        //$this->load();


    }

    /**
     * Metoda dodaje książkę do repozytorium
     * @param Book $book
     */


    public function addBook($book)
    {
        $query = 'INSERT INTO ksiazki (tytul) values (\''. $book->getTitle(). '\')';
        config::getMysqlConnection()->query($query);
    }

    /**
     * Metoda zrwaca listę książek
     * @return array $book
     */
    public function getBookList()
    {
        $query = "SELECT id, tytul FROM ksiazki";
        $result = config::getMysqlConnection()->query($query);
        $this->bookList = [];
        while($row = mysqli_fetch_array($result)) {
            $id = $row["id"];
            $tytul = $row["tytul"];
            $this->bookList[] = new Book($tytul,$id);
        }
        return $this->bookList;
    }
    public function getBook($index) {


        $query = 'SELECT id, tytul FROM ksiazki WHERE id = (\''. $index. '\')';
        $result = config::getMysqlConnection()->query($query);
        $row = mysqli_fetch_array($result);
        $id = $row["id"];
        $tytul = $row["tytul"];
        return new Book($tytul,$id);
    }

    public function setBookList($bookList)
    {
        $this->bookList = $bookList;
    }

    public function sort()
    {
        usort($this->bookList,
            function ($a, $b) {
                setlocale(LC_COLLATE, 'pl_PL.UTF-8'); // Example of Polish language collation
                return strcoll($a->getTitle(), $b->getTitle());
            });
    }


    public function editBook($index, $title)
    {
        $query = 'UPDATE ksiazki set tytul = \''. $title. '\' WHERE id = '. $index;
        config::getMysqlConnection()->query($query);
    }


    public function deleteBook($index)
    {
        $query = "DELETE FROM ksiazki WHERE id = $index";
        $result = config::getMysqlConnection()->query($query);
    }

    public function save()
    {
        $fileHandle = fopen($this->fileName, 'w+') or die("File creation errror");
        fwrite($fileHandle, serialize($this->getBookList()));
        fclose($fileHandle);
    }

    public function load()
    {
        $fileHandle = fopen($this->fileName, 'r') or die("File creation errror");
        $this->setBookList(unserialize(fread($fileHandle, filesize($this->fileName))));
        fclose($fileHandle);
    }
}

?>