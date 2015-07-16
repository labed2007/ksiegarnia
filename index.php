<?php
include 'classes/domain/book.php';
include 'classes/repository/bookRepository.php';


$ksiazka = new book('Bezcenny');

$ksiazki = new bookRepository();
$ksiazki->addBook($ksiazka);
$ksiazki->addBook(new book('Ziarno prawdy'));
$ksiazki->addBook(new book('Ziarno prawdy 2'));
$ksiazki->addBook(new book('Ziarno prawdy 3'));

foreach($ksiazki->getBooks() as $book) {
    echo $book->getTitle(). '<br>';
}

?>
