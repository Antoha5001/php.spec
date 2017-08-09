<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
	
	//получаем из формы и обрабатываем данные заказа
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$name = clearData($_POST["name"],"sf");
		$email = clearData($_POST["email"],"sf");
		$phone = clearData($_POST["phone"],"sf");
		$address = clearData($_POST["address"],"sf");
		$datetime = time();
		$customer = session_id();
	}
	
	//Создаем переменную из полученных данных
	$order = "$name|$email|$phone|$address|$customer|$datetime\n";
	//записываем значения в файл orders.log
	if(file_exists("orders.log")){		
		file_put_contents(ORDERS_LOG, $order, FILE_APPEND) or die("Ошибка");		
	}
	
	resave($datetime);
	
	
?>
<html>
<head>
	<title>Сохранение данных заказа</title>
</head>
<body>
	<p><?=$order?>Ваш заказ принят.</p>
	<p><a href="catalog.php">Каталог товаров</a></p>
</body>
</html>