<form action="<?=$_SERVER["SCRIPT_NAME"];?>" method="post">
<input type="text" name="name"><br>
<input type="text" name="age"><br>
<input type="text" name="email"><br>
<input type="submit">
</form>

<?php
	$name = trim(strip_tags($_POST['name']));
	$age = trim(strip_tags($_POST['age']));
	
	echo "Вас зовут ".$name.".<br>Вам ".$age." лет.";
?>