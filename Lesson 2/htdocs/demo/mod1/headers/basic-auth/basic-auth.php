<?
define("MY_NAME","root");
define("MY_PASS","1234");
$login = $_SERVER["PHP_AUTH_USER"];
$password = $_SERVER["PHP_AUTH_PW"];

if ($login == MY_NAME and $password == MY_PASS): 
	// ���� ������������ ������ ��������������
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>������� ��������������</title>
</head>
<body>
<h1>������� �������������� - RFC2617</h1>
��� �����: <?=$login?><br>
��� �����: <?=$password?><br>
</body>
</html>
<? else: 
	// ������������ �� ������ ��������������!
	header("HTTP/1.0 401 Unauthorized");
	header("WWW-Authenticate: Basic realm=\"��� ����\"");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>������ ��������</title>
</head>
<body>
<h1>������ ��������</h1>
</body>
</html>
<? endif ?>