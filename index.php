<html>

<form action="viewer.php" method="GET">

    <div>

       Book title:<br />

        <input name="title" value="" /><br />
        <input type="submit" value="Add book" name="submit" />
        <input type="submit" value="Show books" name="submit" />
    </div>


</form>

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

</html>