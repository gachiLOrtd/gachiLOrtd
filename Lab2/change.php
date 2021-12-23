<?php include("includes/header.php"); ?>
<form action="change.php" method="post">
      <p>
        <label for="id_trainer">id_trainer:</label>
        <input type="number" name="id_trainer" id="id_trainer">
    </p>
    <p>
        <label for="name">name:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="age">age:</label>
        <input type="number" name="age" id="age">
    </p>
    
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button" value="Вывести таблицу на экран" onClick='location.href="trainer.php" ' > <br>
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
$id_trainer = mysqli_real_escape_string($link, $_REQUEST['id_trainer']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
 
// Attempt insert query execution
$sql = "INSERT INTO trainer (id_trainer, name, age) VALUES ('$id_trainer','$name', '$age')";
if(mysqli_query($link, $sql)){
    echo "Добавление прошло успешно!";
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

$id_trainer = mysqli_real_escape_string($link, $_REQUEST['id_trainer']);
 
// Attempt delete query execution
$sql = "DELETE FROM trainer WHERE id_trainer='$id_trainer'";
if(mysqli_query($link, $sql)){
    echo "Удаление прошло успешно!";
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
$id_trainer = mysqli_real_escape_string($link, $_REQUEST['id_trainer']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
 
// Attempt update query execution
$sql = "UPDATE trainer SET name ='$name', age = '$age'  WHERE id_trainer='$id_trainer'";

if(mysqli_query($link, $sql)){
    echo "Обновление прошло успешно!";
} else {
    echo "Ошибка! $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else {}
?>