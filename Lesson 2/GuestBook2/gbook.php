<?php
define("DB_HOST", "localhost");
define("DB_LOGIN", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "gbook");
mysql_connect(DB_HOST,DB_LOGIN,DB_PASSWORD) or die("Error!!!");
mysql_select_db(DB_NAME) or die(mysql_error());

function clearData($data, $type="s"){
	switch($type){
		case "s": $data = trim(strip_tags($data));break;
		case "i": $data = abs((int)$data);break;
	}
	return $data;
}
/* ЗАДАНИЕ 1
- Подключитесь к серверу mySQL
	
- Выберите активную Базу Данных 'gbook'
- Проверьте, была ли корректным образом отправлена форма
- Если она была отправлена: отфильтруйте полученные данные,
  сформируйте SQL-оператор на вставку данных в таблицу msgs
  и выполните его. После этого выполните перезапрос страницы, чтобы избавиться от информации, переданной через форму
*/

if(!empty($_POST['name']) and !empty($_POST['email'])){
	$name = clearData($_POST["name"]);
	$email = clearData($_POST["email"]);
	$msg = clearData($_POST["msg"]);
	$sql = "INSERT INTO msgs (name,email,msg) VALUES('$name','$email','$msg')";
	mysql_query($sql) or die(mysql_error());
	header("Location:".$_SERVER['PHP_SELF']);
	exit;
}

if(isset($_GET["del"])){
	$id = clearData($_GET["del"],"i");
	if($id>0){
		$sql = "DELETE FROM msgs WHERE id =$id";
		mysql_query($sql) or die(mysql_error());
	}
	header("Location:".$_SERVER['PHP_SELF']);
	exit;
}

/*
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name = trim(strip_tags($_POST["name"]));
	$email = trim(strip_tags($_POST["email"]));
	$msg = trim(strip_tags($_POST["msg"]));
	$sql = "INSERT INTO msgs (name,email,msg) VALUES('$name','$email','$msg')";
	mysql_query($sql) or die(mysql_error());
	header("Location:".$_SERVER['PHP_SELF']);
}
*/
/*
ЗАДАНИЕ 3
- Проверьте, был ли запрос методом GET на удаление записи
- Если он был: отфильтруйте полученные данные,
  сформируйте SQL-оператор на удаление записи и выполните его.
  После этого выполните перезапрос страницы, чтобы избавиться от информации, переданной методом GET
*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Гостевая книга</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>

<h1>Гостевая книга</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Ваше имя:<br />
<input type="text" name="name" /><br />
Ваш E-mail:<br />
<input type="text" name="email" /><br />
Сообщение:<br />
<textarea name="msg" cols="50" rows="5"></textarea><br />
<br />
<input type="submit" value="Добавить!" />

</form>

<?php
/*
ЗАДАНИЕ 2
- Сформируйте SQL-оператор на выборку всех данных из таблицы
  msgs в обратном порядке и выполните его. Результат выборки
  сохраните в переменной.
- Закройте соединение с БД
- Получите количество рядов результата выборки и выведите его на экран
- В цикле получите очередной ряд результата выборки в виде ассоциативного массива.
  Таким образом, используя этот цикл, выведите на экран все сообщения, а также информацию
  об авторе каждого сообщения. После каджого сообщения сформируйте ссылку для удаления этой
  записи. Информацию об идентификаторе удаляемого сообщения передавайте методом GET.
*/
	$sql = "SELECT * FROM msgs ORDER BY id DESC";
	$users = mysql_query($sql) or die(mysql_error());
	echo "Всего записей: ".mysql_num_rows($users);
	mysql_close();
	while($user = mysql_fetch_assoc($users)){
		$msg = nl2br($user["msg"]);
	?>
	<hr>
	<p>
	<a href="mailto:<?=$user["email"] ?>">
	<?=$user["name"] ?>
	</a><br><?=$msg?>
	</p>
	<p align="right"><a href="gbook.php?del=<?=$user["id"];?>">Удалить</a>
	</p>
	<?php
	}
?>

</body>
</html>