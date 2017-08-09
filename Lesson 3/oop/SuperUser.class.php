<?php
//Класс суперюзера
class SuperUser extends User implements ISuperUser{
	public $role;		
	
	function __construct($n,$l,$p,$r){
		parent::__construct($n,$l,$p);
		$this->role = $r;
		++self::$csuser;
		parent::$cuser--;
	}
			
	function showInfo(){
		echo parent::showInfo()."роль: {$this->role}<br>";
	}
	
	function getInfo(){
		$arr = array();
		foreach ($this as $name=>$val){
			$arr[$name] = $val;
		}
		return $arr;
	}
}
?>