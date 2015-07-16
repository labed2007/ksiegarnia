<?php

/**
 * Created by PhpStorm.
 * User: pawel
 * Date: 15.07.15
 * Time: 16:47
 */
class bookRepository
{

    private $bookList = array();

    public function addBook($book)
    {
        $bookList[] = $book;
    }

    public function getBook()
    {
        return $bookList;//print_r(array_values($tablica));
    }

}

?>