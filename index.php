<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
</head>

<form action="index.php" method="POST">

    <div>

       Book title:<br />

        <input type="text" name="title" value="" /><br />
        <input type="submit" value="Add book" name="add" />
        <input type="submit" value="Show books" name="del" />
    </div>


</form>

<?php
include 'classes/domain/book.php';
include 'classes/repository/bookRepository.php';

$ksiazki = new bookRepository();

//Obsługa dodania książki
if (isset($_POST["title"])) {
    $newitem = $_POST["title"];
    $ksiazki->addBook(new book($newitem));
}

//Obsłuiga usunięcia ksiązki
if (isset($_GET["deleteId"])) {
    $ksiazki->deleteBook($_GET["deleteId"]);
}

//

?>
<table border="1" style="width:100%">
    <tr>
<td>L. p.</td><td>Nazwa książki</td><td>Usuń</td><td>Edytuj</td></tr>

    <?php
    $i=1;
    foreach($ksiazki->getBookList() as $bookIndex => $book) {
    ?>
    <tr>
        <td><?php echo $i; $i++;?></td>
        <td><?php echo $book->getTitle();?></td>
        <td><a href="index.php?deleteId=<?php echo $bookIndex;?>">Usuń</a></td>
        <td><a href="edit.php?editId=<?php echo $bookIndex;?>">Edytuj</a></td>
        <td></td>
    </tr>

    <?PHP };?>

  </table>
</html>