<?php	
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
	Профессиональная разработка на PHP 5
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
	
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
		Объектно-ориентированное программирование на PHP
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
	
	------------------------------------------------------
	Классы и объекты
	------------------------------------------------------
	
	
	Описание класса
		class MyClass {
		// определение свойств
		// определение методов
		}
		
	Инициализация класса (создание объекта)
		$myObj = new MyClass();		
		

	------------------------------------------------------
	Свойства класса
	------------------------------------------------------		
		
		class MyClass {
			public $property1;
			protected $property2 = "value2";
			private $property3;
		}
	
	Доступ к свойствам класса
		$myObj = new MyClass();
		$myObj->property1;
	Изменение значения свойств
		$myObj->property2 = "other_value";	
		

	------------------------------------------------------
	Методы класса
	------------------------------------------------------
		
	Описание методов
		class MyClass {
			function myMethod($var1,$var2){
			// операторы
			}
		}
		
	Вызов метода
		$myObj = new MyClass();
		$myObj->myMethod('value1','value2');
		

	------------------------------------------------------
	$this
	------------------------------------------------------
		
	$this - указывает на текущий объект
		
	class MyClass {
		public $property1;
		
		function myMethod(){
			// Вывод значения свойства
			print($this->property1);
			}
			
		function callMethod(){
			// Вызов метода
			$this->myMethod();
		}
	}	
		
		
	class Car{
		public $speed;
		
		function getSpeed(){
			$x = nl2br("Скорость:".$this->speed."\n");
			echo $x;
		}
	}

	$car1 = new Car();
	$car1->speed = 210;
	$car2->getSpeed();	
		

	------------------------------------------------------
	Конструкторы и деструкторы
	------------------------------------------------------
		
	__construct 					//создается автоматически, когда создается объект
	//Для клонированных не вызывается
	__destruct 						//создается автоматически, когда удаляется объект. Передавать ничего нельзя
		
	class MyClass {
		public $property;
		
		function __construct($var){
			$this->property = $var;
			echo "Вызван конструктор";
		}
		
		function __destruct(){
			echo "Вызван деструктор";
		}
	}
	//Вызов конструктора
	$obj = new MyClass("Значение");			//В круглые скобки	
	//Вызов деструктора
	unset($obj);	
		

	------------------------------------------------------
	Псевдо-константы __METHOD__ и __CLASS__
	------------------------------------------------------
		
	class MyClass {
		function myMethod(){
			echo "Вызов метода ", __METHOD__;
		}
		function getClassName(){
			echo "Имя класса ", __CLASS__;
		}
	}
	$obj = new MyClass();
	// Вызов метода MyClass::myMethod
	$obj->myMethod();
	// Имя класса MyClass
	$obj->getClassName();	
		

	------------------------------------------------------
	Новые принципы работы с объектами
	------------------------------------------------------
		
	Объекты передаются по ссылке, а не по значению
	
	class MyClass {
		public $property;
	}
	$myObj = new MyClass();
	$myObj->property = 1;
	$myObj2 = $myObj;			//передается по ссылке
	$myObj2->property = 2;
	print($myObj->property); // Печатает 2
	print($myObj2->property); // Печатает 2
		
	==== в 4 PHP ==============
	
	$myObj = new MyClass();
	$myObj->property = 1;
	$myObj2 = &$myObj;
	$myObj2->property = 2;
	print($myObj->property); // Печатает 2
	print($myObj2->property); // Печатает 2
		

	------------------------------------------------------
	Клонирование объекта
	------------------------------------------------------
		
	Явное копирование объектов
	
	class MyClass {
		public $property;
	}
	$myObj = new MyClass();
	$myObj->property = 1;
	$myObj2 = clone $myObj;  //копирование
	$myObj2->property = 2;
	print($myObj->property); // Печатает 1
	print($myObj2->property); // Печатает 2	
		

	------------------------------------------------------
	Метод __clone()
	------------------------------------------------------
		
	__clone() - вызывается во время создания клона
	
	class MyClass {
		public $property;
		function __clone(){
			$this->property = 2;
		}
	}
	$myObj = new MyClass();
	$myObj->property = 1;
	$myObj2 = clone $myObj;
	print($myObj->property); // Печатает 1
	print($myObj2->property); // Печатает 2	
		

	------------------------------------------------------
	Наследование (полиморфизм)
	------------------------------------------------------
		
	class Car {
		public $numWheels = 4;
		function printWheels() { 
			echo $this->numWheels; 
		}
	}
	class Toyota extends Car {
	public $country = 'Japan';
	function printCountry() { echo $this->country; }
	}
	$myCar = new Toyota();
	$myCar->printWheels();
	$myCar->printCountry();	
		

	------------------------------------------------------
	Перегрузка методов
	------------------------------------------------------
			
	class Car {
		public $numWheels = 4;
		function printWheels() { 
			echo $this->numWheels; 
		}
	}
	
	class Toyota extends Car {
		public $country = 'Japan';
		function printCountry() { 
			echo $this->country; 
		}
	}
	
	function printWheels() {
		echo "Перегруженный метод printWheels() ";
	}
	}
	$myCar = new Toyota();
	$myCar->printWheels();	
		

	------------------------------------------------------
	Parent::
	------------------------------------------------------
		
	class Car {
		public $numWheels = 4;
		function printWheels() { 
			echo $this->numWheels; 
		}
	}
	class Toyota extends Car {
		public $country = 'Japan';
		function printWheels() {
			echo "Перегруженный метод printWheels() ";
			parent:: printWheels();
		}
	}
	$myCar = new Toyota();
	$myCar->printWheels();	
		

	------------------------------------------------------
	Спецификаторы доступа
	------------------------------------------------------
		
	Модификатор public (общедоступный)
		позволяет иметь доступ к свойствам
		и методам классам из любого места
		
	Модификатор protected (защищенный)
		позволяет иметь доступ и
		родительскому (в котором определен
		сам член класса), и наследуемым
		классам
		
	Модификатор private (закрытый)
		ограничивает область видимости
		так, что доступ к нему имеет
		только тот класс, в котором
		объявлен сам элемент	
		

	------------------------------------------------------
	Спецификаторы доступа: как это работает?
	------------------------------------------------------
	
	
		

	------------------------------------------------------
	Обработка исключений
	------------------------------------------------------
	throw - объект, создается из класса Exception(встроенный) и передается в catch (Exception $e)
	try {
		$a = 1;
		$b = 0;
		if($b == 0) throw new Exception("Деление на
		0!");
		echo $a/$b;
	}catch(Exception $e){
		echo "Произошла ошибка - ",
		$e->getMessage(), // Выводит сообщение
		" в строке ",
		$e->getLine(), // Выводит номер строки
		" файла ",
		$e->getFile(); // Выводит имя файла
	}
		

	------------------------------------------------------
	Создание собственных исключений
	------------------------------------------------------
	
	сlass MathException extends Exception {
		function __construct($message) {
			parent::__construct($message);
		}
	}
	
	try {
	$a = 1;
	$b = 0;
	if ($b == 0) throw new MathException("Деление на
	0!");
	echo $a / $b;
	} catch (MathException $e) {
	echo "Произошла математическая ошибка ",
	$e->getMessage(),
	" в строке ", $e->getLine(),
	" файла ", $e->getFile();
	}
		

	------------------------------------------------------
	Перебор свойств объекта
	------------------------------------------------------
		
	class Human {
		public $name;
		public $yearOfBorn;
		function __construct($name, $yearOfBorn){
			$this->name = $name;
			$this->yearOfBorn = $yearOfBorn;
		}
	}
	$billGates = new Human(‘Bill Gates’,1955);
	foreach($billGates as $name=>$value){
		print($name.’: ’.$value.’<br />’);
	}
		

	------------------------------------------------------
	Константы класса
	------------------------------------------------------
	
	class Human {
		const HANDS = 2;
		function printHands(){
			print (self::HANDS);// NOT $this! - обращение к константе из класса
		}
	}
	print ('Количество рук: '.Human::HANDS);	//обращение к константе из кода
		

	------------------------------------------------------
	Абстрактные методы и классы
	------------------------------------------------------
			
		
	abstract class Car {						//Абстарактный класс
		public $petrol;
		function startEngine(){
			print('Двигатель завѐлся!');
		}
		abstract function stopEngine();			//Абстарактный метод - метод без реализации
	}
	
	class InjectorCar extends Car {
		public function stopEngine(){
			print('Двигатель остановился!');
		}
	}
	$myMegaCar = new Car();//Ошибка!
	$myMegaCar = new InjectorCar();
	$myMegaCar->startEngine();
	$myMegaCar->stopEngine();
		

	------------------------------------------------------
	Интерфейсы - содержат только абстрактные методы
	------------------------------------------------------
			
		
	interface Hand {
		function useKeyboard();
		function touchNose();
	}
	interface Foot {
		function runFast();
		function playFootball();
	}
	class Human implements Hand
	{
		public function useKeyboard(){
			echo 'Use keyboard!';
		}
		public function touchNose(){
			echo 'Touch nose!';
		}
		public function runFast(){
			echo 'Run fast!';
		}
		public function playFootball(){
			echo 'Play football!';
		}
	}
	$vasyaPupkin = new Human();
	$vasyaPupkin->touchNose();	
		

	------------------------------------------------------
	Финальныей метод - метод который нельзя перегружать
	------------------------------------------------------
	
	class Mathematics {
		final function countSum($a,$b){
			print('Сумма: ' . $a + $b);
		}
	}
	class Algebra extends Mathematics {
		// Возникнет ошибка
		public function countSum($a,$b){
			$c = $a + $b;
			print("Сумма $a и $b: $c");
		}
	}
		

	------------------------------------------------------
	Финальные классы 										//нельзя создавать наследование
	------------------------------------------------------
	
	final class Breakfast {
		function eatFood($food){
			print("Скушали $food!");
		}
	}
	// Возникнет ошибка
	class McBreakfast extends Breakfast
	{
	// Описание класса
	}
		

	------------------------------------------------------
	Статические свойства и методы класса
	------------------------------------------------------
	
	class CookieLover {
		static $loversCount = 0;
		function __construct(){
			++self::$loversCount;
		}
		static function welcome(){
			echo 'Добро пожаловать в клуб любителей булочек!';
			//Никаких $this внутри статического метода!
		}
	}
	$vasyaPupkin = new CookieLover();
	$frosyaBurlakova = new CookieLover();
	print ('Текущее количество любителей булочек: '.
	CookieLover::$loversCount);
	print (CookieLover::welcome());
		

	------------------------------------------------------
	Ключевое слово instanceof
	------------------------------------------------------
	class Human {}
	$myBoss = new Human();
	if($myBoss instanceOf Human)
		print('Мой Босс – человек!');
	class Woman extends Human {}
	$englishQueen = new Woman();
	if($englishQueen instanceOf Human)
		print('Английская королева – тоже человек!');
	interface LotsOfMoney {}
	class ReachPeople implements LotsOfMoney {}
	$billGates = new ReachPeople();
	if($billGates instanceOf LotsOfMoney)
		print('У Билла Гейтса много денег!');	
		

	------------------------------------------------------
	Функция __autoload()
	------------------------------------------------------
		
	function __autoload($cl_name){
		print('Попытка создать объект класса
		'.$cl_name);
	}
	$obj = new undefinedClass();
		

	------------------------------------------------------
	Методы доступа к свойствам объекта
	------------------------------------------------------
	
	class MyClass {
		private $properties;
		function __get($name){
			print("Чтение значения свойства $name");
			return $this->properties[$name];
		}
		function __set($name,$value){
			print("Задание нового свойства $name = $value");
			$this->properties[$name] = $value;
		}
	}
	$obj = new MyClass;
	$obj->property = 1; // Задание нового свойства
	$a = $obj->property; // Чтение значения свойства
	print $a;	
		
	/***********/
	class A{
		private $_name;
		private $_age;
		
		function __set($n, $v){
			switch($n){
				case "name": _name = $v;
				case "age": _age = $v;
				default : echo "ERROR!!!";
			}
		}
		function __get($n, $v){
			switch($n){
				case "name": return _name;
				case "age": return _age;
				default : echo "ERROR!!!";
			}
		}
	}
	------------------------------------------------------
	Перегрузка вызова несуществующих методов
	------------------------------------------------------	
		
	class MyClass {
		function __call($name, $params){	//при попытке вызова нес. функ. приходит 1 имя функции, 2 массив аргументов
			print("Попытка вызова метода $name со следующими параметрами: ");
			print_r($params);
		}
	}
	$obj = new MyClass();
	$obj->megaMethod(1,2,3,"четыре");
		

	------------------------------------------------------
	Метод __toString()
	------------------------------------------------------	
	
	class MyClass {
		function __toString(){						//формируется при попытке вывести объект
			return 'Вызван метод __toString()';
		}
	}
	$obj = new MyClass();
	// Вызван метод __toString()
	echo $obj;	
		

	------------------------------------------------------
	Разыменовывание объектов
	------------------------------------------------------	
		
	class MyClass1 {
		public function showClassName()
		echo "Объект класса MyClass1";
	}
	class MyClass2 {
		public function showClassName()
		echo "Объект класса MyClass2";
	}
	function deref($obj) {
		switch ($obj) {
			case "MyClass1": return new MyClass1();
			case "MyClass2": return new MyClass2();
		}
	}
	deref("MyClass1")->showClassName(); //Объект класса
	MyClass1
	deref("MyClass2")->showClassName(); //Объект класса
	MyClass2	
		

	------------------------------------------------------
	Уточнение типа класса
	------------------------------------------------------
			
	class type hints
	interface Int1 {
		function func1(Int1 $int1);
	}
	interface Int2 {
		function func2(Int2 $int2);
	}
	class MyClass implements Int1, Int2 {
		public function func1(Int1 $int1) {
			// Код метода
		}
		public function func2(Int2 $int2) {
			// Код метода
		}
	}
	$obj1 = new MyClass;
	$obj2 = new MyClass;
	$obj1->func1($obj2);
	$obj1->func2($obj2);	

	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+	
	
	
	
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
		Совместное использование PHP 5 и SQLite
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
		

	------------------------------------------------------
	Включение поддержки SQLite в PHP
	------------------------------------------------------
	
	
	В PHP 5.0 поддержка SQLite
	была встроена в ядро
	
	Начиная с PHP 5.1 поддержка
	SQLite вынесена за пределы
	ядра
	
	extension=php_pdo.dll
	extension=php_pdo_sqlite.dll
	extension=php_sqlite.dll
		

	------------------------------------------------------
	Особенности SQLite
	------------------------------------------------------
	
	//Можно так
	CREATE TABLE users (
	id INTEGER,
	name TEXT,
	age INTEGER
	);
	
	//Или так
	CREATE TABLE users
	(id, name, age);
	
	//Для PRIMARY KEY и AUTOINCREMENT надо
	CREATE TABLE users
	(id INTEGER PRIMARY KEY, name, age);
	
	НЕЛЬЗЯ ИСПОЛЬЗОВАТЬ ADDSLASHES()!!!
	$clear = sqlite_escape_string($string);
		

	------------------------------------------------------
	Создание файла БД, открытие и закрытие соединения
	------------------------------------------------------
	
	$db = sqlite_open("test.db");
	
	//ООП интерфейс
	$db = new SQLiteDatabase("test1.db");
	
	sqlite_close($db);
	
	//ООП интерфейс
	unset($db);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+	