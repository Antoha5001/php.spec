<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>���� for</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>
	<h1>���� for</h1>
	<?php
	/*
	������� 1
	- ��������� ���� for �������� � ������� �������� ����� �� 1 �� 50
	*/
	/*for ($a=1;$a<50; $a+=2){
	
	echo $a,"<br>";	
	}*/
	$str = "HELLO";
	for ($a = 0;$a<strlen($str); $a++){
	echo $str{$a}."<br>";
	}
	
	?>
</body>
</html>
