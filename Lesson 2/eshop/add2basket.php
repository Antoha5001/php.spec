<?php
	// ������ ������
	session_start();
	// ����������� ���������
	require "eshop_db.inc.php";
	require "eshop_lib.inc.php";
	
	//������������� ����������� ����������
	$c = session_id();
	
	//������������� ������
	$id = clearData($_GET['id'],"i");
	
	//��������� ���������� ������������ ������ ������ 1
	$q = 1;
	
	//���� ���������� ������ � ������� (������� ����) � ������� UNIX timestamp
	$dt = time();
	
	//��������� ����� � �������
	add2basket($c,$id,$q,$dt);
	
	//������������� ������������ �� ������� �������
	header("Location: catalog.php");
?>