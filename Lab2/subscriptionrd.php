<?php include("includes/header.php"); ?>
<form action="subscriptionrd.php" method="post">
      <p>
        <label for="id_subscription">id_subscription:</label>
        <input type="number" name="id_subscription" id="id_subscription">
    </p>
    <p>
        <label for="id_client">id_client:</label>
        <input type="number" name="id_client" id="id_client">
    </p>
    <p>
        <label for="price">price:</label>
        <input type="number" name="price" id="price">
    </p>

    <p>
        <label for="id_groups">id_groups:</label>
        <input type="number" name="id_groups" id="id_groups">
    </p>
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button" value="Вывести таблицу на экран" onClick='location.href="subscription.php" ' > <br>
<br> <input class="button" value="Вернутся в меню редактирования" onClick='location.href="rd.php"'> <br>
</form>

<?php include("includes/footer.php"); ?>



<?php
if(isset($_POST["add"])){
$link = mysqli_connect("localhost", "root", "", "lb2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$id_subscription = mysqli_real_escape_string($link, $_REQUEST['id_subscription']);
$id_client = mysqli_real_escape_string($link, $_REQUEST['id_client']);
$price = mysqli_real_escape_string($link, $_REQUEST['price']);
$id_groups = mysqli_real_escape_string($link, $_REQUEST['id_groups']);
 
// Attempt insert query execution
$sql = "INSERT INTO subscription (id_subscription, id_client, price, id_groups) VALUES ('$id_subscription','$id_client', '$price', '$id_groups')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}
else {}
?>


<?php
if(isset($_POST["delete"])){
$link = mysqli_connect("localhost", "root", "", "lb2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$id_subscription = mysqli_real_escape_string($link, $_REQUEST['id_subscription']);
 
// Attempt delete query execution
$sql = "DELETE FROM subscription WHERE id_subscription='$id_subscription'";
if(mysqli_query($link, $sql)){
    echo "Records were deleted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
}else {}
?>


<?php
if(isset($_POST["update"])){
$link = mysqli_connect("localhost", "root", "", "lb2");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$id_subscription = mysqli_real_escape_string($link, $_REQUEST['id_subscription']);
$id_client = mysqli_real_escape_string($link, $_REQUEST['id_client']);
$price = mysqli_real_escape_string($link, $_REQUEST['price']);
$id_groups = mysqli_real_escape_string($link, $_REQUEST['id_groups']);
 
// Attempt update query execution
$sql = "UPDATE subscription SET price = '$price', id_client = '$id_client', id_groups = '$id_groups'  WHERE id_subscription='$id_subscription'";

if(mysqli_query($link, $sql)){
    echo "Обновление прошло успешно!";
} else {
    echo "Ошибка! $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else {}
?>