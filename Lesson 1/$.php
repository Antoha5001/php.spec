<h1>
<?php
	error_reporting(0);		#Отключение уведомлений об ошибках
	error_reporting(E_ALL);		#Включение всех уведомлений об ошибках
	$user = 'John';
	echo $user;
	unset($user);			#Удаление переменной
	echo $user;
?>
</h1>