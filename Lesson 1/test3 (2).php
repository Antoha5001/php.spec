<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Главная</title>
<link type="text/css" rel="stylesheet" href="css/main.css">
</head>
<body>
<?php
	$a = 88;
	
	switch($a){
		case 0 : echo "Ноль";
			break;
		case 1 : echo "Один";
			break;
		case 2 : echo "два";
			break;
		case 3 : echo "Три";
			break;
		case 4 : echo "Четыре";
			break;
		default:
		echo "Много";	
	}
	
	$cols = 22; //Кол-во td
	$rows = 22; //Кол-во tr
	/*
	ЗАДАНИЕ 2
	- Используя циклы отрисуйте таблицу умножения в виде HTML-таблицы на следующих условиях
		- Число столбцов должно быть равно значению переменной $cols
		- Число строк должно быть равно значению переменной $rows
		-  Ячейки на пересечении столбцов и строк должны содержать значения, являющиеся произведением порядковых номеров столбца и строки
	- Рекомендуется использовать цикл for	
	
	ЗАДАНИЕ 3
	- Значения в ячейках первой строки и первого столбца должны быть отрисованы полужирным шрифтом и выровнены по центру ячейки
	- Фоновый цвет ячеек первой строки и первого столбца должен быть отличным от фонового цвета таблицы
	*/
	echo "<br><br><br><p>Таблица умножения</p>";
	echo "<table>";
	for ($i=1;$i<=$cols;$i++){
		if ($i<2){
		
		echo "<tr align=\"center\">";
			for ($k=1;$k<=$rows;$k++) {
			echo "<td align=\"center\"><b><p>".$k*$i."</p></b></td>";
			}
		echo "</tr>";
		}
		else{
		
		echo "<tr>";
			for ($k=1;$k<=$rows;$k++) {
			echo "<td><p>".$k*$i."</p></td>";
			}
		echo "</tr>";
		}
	}
		
	echo "</table>";
?>
	<br><br><br>
	<table>
	<tr>
	<td><p>1</p></td>
	<td><p>2</p></td>
	</tr>
	</table>
</body>
</html>
