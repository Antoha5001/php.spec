
	<?php
	
	function myCount($item, $mode=0){
		if (is_null($item))
			return 0;
		if (!is_array($item))
			return 1;
		$cnt = 0;
		foreach($item as $v){
			if($mode==1 && is_array($v))
				$cnt += myCount ($v, 1);
			$cnt++;
		}
		return $cnt;
	}
	echo myCount(NULL);
	?>
</body>
</html>
