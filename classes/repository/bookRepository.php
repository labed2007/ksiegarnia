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
    private $bookList;

    /**
     * Metoda dodaje książkę do repozytorium
     * @param Book $book
     */
    public function addBook($book)
    {
        $this->bookList[] = $book;
    }

    /**
     * Metoda zrwaca listę książek
     * @return array $book
     */
    public function getBooks()
    {
        return $this->bookList;
    }

}

?>