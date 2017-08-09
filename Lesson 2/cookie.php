<?php

/*
ЗАДАНИЕ 1
- Инициализируйте переменную для подсчета количества посещений
- Если соответствующие данные передавались через куки
  сохраняйте их в эту переменную
- Нарастите счетчик посещений
- Инициализируйте переменную для хранения значения последнего посещения страницы
- Если соответствующие данные передавались из куки, отфильтруйте их и сохраните в эту переменную
- Установите соответствующие куки
*/
	$vizitCounter = 0;
	if(isset($_COOKIE["vizitCounter"]))
		$vizitCounter = $_COOKIE["vizitCounter"];
		$vizitCounter++;
	if(isset($_COOKIE["lastVizit"]))
		$lastVizit = $_COOKIE["lastVizit"];
	
	setcookie("vizitCounter", $vizitCounter, 0x7FFFFFFF);
	setcookie("lastVizit", date("d-m-Y H:i:s"), 0x7FFFFFFF);
		
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Последний визит</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>

<h1>Последний визит</h1>

<?php
/*
ЗАДАНИЕ 2
- Выводите информацию о количестве посещений и дате последнего посещения
*/
if ($vizitCounter==1)
	echo "<p>Добро пожаловать!</p>";
else{
	echo "<p>Вы пришли $vizitCounter раз!</p>";
	echo "<p>Последнее посещение $lastVizit!</p>";
	
	}
?>

</body>
</html>






