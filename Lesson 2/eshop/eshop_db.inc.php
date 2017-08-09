<?php
	//адрес сервера баз данных mySQL
	define("DB_HOST", "localhost");
	//логин для соединения с сервером баз данных mySQL
	define("DB_LOGIN", "root");
	//парол для соединения с сервером баз данных mySQL
	define("DB_PASSWORD", "");
	//именя базы данных
	define("DB_NAME", "eshop");
	//имя файла с личными данными пользователей
	define("ORDERS_LOG", "orders.log");
	//количество товаров в корзине пользователя
	$count = 0;
	//соединение с сервером баз данных mySQL
	mysql_connect(DB_HOST, DB_LOGIN, DB_PASSWORD) or die(mysql_error());
	//выбор базы данных
	mysql_select_db(DB_NAME) or die(mysql_error());
	
	
	/*ЗАДАНИЕ 2
	- Выполните SQL-оператор на выборку количества товаров в корзине данного пользователя
	- Получите результат и сохраните его в значении переменной $count	
	*/
	//количество товаров в корзине данного пользователя
	$sql ="SELECT count(*) FROM basket WHERE customer ='".session_id()."'";
	$res = mysql_query($sql) or die(mysql_error());
	$count = mysql_result($res, 0,"count(*)");
?>