<?php
include 'classes/domain/book.php';
include 'classes/domain/config.php';
include 'classes/repository/bookRepository.php';

$ksiazki = new bookRepository();
$config = new config();

//($config->getConfiguration()->database->login);

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

<html>
<head><title>Księgarnia</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/additional.css" rel="stylesheet" media="screen">
</head>
<body class="container">

<div class="row">
<div class="span12">

<div id="top" class="text-center">

        <h1>Księgarnia z książkami</h1>

        <form  action="index.php" method="POST">

            <div class="text-info"><strong>Book title:</strong><br/></div>
                <input class="" type="text" name="title" size=50 value=""/>
                <br />
                <input class="btn btn-large btn btn-success" type="submit" value="Add book" name="add"/>
                <input class="btn btn-large btn btn-info" type="submit" value="Show books" name="del"/>
        </form>


        <table class="table table-striped" border="1" style="width:100%" >
            <tr>
                <td>L. p.</td>
                <td>Nazwa książki</td>
                <td>Usuń</td>
                <td>Edytuj</td>
            </tr>

            <?php
            $i = 1;
            foreach ($ksiazki->getBookList() as $book) {
                ?>
            <tr>
                 <td><?php echo $i; $i++; ?></td>
                 <td><?php echo $book->getTitle(); ?></td>
                 <td><a href="index.php?deleteId=<?php echo $book->getId(); ?>">Usuń</a></td>
                 <td><a href="edit.php?editId=<?php echo $book->getId(); ?>">Edytuj</a></td>
            </tr>

            <?PHP }; ?>
        </table>
            </div>


<script src="http://code.jquery.com/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
    <img src="/img/bookImg.jpg" >
</div>
</div>
</body>
<div id="footer"><footer>Hello, how do you do?</footer></div>
</html>