<?php

/*
������� 1
- ��������������� ���������� ��� �������� ���������� ���������
- ���� ��������������� ������ ������������ ����� ����
  ���������� �� � ��� ����������
- ��������� ������� ���������
- ��������������� ���������� ��� �������� �������� ���������� ��������� ��������
- ���� ��������������� ������ ������������ �� ����, ������������ �� � ��������� � ��� ����������
- ���������� ��������������� ����
*/
	$vizitCounter = 0;
	if(isset($_COOKIE["vizitCounter"]))
		$vizitCounter = $_COOKIE["vizitCounter"];
		$vizitCounter++;
	if(isset($_COOKIE["lastVizit"]))
		$lastVizit = $_COOKIE["lastVizit"];
	
	setcookie("vizitCounter", $vizitCounter, 0x7FFFFFFF);
	setcookie("lastVizit", date("d-m-Y H:i:s"), 0x7FFFFFFF);
		
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>��������� �����</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>

<h1>��������� �����</h1>

<?php
/*
������� 2
- �������� ���������� � ���������� ��������� � ���� ���������� ���������
*/
if ($vizitCounter==1)
	echo "<p>����� ����������!</p>";
else{
	echo "<p>�� ������ $vizitCounter ���!</p>";
	echo "<p>��������� ��������� $lastVizit!</p>";
	
	}
?>

</body>
</html>






