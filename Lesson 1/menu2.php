<?php
	/*
	ЗАДАНИЕ 1
	- Опишите функцию getMenu()
	- Задайте для функции первый аргумент $menu, в него будет передаваться массив, содержащий структуру меню
	- Задайте для функции второй аргумент $vertical со значением по умолчанию равным TRUE.
	Данный параметр указывает, каким образом будет отрисовано меню - вертикально или горизонтально
	
	
	ЗАДАНИЕ 2
	- Откройте файл mod3\menu.php
	- Скопируйте код, который создает массив $menu и вставьте скопированный код в данный документ
	- Скопируйте код, который отрисовывает меню
	- Вставьте скопированный код в тело функции getMenu()
	- Измените код таким образом, чтобы меню отрисовывалась в зависимости от входящих параметров $menu и $vertical
	*/
	
	$vMenu = array(
		"Home" => "home.php",
		"About" => "about.php",
		"Contacts" => "contacts.php",
		"Work" => "work.php"
	);
	$hMenu = array(
		"AAA" => "#",
		"SSS" => "#",
		"DDD" => "#",
		"FFF" => "#"
	);
	
	function getMenu($menu, $vertical = true){
		$ulStyle = " style=\"list-style-type:none;padding:0;\"";
		$style = " style=\"display:inline;margin-right:15px;\"";
		if ($vertical == true){
		echo "\n<ul$ulStyle>";
		foreach($menu as $name=>$link){
							
				echo "\n<li><a href=\"$link\">$name</a>";				
		}
		echo "</ul>";
		}
		elseif ($vertical !== true){
			echo "\n<ul$ulStyle>";
			foreach($menu as $name=>$link){
							
				echo "\n<li$style><a href=\"$link\">$name</a>";				
			}
			echo "</ul>";
		}
		
	}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Меню</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>
	<h1>Меню</h1>
	<?php
	echo getMenu($vMenu, false)."<br>";
	getMenu($hMenu);
	/*
	ЗАДАНИЕ 3
	- Отрисуйте вертикальное меню вызывая функцию getMenu() с одним параметром
	*/
	/*
	ЗАДАНИЕ 4
	- Отрисуйте горизонтальное меню вызывая функцию getMenu() со вторым параметром равным FALSE
	*/
	?>
</body>
</html>
