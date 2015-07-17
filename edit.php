<html><?php
/**
 * Created by PhpStorm.
 * User: kinga
 * Date: 16.07.15
 * Time: 16:25
 */
include 'classes/domain/book.php';
include 'classes/domain/config.php';
include 'classes/repository/bookRepository.php';


$ksiazki = new bookRepository();
$config = new config();



if (isset($_GET['editId'])) {
    $editId = $_GET['editId'];
    $ksiazka = $ksiazki->getBook($editId);

}
if (isset($_POST['editId'])) {
    $editId = $_POST['editId'];
    $ksiazki->editBook($editId,$_POST['newTitle']);
    $ksiazka = $ksiazki->getBook($editId);
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
</head>


<form action="edit.php" method="POST">

    <div>

        Enter new book title:<br />

        <input type="text" name="newTitle" value="<?PHP echo $ksiazka->getTitle() ?>" /><br />
        <input type="hidden" name="editId" value="<?PHP echo $ksiazka->getId(); ?>">
        <input type="submit" value="Rename" name="edit" />

    </div>

</form>
</html>