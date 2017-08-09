<?php		
	function __autoload($name){
		include "$name.class.php";
	}
	//проверяем принадлежность объекта к классу
	function checkObject($obj){
		if($obj instanceof User){
			if($obj instanceof SuperUser)
				echo "<p>данный пользователь обладает правами администратора</p>";
			else 
				echo "<p>данный пользователь является обычным пользователем</p>";
		}else echo "<p>данный пользователь - неизвестный пользователь</p>";		
	}
	
	$user1 = new User("Первый юзер","user1","111");	
	$user2 = new User("Второй юзер","user2",222);		
	$user3 = new User("Третий юзер","user3",333);
	$user4 = clone $user2;
	$user8;	
		$user1->showTitle();
		$user1->showInfo();
		$user2->showTitle();
		$user2->showInfo();
		$user3->showTitle();
		$user3->showInfo();
		$user4->showTitle();
		$user4->showInfo();

	$su = new SuperUser("Super Admin","root","superpassword","admin");
	//$su2 = new SuperUser("Super Admin","root","superpassword","admin");
	$su->showInfo();
	echo "<hr/>";
	echo "<p>Количество юзеров: ".User::$cuser."</p>";
	echo "<p>Количество суперюзеров: ".User::$csuser."</p>";
	
	checkObject($su);
	checkObject($user1);
	checkObject($user8);
	/*
	ЗАДАНИЕ 15
	- Создайте свойство objNum, которое будет хранить порядковый номер объекта.
	  Подумайте, где лучше его создать?
	- Внесите изменения в классе User (а может и в SuperUser?), которые будут присваивать свойству objNum,
	  порядковый номер объекта.
	  Подумайте, где и как лучше это сделать?
	- В классе User (а может и в SuperUser?) опишите метод __toString()
	- Данный метод должен возвращать строку в формате "Объект #objNum: name".
	  Например: "Объект #3: Василий Пупкин"
	- Попробуйте преобразовать один из созданных Вами объектов в строку
	*/
?>