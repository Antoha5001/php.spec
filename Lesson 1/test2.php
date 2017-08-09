<?php
	$beer [] = 'Karlsberg';	
	$beer [] = 'Baltika';	
	$beer [] = 123;	
	$beer [] = true;
	
	foreach($beer as $a){
		echo $a."<br>";
	}
	echo"<br><br><br>";
	foreach($beer as $a=>$b){
		echo $a." = ".$b."<br>";
	}
	
?>.'<br>'