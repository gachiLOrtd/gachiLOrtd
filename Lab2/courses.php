<?php include("includes/header.php"); ?>
<?php
mysqli_connect("localhost", "root", "") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "lb2") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT id_courses, name FROM `courses`");
 echo"Інформація о курсах:" . "<br>";
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
    echo"Курс - " . $stroka['id_courses'] . "<br>";
    echo"На кого расчитано - ". $stroka['name'] . "<br>";
    echo"<tr>";
}
?>
<form>
<input type="button" value="Вернутся обратно" onClick='location.href="login.php"'>
</form>
<?php include("includes/footer.php"); ?>