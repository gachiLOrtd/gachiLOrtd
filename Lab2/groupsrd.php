<?php include("includes/header.php"); ?>
<form action="groupsrd.php" method="post">
      <p>
        <label for="id_groups">id_groups:</label>
        <input type="number" name="id_groups" id="id_groups">
    </p>
    <p>
        <label for="age">age:</label>
        <input type="text" name="age" id="age">
    </p>
    <p>
        <label for="gender">gender:</label>
        <input type="text" name="gender" id="gender">
    </p>
    <p>
        
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button" value="Вывести таблицу на экран" onClick='location.href="groups.php" ' > <br>
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
$id_groups = mysqli_real_escape_string($link, $_REQUEST['id_groups']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
 
// Attempt insert query execution
$sql = "INSERT INTO groups (id_groups, age, gender) VALUES ('$id_groups','$age', '$gender')";
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

$id_groups = mysqli_real_escape_string($link, $_REQUEST['id_groups']);
 
// Attempt delete query execution
$sql = "DELETE FROM groups WHERE id_groups='$id_groups'";
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
$id_groups = mysqli_real_escape_string($link, $_REQUEST['id_groups']);
$age = mysqli_real_escape_string($link, $_REQUEST['age']);
$gender = mysqli_real_escape_string($link, $_REQUEST['gender']);
 
// Attempt update query execution
$sql = "UPDATE groups SET  age = '$age', gender = '$gender'  WHERE id_groups='$id_groups'";

if(mysqli_query($link, $sql)){
    echo "Обновление прошло успешно!";
} else {
    echo "Ошибка! $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else {}
?>