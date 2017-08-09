<?php
	if($_SERVER["REQUEST_METHOD"]=="GET"){
		$name = trim(strip_tags($_GET['name']));
		$age = abs((int)$_GET['age']);	
		}
?>
<form action="<?=$_SERVER["SCRIPT_NAME"];?>" method="get">
<input type="text" name="name" value="<?=$name?>"><br>
<input type="text" name="age" value="<?=$age?>"><br>
<input type="text" name="email"><br>
<input type="submit">
</form>

<?php
	if($name && $age){
		echo "Вас зовут ".$name.".<br>Вам ".$age." лет.";
	}
?>