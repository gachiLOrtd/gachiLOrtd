<?php include("includes/header.php"); ?>
<form action="coursesrd.php" method="post">
      <p>
        <label for="id_courses">id_courses:</label>
        <input type="number" name="id_courses" id="id_courses">
    </p>
    <p>
        <label for="name">name:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
<br class="submit"><input class="button" id="add" name= "add" type="submit" value="Добавить"><br>
<br class="submit"><input class="button" id="delete" name= "delete" type="submit" value="Удалить"><br>
<br class="submit"><input class="button" id="update" name= "update" type="submit" value="Изменить"><br>
<br> <input class="button" value="Вывести таблицу на экран" onClick='location.href="courses.php" ' > <br>
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
$id_courses = mysqli_real_escape_string($link, $_REQUEST['id_courses']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);

// Attempt insert query execution
$sql = "INSERT INTO courses (id_courses, name) VALUES ('$id_courses','$name')";
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

$id_courses = mysqli_real_escape_string($link, $_REQUEST['id_courses']);
 
// Attempt delete query execution
$sql = "DELETE FROM courses WHERE id_courses='$id_courses'";
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
$id_courses = mysqli_real_escape_string($link, $_REQUEST['id_courses']);
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
// Attempt update query execution
$sql = "UPDATE courses SET id_courses ='$id_courses', name = '$name' WHERE id_courses='$id_courses'";

if(mysqli_query($link, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

mysqli_close($link);
}else {}
?>