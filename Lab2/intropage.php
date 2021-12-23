<?php

session_start();

if(!isset($_SESSION["session_username"])):
header("location:login.php");
else:
?>
	
<?php include("includes/header.php"); ?>
<div id="welcome">
<h2>Приветствуем тебя, <span><?php echo $_SESSION['session_username'];?>! </span></h2>
  <p><a href="logout.php">Покинуть</a> бутылку</p>
</div>
	
<form>
	<ul id = "menu"> 
<br> <input class="button" value="Клиенты" onClick='location.href="client.php" ' > <br>
<br> <input class="button" value="Курсы" onClick='location.href="courses.php"'> <br>
<br> <input class="button" value="Группы" onClick='location.href="groups.php"'> <br>
<br> <input class="button" value="Абонементы" onClick='location.href="subscription.php"'> <br>
<br> <input class="button" value="Тренера" onClick='location.href="trainer.php"'> <br>
<br> <input class="button" value="Войти в меню редактирования" onClick='location.href="rd.php"'> <br>

</ul>
</form>

<?php include("includes/footer.php"); ?>
	
<?php endif; ?>
