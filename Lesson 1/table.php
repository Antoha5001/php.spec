<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Заглавная страница</title>
<link type="text/css" rel="stylesheet" href="css/main.css">
</head>
<body>
<p class="bold" align="center">Таблица умножения</p>
<?php

	
	
	function getTable(){
	$cols = 12;
	$rows = 12;
	$color = 'white';
	
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
	getTable();
?>
</body>
</html>