<?php
// подключение библиотек
require "eshop_db.inc.php";
require "eshop_lib.inc.php";



// получение и фильтрация данных из формы 

	$author = clearData($_POST['author']);
	$title = clearData($_POST['title']);
	$pubyear = clearData($_POST['pubyear'], "i");
	$price = clearData($_POST['price'], "i");
	
// сохранение нового товара в БД
save($author, $title, $pubyear, $price);
	/*
	ЗАДАНИЕ 1
	- Получите и отфильтруйте данные из формы
	
	ЗАДАНИЕ 2
	- Вызовите функцию save() для сохранения нового товара в БД
	
	ЗАДАНИЕ 3
	- Переадресуйте пользователя на страницу добавления нового товара (add2cat.php)
	*/
header("Location: add2cat.php");
?>