<?php
/*
������� 1
- ���������� ��������� ��� �������� ����� �����
- ���������, ������������ �� ����� � ��������� �� ���������� ������ �� �����
- � ������, ���� ����� ���� ����������, ������������ ���������� ��������
- ����������� ������ ��� ������ � ����
- �������� ���������� � ������ � �������� � ���� �������������� ������
- ��������� ���������� ������� �������� (����� ���������� �� ������, ������������ ������� POST)
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>������ � �������</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>

<h1>��������� �����</h1>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

���: <input type="text" name="fname" /><br />
�������: <input type="text" name="lname" /><br />

<br />

<input type="submit" value="���������!" />

</form>

<?php
/*
������� 2
- ���������, ���������� �� ���� � ����������� � �������������
- ���� ���� ����������, �������� ��� ���������� ����� � ���� ������� �����
- � ����� �������� ��� ������ ������� ����� � ���������� ������� ������
- ����� ����� �������� ������ ����� � ������.
*/
?>

</body>
</html>