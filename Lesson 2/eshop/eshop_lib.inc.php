<?php
//фильтрация данных
function clearData($data, $type = "s"){
	switch($type){
		case "s":
			return mysql_real_escape_string(trim(strip_tags($data)));break;	
		case "sf":
			return trim(strip_tags($data));break;	
		case "i":
			return abs((int)$data);break;	
	
	}
}
//сохраняет новый товар в таблицу catalog
function save($author,$title,$pubyear,$price){
		$sql = "INSERT INTO catalog (
							author,
							title,
							pubyear,
							price) 
						VALUES(
							'$author',
							'$title',
							$pubyear,
							$price)";

		mysql_query($sql) or die(mysql_error());
}
//возвращаем все содержимое каталога товаров
function selectAll(){		
	$sql = "SELECT * FROM catalog";
	$result = mysql_query($sql) or die(mysql_error());	
	return db2Array($result);
}
//Конвертируем данные в массив
function db2Array($data){
	$arr = array();	
	while($row = mysql_fetch_assoc($data)){
	$arr[] = $row;
	}
	return $arr;
}		

	/*
	ЗАДАНИЕ 3
	- Опишите функцию add2basket(), которая будет добавлять товары в корзину пользователя
	- Функция должна принимать следующие значения:
			customer
			goodsid
			quantity
			datetime
	*/
function add2basket($customer, $goodsid, $quantity, $datetime){

	$sql = "INSERT INTO basket (
						customer,
						goodsid,
						quantity,
						datetime) 
					VALUES(
						'$customer',
						$goodsid,
						$quantity,
						$datetime)";
						
	mysql_query($sql) or die(mysql_error());
}
	
	/*
	ЗАДАНИЕ 4
	- Опишите функцию myBasket(), которая будет возвращать всю пользовательскую корзину
	*/
	function myBasket(){
	$sql = "SELECT 
				author,title,pubyear, price,  
				basket.id,goodsid,customer,quantity
				FROM catalog, basket
				WHERE customer='".session_id()."'
				AND catalog.id = basket.goodsid";	
	$result = mysql_query($sql) or die(mysql_error());	
	return db2Array($result);
	}
	
	/*
	ЗАДАНИЕ 5
	- Опишите функцию basketDel(), которая будет удалять товар из корзины пользователя
	- Функция должна принимать следующие значения:
			id
	*/
	function basketDel($id){
		$sql = "DELETE FROM basket 
		WHERE id =$id";
		mysql_query($sql) or die(mysql_error());
	}
	
	/*
	ЗАДАНИЕ 6
	- Опишите функцию resave() для пересохранения товаров из корзины (таблица basket) в заказы (таблица orders)
	- Функция должна принимать следующие значения:
			datetime – дата заказа 
	- Для получения содержимого корзины в этой функции воспользуйтесь функцией myBasket()
	- Опишите в функции resave() SQL-оператор, который будет вставлять данные из корзины в таблицу orders и выполните его
	- Опишите SQL-оператор для удаления данных о корзине текущего покупателя из таблицы basket
	*/
	function resave($datetime){	
		$items = myBasket();
		foreach($items as $item){
			$sql = "INSERT INTO orders(
				author, 
				title,
				pubyear, 
				price,
				customer,
				quantity,
				datetime)
			VALUES(
				'{$item["author"]}',
				'{$item["title"]}',
				{$item["pubyear"]},
				{$item["price"]},
				'{$item["customer"]}',
				{$item["quantity"]},
				$datetime)";
			mysql_query($sql) or die(mysql_error());
		}
		$sql = "DELETE FROM basket WHERE customer='".session_id()."'";
		mysql_query($sql) or die(mysql_error());
	}
	
	/*
	ЗАДАНИЕ 7
	- Опишите функцию getOrders() для получения информации о заказах
	- Получите в виде массива $orders данные о пользователях из файла "orders.log"
	- Создайте массив $allorders для хранения информации обо всех заказах
	- В цикле foreach переберите все заказы
	- Внутри цикла foreach создайте ассоциативный массив $orderinfo для хранения информации о каждом конкретном заказе
	- Сохраните информацию о пользователе из массива $orders(name, email, phone, address, customer, date) в массиве $orderinfo
	- Опишите SQL-оператор для выборки из таблицы заказов всех товаров для конкретного покупателя
	- Получите весь результат этой выборки
	- Сохраните полученный в предыдущем пункте результат как значение
		ключа "goods" в массиве $orderinfo
	- Добавьте сформированный массив $orderinfo в виде значения очередного ключа массива $allorders
	- Функция getOrders() должна возвращать массив $allorders с информацией о всех покупателях
		и сделанных ими заказах
	*/
	function getOrders(){
		if(!file_exists("orders.log"))
			return false;
		$allorders = array();
		$orders = file(ORDERS_LOG);	
		foreach($orders as $order){		
			list($n, $e, $p, $a, $c, $dt) = explode("|", $order);
			$orderinfo = array();
			$orderinfo["name"] = $n;
			$orderinfo["email"] = $e;
			$orderinfo["phone"] = $p;
			$orderinfo["adres"] = $a;
			$orderinfo["datetime"] = $dt*1;
			$sql = "SELECT * FROM orders
					WHERE customer = '$c'
					AND datetime=".$orderinfo["datetime"];
			$result = mysql_query($sql) or die(mysql_error());	
			$orderinfo["goods"] = db2Array($result);
			$allorders[] = $orderinfo;
		}
		return $allorders;
	}
	

?>