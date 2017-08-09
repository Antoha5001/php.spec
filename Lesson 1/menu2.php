<?php
	/*
	������� 1
	- ������� ������� getMenu()
	- ������� ��� ������� ������ �������� $menu, � ���� ����� ������������ ������, ���������� ��������� ����
	- ������� ��� ������� ������ �������� $vertical �� ��������� �� ��������� ������ TRUE.
	������ �������� ���������, ����� ������� ����� ���������� ���� - ����������� ��� �������������
	
	
	������� 2
	- �������� ���� mod3\menu.php
	- ���������� ���, ������� ������� ������ $menu � �������� ������������� ��� � ������ ��������
	- ���������� ���, ������� ������������ ����
	- �������� ������������� ��� � ���� ������� getMenu()
	- �������� ��� ����� �������, ����� ���� �������������� � ����������� �� �������� ���������� $menu � $vertical
	*/
	
	$vMenu = array(
		"Home" => "home.php",
		"About" => "about.php",
		"Contacts" => "contacts.php",
		"Work" => "work.php"
	);
	$hMenu = array(
		"AAA" => "#",
		"SSS" => "#",
		"DDD" => "#",
		"FFF" => "#"
	);
	
	function getMenu($menu, $vertical = true){
		$ulStyle = " style=\"list-style-type:none;padding:0;\"";
		$style = " style=\"display:inline;margin-right:15px;\"";
		if ($vertical == true){
		echo "\n<ul$ulStyle>";
		foreach($menu as $name=>$link){
							
				echo "\n<li><a href=\"$link\">$name</a>";				
		}
		echo "</ul>";
		}
		elseif ($vertical !== true){
			echo "\n<ul$ulStyle>";
			foreach($menu as $name=>$link){
							
				echo "\n<li$style><a href=\"$link\">$name</a>";				
			}
			echo "</ul>";
		}
		
	}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>����</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>
	<h1>����</h1>
	<?php
	echo getMenu($vMenu, false)."<br>";
	getMenu($hMenu);
	/*
	������� 3
	- ��������� ������������ ���� ������� ������� getMenu() � ����� ����������
	*/
	/*
	������� 4
	- ��������� �������������� ���� ������� ������� getMenu() �� ������ ���������� ������ FALSE
	*/
	?>
</body>
</html>
