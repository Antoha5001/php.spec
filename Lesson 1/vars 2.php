<?php
	$a = '10john';
	echo (string)$a,'<br>';
	echo getType($a),'<br>';
	setType($a, int);
	echo getType($a),'<br>';
	
?>

