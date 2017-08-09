<?php
	$menu = array(
		"Home" => "home.php",
		"About" => "about.php",
		"Contacts" => "contacts.php",
		"Work" => "work.php"
	);
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Меню</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>
	<h1>Меню</h1>
	<?php
	echo "<ul style=\"list-style-type:none;padding:0;\">";
	foreach($menu as $name=>$link){	
	echo "<li><a href=\"$link\">$name</a>";	
	}
	echo "</ul>";
	?>
</body>
</html>
