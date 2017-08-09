<?php
	/*$size = post_max_size;
	if ($size == true)
		echo ini_get ('post_max_size');
	else
	echo "Хуйня каката"*/
	
	
	$size = ini_get ('post_max_size');
	$letter = $size{strlen($size)-1};
	echo $size.'<br>';
	$size = (integer)$size;
	echo $size.'<br>';
	switch ($letter){
		case 'G': $size *= 1024;
		case 'M': $size = $size * 1024;
		case 'K': $size *= 1024;
	}
	echo $size.'<br>';
	echo 'POST_MAX_SIZE '.$size.' bytes';
	
	
?>