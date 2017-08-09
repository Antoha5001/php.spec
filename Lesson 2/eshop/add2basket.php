<?php
	// запуск сессии
	session_start();
	// подключение библиотек
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
	
	//идентификатор конкретного покупателя
	$c = session_id();
	
	//идентификатор товара
	$id = clearData($_GET['id'],"i");
	
	//Назначаем количество добавляемого товара равным 1
	$q = 1;
	
	//дата добавления товара в корзину (текущую дата) в формате UNIX timestamp
	$dt = time();
	
	//Добавляем товар в корзину
	add2basket($c,$id,$q,$dt);
	
	//Переадресация пользователя на каталог товаров
	header("Location: catalog.php");
?>