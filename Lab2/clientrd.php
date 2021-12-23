<?php include("includes/header.php"); ?>
<form action="clientrd.php" method="post">
      <p>
        <label for="id_client">id_client:</label>
        <input type="number" name="id_client" id="id_client">
    </p>
    <p>
        <label for="name">name:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="email">email:</label>
        <input type="text" name="email" id="email">
    </p>
   
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button" value="Вывести таблицу на экран" onClick='location.href="client.php" ' > <br>
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
$id_client = mysqli_real_escape_string($link, $_REQUEST['id_client']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
 
// Attempt insert query execution
$sql = "INSERT INTO client (id_client, name, email) VALUES ('$id_client','$name', '$email')";
if(mysqli_query($link, $sql)){
    echo "Добавление прошло успешно!";
} else{
    echo "Ошибка! $sql. " . mysqli_error($link);
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

$id_client = mysqli_real_escape_string($link, $_REQUEST['id_client']);
 
// Attempt delete query execution
$sql = "DELETE FROM client WHERE id_client='$id_client'";
if(mysqli_query($link, $sql)){
    echo "Удаление прошло успешно!";
} else{
    echo "Ошибка! $sql. " . mysqli_error($link);
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
$id_client = mysqli_real_escape_string($link, $_REQUEST['id_client']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);

// Attempt update query execution
$sql = "UPDATE client SET name = '$name', email = '$email'  WHERE id_client='$id_client'";

if(mysqli_query($link, $sql)){
    echo "Обновление прошло успешно!";
} else {
    echo "Ошибка! $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else {}
?>