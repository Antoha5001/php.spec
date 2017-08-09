<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
?>
<html>
<head>
	<title>Корзина пользователя</title>
</head>
<body>
<?php
	/*
	ЗАДАНИЕ 1
	- Проверьте, есть ли товары в корзине пользователя
	- Если товаров нет, выводите строку "Корзина пуста!"
	- Если товары есть, выводите их в нижеприведенной таблице
	*/
if($count){
	echo "<p>Вернуться в <a href='catalog.php'>каталог</a></p>";	
}else		
	echo "<p>Корзина пуста. Вернитесь в <a href='catalog.php'>каталог</a></p>";	
	
?>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
<tr>
	<th>N п/п</th>
	<th>Автор</th>
	<th>Название</th>
	<th>Год издания</th>
	<th>Цена, руб.</th>
	<th>Количество</th>
	<th>Удалить</th>
</tr>
<?php	
	$goods = myBasket();
	$i = 1; $sum = 0;
	foreach($goods as $item){	
?>
<tr>
	<th><?=$i;?></th>
	<th><?=$item["author"];?></th>
	<th><?=$item["title"];?></th>
	<th><?=$item["pubyear"];?></th>
	<th><?=$item["price"];?></th>
	<th><?=$item["quantity"];?></th>
	<th><a href="delete_from_basket.php?id=<?=$item["id"]?>">Удалить</a></th>
</tr>
<?php	
		$i++;
		$sum += (int)$item["price"]*$item["quantity"];
	}
	/*
	ЗАДАНИЕ 2
	- Получите все товары из корзины пользователя в виде массива
	- Создайте переменные для подсчета порядковых номеров ($i)
		и общей суммы заказа ($sum)
	- В цикле выводите все позиции из корзины на экран
	- Также, в цикле увеличивайте значение переменной $sum
		на соответствующее значение
		(сумма текущего товара * его количество)
	- Значение ячейки "Удалить" оформите в виде гиперссылки на
	документ delete_from_basket.php, добавив параметр id с id записи	
	*/
?>
</table>

<p>Всего товаров в корзине на сумму:
<?php
	/*
	ЗАДАНИЕ 3
	- Выведите общую сумму товаров в корзине
	*/
	
		echo " $sum " ;
?>
руб.

<div align="center">
	<input type="button" value="Оформить заказ!"
                      onClick="location.href='orderform.php'">
</div>

</body>
</html>







