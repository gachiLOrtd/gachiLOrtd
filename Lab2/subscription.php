<?php include("includes/header.php"); ?>
<?php
mysqli_connect("localhost", "root", "") or die ("Невозможно подключиться к серверу");
mysqli_select_db($con, "lb2") or die ("Базы данных нет");
$rows = mysqli_query($con, "SELECT id_client, price, id_groups FROM `subscription`");
 echo"Інформація об абонементах:" . "<br>";
while ($stroka = mysqli_fetch_array($rows)){
    echo"\n";
    echo"Клиент - " . $stroka['id_client'] . "<br>";
    echo"Цена - " . $stroka['price'] . "<br>";
    echo"Группа - " . $stroka['id_groups'] . "<br>";
    echo"<tr>";
}
?>
<form>
<input type="button" value="Вернутся обратно" onClick='location.href="login.php"'>
</form>
<?php include("includes/footer.php"); ?>