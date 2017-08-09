<?php	
//Класс имени
	class nameExc extends Exception{
		function __construct($msg){
			$msg .= " name";
			parent::__construct($msg);
		}
	}
	//Класс логина
	class loginExc extends Exception{
		function __construct($msg){
			$msg .= " login";
			parent::__construct($msg);
		}
	}
	//Класс пароля
	class passwordExc extends Exception{
		function __construct($msg){
			$msg .= " password";
			parent::__construct($msg);
		}
	}	
	
class User extends AUser{
	const INFO_TITLE = "Данные пользователя: ";
	public $name;
	public $login;
	public $password;
	
	static $cuser = 0;
	static $csuser = 0;
	
	function showInfo(){
		echo "{$this->name}<br/>\n
		логин: {$this->login}<br/>\n
		пароль: {$this->password}<br><br>";
	}
	function __construct($n ="",$l ="",$p =""){
		try {
			if($n == "") throw new nameExc("Введите");				
			$this->name = $n;
			$this->login = $l;
			if($l == "") throw new loginExc("Введите");	
			$this->password = $p;
			if($p == "") throw new passwordExc("Введите");
		}
		catch(nameExc $e){
			echo $e->getMessage();
		}
		catch(loginExc $e){
			echo $e->getMessage();
		}
		catch(passwordExc $e){
			echo $e->getMessage();
		}
		++self::$cuser;
	}
	function __clone(){		
		$this->name = "Guest";
		$this->login = "guest";
		$this->password = "qwerty";
		++self::$cuser;
	}
			
	function showTitle(){			
		echo self::INFO_TITLE;
	}	
	
	
}
?>