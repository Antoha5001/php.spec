<?php
	/*
	ЗАДАНИЕ 1
	- Опишите функцию getTable()
	- Задайте для функции три аргумента: $cols, $rows, $color

	ЗАДАНИЕ 2
	- Откройте файл mod3\table.php
	- Скопируйте код, который отрисовывает таблицу умножения
	- Вставьте скопированный код в тело функции getTable()
	- Измените код таким образом, чтобы таблица отрисовывалась в зависимости от входящих параметров $cols, $rows и $color
	*/
	/*
	ЗАДАНИЕ 4
	- Измените входящие параметры функции getTable() на параметры по умолчанию
	*/
	function getTable($cols=9, $rows=9, $color='yellow'){
		static $cnt = 0;
				$cnt++;
		echo "Таблица рисуется $cnt раз";
		echo "<table border=\"1px\" align=\"center\">\n";	
		for ($tr = 1; $tr <= $cols; $tr++){
				
				echo "<tr>\n";								
				for ($td = 1; $td <= $rows; $td++){		
					if($tr==1 || $td==1){
						echo "\t<th style='background:$color'><p><b>".$tr*$td."</b></p></th>\n";		
					}	
					else
						echo "\t<td><p>".$tr*$td."</p></td>\n";
				}			
				echo "</tr>\n";	
			
			
		}
		echo "</table>";
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Таблица умножения</title>
	<link type="text/css" rel="stylesheet" href="css/main.css">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body> 
	<h1>Таблица умножения</h1>
	<?php
	/*
	ЗАДАНИЕ 3
	- Отрисуйте таблицу умножения вызывая функцию getTable() с различными параметрами
	*/
	/*
	ЗАДАНИЕ 5
	- Отрисуйте таблицу умножения вызывая функцию getTable() без параметров
	- Отрисуйте таблицу умножения вызывая функцию getTable() с одним параметром
	- Отрисуйте таблицу умножения вызывая функцию getTable() с двумя параметрами
	*/
	
	getTable();
	getTable(3, 3, red);
	getTable(4, 4, green);
	getTable(5, 5, blue);
	
	getTable();
	getTable(12);
	getTable(13, 12);
	
	
	?>
</body>
</html>
