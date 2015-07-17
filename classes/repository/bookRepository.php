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
        $this->load();
    }

    /**
     * Metoda dodaje książkę do repozytorium
     * @param Book $book
     */


    public function addBook($book)
    {
        $this->bookList[] = $book;
        #SQL dodanie jednego
        mysql_query()
    }
    /**
     * Metoda zrwaca listę książek
     * @return array $book
     */
    public function getBookList()
    {
        return $this->bookList;
        #SQL pobranie wszystkich
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


    public function editBook($index,$title)
    {
        $this->getBookList()[$index]->setTitle($title);
        $this->save();
        #SQL edycja pojedynczego
    }


    public function deleteBook($index)
    {
        unset($this->bookList[$index]);
        $this->save();
        #SQL usuniecie pojedynczego
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