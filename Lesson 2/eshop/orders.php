<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
?>
<html>
<head>
	<title>Поступившие заказы</title>
</head>
<body>
<h2>Поступившие заказы:</h2>
<?php
/*
ЗАДАНИЕ 1
- вызовите функцию getOrders() и сохраните результат её работы
	в переменную
- используя цикл foreach выведите информацию обо всех заказах,
	используя указанную ниже шапку
*/
$orders = getOrders();
//print_r($orders);
if(is_array($orders)){
	foreach($orders as $order){
	
	

?>
<hr>
<p><b>Заказчик</b>: <?=$order["name"]?></p>
<p><b>Email</b>: <?=$order["email"]?></p>
<p><b>Телефон</b>: <?=$order["phone"]?></p>
<p><b>Адрес доставки</b>: <?=$order["adres"]?></p>
<p><b>Дата размещения заказа</b>: <?=date("d-m-Y | H:i:s", $order["datetime"])?></p>
<h3>Купленные товары:</h3>
<table border="1" cellpadding="5" cellspacing="0" width="90%">
<tr>
	<th>N п/п</th>
	<th>Автор</th>
	<th>Название</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>Количество</th>
</tr>
<?php
	$goods = $order["goods"];
	$pr = 0;
	$i =1;
	foreach($goods as $good){
	echo "<tr>";
		echo "<th>".$i++."</th>";
		echo "<th>{$good["author"]}</th>";
		echo "<th>{$good["title"]}</th>";
		echo "<th>{$good["pubyear"]}</th>";
		echo "<th>{$good["price"]}</th>";
		echo "<th>{$good["quantity"]}</th>";
	echo "</tr>";
	$pr += (int)$good["price"]*(int)$good["quantity"];
	}
?>
</table>
<p>Всего товаров в заказе на сумму: <?=$pr?>руб.
<?php
	}//end of big foreach
}//end of if(is_array($orders))
?>

</body>
</html>