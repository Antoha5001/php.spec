<?php	
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
	•Разработка web-сайтов и взаимодействие с MySQL•
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
	
	---------------------------------------------
		Cookie: параметры
	---------------------------------------------
	
	int setcookie (string name [, string value [,
	int expire [, string path [, string domain
	[, int secure]]]]])
	
	1. Имя куки. Только латинские буквы, цифры, символ
	подчеркивания и дефис. Все другие символы будут
	преобразованы в символ подчеркивания
	
	2. Значение параметра
	
	3. Дата истечения срока годности
	
	4. Путь, который определяет, в какой части домена
	может использоваться данный файл cookie
	
	5. Домен
	
	6. Указание, что данные cookie должны передаваться
	только через безопасное соединение HTTPS. - 1 HTTPS
	
	---------------------------------------------
		Cookie: создание
	---------------------------------------------
	
	setcookie ("TestCookie", $value);
	
	setcookie ("TestCookie", $value,time()+3600);
	/* период действия - 1 час */
	
	setcookie ("TestCookie", $value,time()+3600,
	"/docs/", ".site.com", 1);
	
	//Ошибка. Произведен вывод до установки cookie	
	<?php
	echo "Hello!";
	$color = "red";
	setcookie("BG", $color, time()+3600);
	?>
	
	//Пример
	
	$vizitCounter = 0;
	if(isset($_COOKIE["vizitCounter"]))
		$vizitCounter = $_COOKIE["vizitCounter"];
		$vizitCounter++;
	if(isset($_COOKIE["lastVizit"]))
		$lastVizit = $_COOKIE["lastVizit"];
	
	setcookie("vizitCounter", $vizitCounter, 0x7FFFFFFF);
	setcookie("lastVizit", date("d-m-Y H:i:s"), 0x7FFFFFFF);
	
	if ($vizitCounter==1)
		echo "<p>Добро пожаловать!</p>";
	else{
		echo "<p>Вы пришли $vizitCounter раз!</p>";
		echo "<p>Последнее посещение $lastVizit!</p>";
	
	}
	
	---------------------------------------------
		Cookie: удаление
	---------------------------------------------		
	
	setcookie("TestCookie")								//создать только имя и браузер ее удалит
	
	setcookie("TestCookie", "")
	
	setcookie ("TestCookie", "", time() - 3600);		//так точно удалит
	
	---------------------------------------------
		Cookie: массивы и cookie
	---------------------------------------------		
	
	//Создаем массив
	$array = array(
	"name"=>"John",
	"login"=>"root",
	"pass"=>"p@ssw0rd");
	
	// Упаковываем массив в строку
	$str = serialize($array);
	
	//Сохраняем массив в cookie
	setcookie('user',$str, time() + 3600);
	
	//Считываем строку и переводим в массив
	$array = unserialize($_COOKIE['user']);

	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+	
	
	---------------------------------------------
		Запрос HEAD
	---------------------------------------------	
	
	header("Имя заг: знач")		
	
	Location: http:\/\/www.google.ru		//Редирект
	
	header("Location: " . $_SERVER['PHP_SELF']);	//Редирект на текущую страницу
	
	Refresh: число; http:					//Перезагружает страницу или редирект по времени
	
	Content-type: text/html; charset = utf-8
	
	header("Content-type: file/octet-stream");
	header("Content-disposition: attachment; filename=\"mytext.txt\"");
	
	---------------------------------------------
		Header: Cache-Control и Expires
	---------------------------------------------	
		
	//запрет
	header("Cache-Control: no-store");
	или
	header("Cache-Control: no-store,no-cache,mustrevalidate");
	header("Expires: " . date("r"));
	
	//разрешение
	header("Cache-Control: public");
	header("Expires: " . date("r", time()+3600));
	
	---------------------------------------------
		Header: Set-Cookie
	---------------------------------------------	
		
	header("Set-Cookie: name=John; expires=Wed, 19 Sep 02 14:39:58 GMT");
	
	---------------------------------------------
		Хэширование: md5
	---------------------------------------------	
		
	md5(str string)
	
	md5("888");
	//0a113ef6b61820daa5611c870ed8d5ee
	md5("Vasya");
	//96932f68a34ac08a6c92ed8db20d2ee3
	md5("MeGaPa$$w0rd");
	//bfb5a5275a34cf74cdfebdea0cf9c421
	
	
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
	•Сессии. Операции с файлами и директориями. Работа с почтой•
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+	
	
	
	---------------------------------------------
		Сессии: создание и использование
	---------------------------------------------	
	
	в php.ini - session.use_trans_sid 			сервер сам "создает куки" если они отключены
	
	//Начало или продолжение сессии
	session_start();
	
	$_SESSION //В этом массиве всё и хранится
	
	$_SESSION["user"] = "John";
	
	echo $_SESSION["user"];
	//Удаление
	unset($_SESSION["user"]);
	session_destroy();
	session_id();// id сессии
	session_name();// Имя сессии
	
	//Пример
	
	<?
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = strip_tags($_POST["name"]);
		$age = $_POST["age"] * 1;
		$_SESSION["name"] = $name;
		$_SESSION["age"] = $age;
	}
	else {
		$name = $_SESSION["name"];
		$age = $_SESSION["age"];
	}
	?>
	
	<form action="<?=$_SERVER["PHP_SELF"]?>" 
		method="post">
	Ваше имя:
	<input type="text" name="name" value="<?=$name?>"><br>
	Ваш возраст:
	<input type="text" name="age" value="<?=$age?>"><br>
	<input type="submit" value="Передать">
	</form>
	<?
	if ($name and $age) {	
		if ($name and $age) {
			echo "<h1>Привет, $name</h1>";
			echo "<h3>Тебе $age лет</h3>";
		}
		else {
			print "<h3>Заполните все поля!</h3>";
		}
	}
	?>
	
	
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+	
	
	
	---------------------------------------------
		Получение сведений о файлах
	---------------------------------------------	
	
	//Существует ли файл?
	file_exists("test.txt")
	
	//Узнаем размер файла
	filesize("test.txt");
	
	//Дата последнего обращения к файлу
	fileatime("test.txt");//date("d M Y", $atime);
	
	//Дата изменения файла
	filemtime("test.txt");//date("d M Y", $mtime);
	
	//Дата создания файла(Windows)
	filectime("test.txt");//date("d M Y", $ctime);
	
	---------------------------------------------
		Файлы: режимы работы
	---------------------------------------------	

	
	int fopen(string filename, string mode)
	r — открыть файл только для чтения;
	r+ — открыть файл для чтения и записи;
	w — открыть файл только для записи. Если он
	существует, то текущее содержимое файла
	уничтожается. Текущая позиция устанавливается в
	начало;
	w+ — открыть файл для чтения и для записи. Если он
	существует, то текущее содержимое файла
	уничтожается. Текущая позиция устанавливается в
	начало;
	а — открыть файл для записи. Текущая позиция
	устанавливается в конец файла;
	а+ — открыть файл для чтения и записи. Текущая
	позиция устанавливается в конец файла;
	b — обрабатывать бинарный файл. Этот флаг необходим
	при работе с бинарными файлами в ОС Windows.
	
	
	---------------------------------------------
		Файлы: открытие и закрытие
	---------------------------------------------	
	
	
	$f = fopen("test.txt", "w+") or die("Ошибка");
	
	//Примеры
	$f = fopen("http://www.you_domain/test.txt","r");
	$f= fopen("http://ftp.you_domain/test.txt", "r");
	
	//Закрываем
	fclose($f)
	
	
	---------------------------------------------
		Файлы: чтение
	---------------------------------------------	
	
	
	//Читаем файл
	fread(int f, int length)
	
	//Читаем первые 10 символов
	$str = fread($f, 10);
	echo $str;
	
	//Читаем следующие 12 символов
	$str = fread($f, 12);
	echo $str;
	
	//Прочитать строку из файла
	fgets(int f[, int length])
	
	//Прочитать строку из файла и отбросить HTML-теги
	fgetss(int f, int length [, если нужно тэг оставить)
	fgetss($d, 255,<br>)
	
	//Считывает символ из файла
	fgetc(int f)
	
	
	---------------------------------------------
		Файлы: запись
	---------------------------------------------	
	
	fwrite(int f, string ws [, int length])
	
	fputs // Тоже, что и fwrite
	
	//Пишем в конкретную позицию
	fread($f, 7);
	fwrite($f, "Наш текст");
	
	
	---------------------------------------------
		Файлы: манипуляции с курсором
	---------------------------------------------	
	
	//Установка курсора
	int fseek(int f, int offset [, int whence])
	
	offset — количество символов, на которые нужно передвинуться.
	whence:
	SEEK_SET — движение начинается с начала файла;
	SEEK_CUR — движение идет от текущей позиции;
	SEEK_END — движение идет от конца файла.

	//Читаем последние 10 знаков	
	fseek($f, -10, SEEK_END);
	$s = fread($f, 10);
	
	//Узнаем текущую позицию
	$pos = ftell($f);
	
	rewind($f)//сброс курсора
	
	bool feof($f) //конец ли файла	
	
	
	---------------------------------------------
		Файлы: прямая работа с данными
	---------------------------------------------
	
	//Получаем содержимое файла в виде массива
	array file(string filename)
	
	//Еще один вариант прямой работы с данными
	
	//Чтение
	file_get_contents(string filename)
	
	//Запись
	file_put_contents(string filename, mixed data[,	int flag]);
	// установить 3 парам константу FILE_APPEND что бы записать с конца
	
	//Если записать массив,
	$array = array("I", "love", "you");	
	file_put_contents("test.txt",$array);
	//то получим "Iloveyou"
	
	
	---------------------------------------------
		Файлы: управление
	---------------------------------------------
	
	//Копирование файла
	copy(string source, string destination);
	
	//Переименование файла
	rename(str oldname, str newname);
	
	//Удаление файла
	unlink(string filename);
	
		
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
	
	
	---------------------------------------------
		Директории: работа и манипуляции
	---------------------------------------------		
	
	//Создание директории
	mkdir(string dirname[, int mode])//!0777
	
	//Удаление директории
	rmdir(string dirname)//только пустая!
	
	//Открываем директорию
	$dir = opendir(string dirname)
	opendir(".")					//текущая
	
	//Читаем директорию
	$name = readdir($dir)
	
	//Закрываем директорию
	closedir($dir)
	
	//Это файл?
	is_file(name)
	
	//Это директория?
	is_dir(name)
	
	//Сканируем директорию
	scandir(string dirname [, int order])
	
	
	---------------------------------------------
		Файлы: загрузка на сервер
	---------------------------------------------		
	
	//Настрoйки PHP.ini
	file_uploads (on|off)
	upload_tmp_dir
	upload_max_filesize (default = 2 Mb)
	
	//Простая загрузка
	<form enctype="multipart/form-data"
	action="upload.php" method="POST">
	<input type="hidden" name="MAX_FILE_SIZE"
	value="51200">
	<input type="file" name="userfile">
	<input type="submit" value="Send">
	</form>
	
	
	---------------------------------------------
		Файлы: загрузка на сервер
	---------------------------------------------		
	
	
	//Принимаем данные
	$tmp = $_FILES['userfile']['tmp_name'];
	$name = $_FILES['userfile']['name'];
	
	//Перемещаем файл
	move_uploaded_file($tmp, name);
	
	//Что в массиве $_FILES
	$_FILES['userfile']['name']
	$_FILES['userfile']['tmp_name']
	$_FILES['userfile']['size']
	$_FILES['userfile']['type']
	$_FILES['userfile']['error']
	
	
	if($_FILES['uf']['error']==0){
		$t = $_FILES['uf']['tmp_name'];
		$n = $_FILES['uf']['name'];
		move_uploaded_file($t,"upload/$n");	
		//header("Location: " . $_SERVER['PHP_SELF']);	
	}	
	<form action="<?=$_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
		<input type="file" name="uf"/>
		<input type="submit"/>
	</form>
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
	
	
	---------------------------------------------
		Функции работы с почтой
	---------------------------------------------	
		
	//Настройки в PHP.ini
	[mail function]; //For Win32 only.
	SMTP = localhost; //For Win32 only. (Только для Windows)
	sendmail_from = me@localhost.com
	
	bool mail (string to,
	string subject,
	string message
	[, string additional_headers]
	)
	
	//Простое письмо
	mail("john@smith.com",
	"Тема письма",
	"Строка 1\nСтрока 2\nСтрока 3");
	
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
	
	
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
	•Использование сервера баз данных MySQL в приложениях PHP•
	-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+
	
	
	---------------------------------------------
		Алгоритм работы с сервером баз данных
	---------------------------------------------	
	
	1. Устанавливаем соединение с сервером БД
	2. Выбираем базу данных для работы
	3. Посылаем запрос
	? При необходимости(SELECT), работаем с
	выбранными данными
	4. Закрываем соединение
	Подключение необходимых расширений
	в php.ini
	• php_pdo.dll
	• php_pdo_mysql.dll
	• php_mysql.dll
	
	
	---------------------------------------------
		Функции PHP для работы с сервером MySQL
	---------------------------------------------	
			
	
	$conn = mysql_connect("host","login","pass")
	
	mysql_close([$conn])
	
	$conn = @mysql_connect("localhost", "root", "1234")
	or die("Ошибка!");
	//
	//
	//
	mysql_close([$conn]);	
	

	---------------------------------------------
	
	mysql_select_db(string db, [$conn]);				//Выбирает БД
	//отслеживаем ошибки
	mysql_errno ([$conn]);		//Возвращает номер ошибки
	mysql_error ([$conn]);		//Возвращает описание ошибки
	
	$conn = @mysql_connect("localhost", "root",
	"1234") or die("Ошибка!");
	
	mysql_select_db("news");
	
	if(mysql_errno() > 0){
	echo mysql_errno(). ": ". mysql_error();
	}
	
	mysql_close([$conn]);	

	---------------------------------------------
	
	$result = mysql_query(string query[, $conn])		//Запрос mySQL
	$row = mysql_fetch_array($result[, type])
	
	//По умолчанию
	mysql_fetch_array($result, MYSQL_BOTH)		//Индексированный массив
	
	mysql_fetch_array($result, MYSQL_NUM)	-	Что и mysql_fetch_row($result)
	
	//Ассоциативный массив
	mysql_fetch_array($result, MYSQL_ASSOC)	-	Что и	mysql_fetch_assoc($result)	

	---------------------------------------------
	
	//Точечная выборка
	mysql_result($result, int row, string field)
	mysql_result($result, 1, "name")		//Курсор остается после записи
	
	
	mysql_num_rows($result)//Количество записей
	mysql_num_fields($result)//Кол-во полей
	mysql_field_name($result, int field)//Имя поля
	
	$result = mysql_query("SELECT * FROM news");
	echo mysql_num_rows($result);
	
	mysql_affected_rows([$conn])//Кол-во изменений
	mysql_query("DELETE FROM news WHERE pubDate =
	'2005-06-11'");
	echo mysql_affected_rows();
	mysql_insert_id([$conn])//id последней записи
	
	---------------------------------------------
		Конвертируем результат запроса в массив
	---------------------------------------------	
	
	
	$result = mysql_query("SELECT * FROM teachers");
	var_dump($result);
	$row = mysql_fetch_array($result);		//Возвращает массив
	
	---------------------------------------------
		Расширение mySQLi
	---------------------------------------------	
		
		
	Подключение необходимых расширений
		• php_pdo.dll
		• php_mysqli.dll
		
	Особенности
		• Процедурный интерфейс
		• Объектно-ориентированный интерфейс
		• Имеет поддержку дополнительных функций
		мониторинга, отлова ошибок, управления
		загрузкой и репликации
		
	Предупреждения
		• Нет подключения к базе данных по умолчанию
		• Нет соединения по умолчанию. Необходимо явно
		обращаться к соединению с сервером базы данных	
	
	---------------------------------------------
		Функции PHP для работы с mySQLi
	---------------------------------------------	
	
	
	$conn =
	mysqli_connect('host','root','1234','база');
	
	$result = mysqli_query($conn, 'SELECT * FROM
	articles')
	
	while($row =
	mysqli_fetch_array($result,MYSQLI_NUM)){
	echo $row[0];
	}
	
	mysqli_free_result($result);
	mysqli_close($conn);
	
	---------------------------------------------
		Использование SQL View
	---------------------------------------------	
	
	
	CREATE TABLE t
	(qty int, price int);
	
	CREATE VIEW v AS
	SELECT qty, price, qty * price AS value
	FROM t;
	
	SELECT * FROM v;
	
	---------------------------------------------
		Использование подготовленных запросов
	---------------------------------------------	
		
	
	mysql_connect("localhost", "root", "password");
	mysql_select_db("test");
	
	mysql_query("PREPARE myinsert FROM
				'INSERT INTO
					test_table (name, price)
						VALUES (?, ?)'");
	
	for ($i = 0; $i < 1000; $i++){
	
	mysql_query("SET @name = 'Товар # $i'");
	mysql_query("SET @price = " . ($i * 10));
	mysql_query("EXECUTE myinsert USING @name, @price");
	}
	
	mysql_close();
	
	http://dev.mysql.com/doc/refman/5.0/en/sqlps.html
	
	//фильтрация данных
	mysql_real_escape_string(trim(strip_tags($data)));
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	