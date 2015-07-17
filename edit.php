<html><?php
/**
 * Created by PhpStorm.
 * User: kinga
 * Date: 16.07.15
 * Time: 16:25
 */
include 'classes/domain/book.php';
include 'classes/repository/bookRepository.php';
$ksiazki = new bookRepository();
if (isset($_GET['editId'])) {
    $editId = $_GET['editId'];
}
if (isset($_POST['editId'])) {
    $editId = $_POST['editId'];
    $ksiazki->editBook($editId,$_POST['newTitle']);
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
</head>


<form action="edit.php" method="POST">

    <div>

        Enter new book title:<br />

        <input type="text" name="newTitle" value="<?PHP echo $ksiazki->getBookList()[$editId]->getTitle();?>" /><br />
        <input type="hidden" name="editId" value="<?PHP echo $editId; ?>">
        <input type="submit" value="Rename" name="edit" />

    </div>

</form>
</html>