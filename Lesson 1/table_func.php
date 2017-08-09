<?php
	/*
	������� 1
	- ������� ������� getTable()
	- ������� ��� ������� ��� ���������: $cols, $rows, $color

	������� 2
	- �������� ���� mod3\table.php
	- ���������� ���, ������� ������������ ������� ���������
	- �������� ������������� ��� � ���� ������� getTable()
	- �������� ��� ����� �������, ����� ������� �������������� � ����������� �� �������� ���������� $cols, $rows � $color
	*/
	/*
	������� 4
	- �������� �������� ��������� ������� getTable() �� ��������� �� ���������
	*/
	function getTable($cols=9, $rows=9, $color='yellow'){
		static $cnt = 0;
				$cnt++;
		echo "������� �������� $cnt ���";
		echo "<table border=\"1px\" align=\"center\">\n";	
		for ($tr = 1; $tr <= $cols; $tr++){
				
				echo "<tr>\n";								
				for ($td = 1; $td <= $rows; $td++){		
					if($tr==1 || $td==1){
						echo "\t<th style='background:$color'><p><b>".$tr*$td."</b></p></th>\n";		
					}	
					else
						echo "\t<td><p>".$tr*$td."</p></td>\n";
				}			
				echo "</tr>\n";	
			
			
		}
		echo "</table>";
	}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>������� ���������</title>
	<link type="text/css" rel="stylesheet" href="css/main.css">
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body> 
	<h1>������� ���������</h1>
	<?php
	/*
	������� 3
	- ��������� ������� ��������� ������� ������� getTable() � ���������� �����������
	*/
	/*
	������� 5
	- ��������� ������� ��������� ������� ������� getTable() ��� ����������
	- ��������� ������� ��������� ������� ������� getTable() � ����� ����������
	- ��������� ������� ��������� ������� ������� getTable() � ����� �����������
	*/
	
	getTable();
	getTable(3, 3, red);
	getTable(4, 4, green);
	getTable(5, 5, blue);
	
	getTable();
	getTable(12);
	getTable(13, 12);
	
	
	?>
</body>
</html>
