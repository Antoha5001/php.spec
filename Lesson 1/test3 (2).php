<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>�������</title>
<link type="text/css" rel="stylesheet" href="css/main.css">
</head>
<body>
<?php
	$a = 88;
	
	switch($a){
		case 0 : echo "����";
			break;
		case 1 : echo "����";
			break;
		case 2 : echo "���";
			break;
		case 3 : echo "���";
			break;
		case 4 : echo "������";
			break;
		default:
		echo "�����";	
	}
	
	$cols = 22; //���-�� td
	$rows = 22; //���-�� tr
	/*
	������� 2
	- ��������� ����� ��������� ������� ��������� � ���� HTML-������� �� ��������� ��������
		- ����� �������� ������ ���� ����� �������� ���������� $cols
		- ����� ����� ������ ���� ����� �������� ���������� $rows
		-  ������ �� ����������� �������� � ����� ������ ��������� ��������, ���������� ������������� ���������� ������� ������� � ������
	- ������������� ������������ ���� for	
	
	������� 3
	- �������� � ������� ������ ������ � ������� ������� ������ ���� ���������� ���������� ������� � ��������� �� ������ ������
	- ������� ���� ����� ������ ������ � ������� ������� ������ ���� �������� �� �������� ����� �������
	*/
	echo "<br><br><br><p>������� ���������</p>";
	echo "<table>";
	for ($i=1;$i<=$cols;$i++){
		if ($i<2){
		
		echo "<tr align=\"center\">";
			for ($k=1;$k<=$rows;$k++) {
			echo "<td align=\"center\"><b><p>".$k*$i."</p></b></td>";
			}
		echo "</tr>";
		}
		else{
		
		echo "<tr>";
			for ($k=1;$k<=$rows;$k++) {
			echo "<td><p>".$k*$i."</p></td>";
			}
		echo "</tr>";
		}
	}
		
	echo "</table>";
?>
	<br><br><br>
	<table>
	<tr>
	<td><p>1</p></td>
	<td><p>2</p></td>
	</tr>
	</table>
</body>
</html>
