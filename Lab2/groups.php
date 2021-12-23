<?php include("includes/header.php"); ?>
<?php
mysqli_connect("localhost", "root", "") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "lb2") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT id_groups, age, gender FROM `groups`");
 echo"Інформация о группах:" . "<br>";
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
    echo"Группа - " . $stroka['id_groups'] . "<br>";
    echo"Возрастное ограничение - " . $stroka['age'] . "<br>";
    echo"Гендер - " . $stroka['gender'] . "<br>";
    echo"<tr>";
}
?>
<form>
<br> <input type="button" value="Вернутся в главное меню" onClick='location.href="login.php"'> <br>
<br> <input class="button" value="Вернутся в меню редактирования" onClick='location.href="rd.php"'> <br>
</form>
<?php include("includes/footer.php"); ?>