<?php
	header("Content-type: text/html; charset = utf-8");
/*
ЗАДАНИЕ 1
- Установите константу для хранения имени файла
- Проверьте, отправлялась ли форма и корректно ли отправлены данные из формы
- В случае, если форма была отправлена, отфильтруйте полученные значения
- Сформируйте строку для записи с файл
- Откройте соединение с файлом и запишите в него сформированную строку
- Выполните перезапрос текущей страницы (чтобы избавиться от данных, отправленных методом POST)
*/
	define("USER_LOG","user_log.txt");
	if($_SERVER['REQUEST_METHOD'] =="POST"){
		$fname = trim(strip_tags($_POST['fname']));
		$lname = trim(strip_tags($_POST['lname']));
		$email = trim(strip_tags($_POST['email']));
		$user = "$fname $lname $email\n";	
		file_put_contents(USER_LOG,$user, FILE_APPEND);		
		header("Location: " . $_SERVER['PHP_SELF']);	
		exit;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Работа с файлами</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>

<h1>Заполните форму</h1>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

Имя: <input type="text" name="fname" /><br />
Фамилия: <input type="text" name="lname" /><br />
E-mail: <input type="text" name="email" /><br />

<br />

<input type="submit" value="Отправить!" />

</form>

<?php
/*
ЗАДАНИЕ 2
- Проверьте, существует ли файл с информацией о пользователях
- Если файл существует, получите все содержимое файла в виде массива строк
- В цикле выведите все строки данного файла с порядковым номером строки
- После этого выведите размер файла в байтах.
*/
	if(file_exists(USER_LOG)){
		$arr = file(USER_LOG);
		if(is_array($arr))
			$arr = array_reverse($arr);
		echo "<ol>";
		foreach($arr as $a){
			echo "<li>$a</li>";
		}
		echo "</ol>";
		echo "<br>Размер файла ".filesize(USER_LOG)." байт.";
	}
		
?>

</body>
</html>