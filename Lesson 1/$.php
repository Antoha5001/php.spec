<h1>
<?php
	error_reporting(0);		#���������� ����������� �� �������
	error_reporting(E_ALL);		#��������� ���� ����������� �� �������
	$user = 'John';
	echo $user;
	unset($user);			#�������� ����������
	echo $user;
?>
</h1>