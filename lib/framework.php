<?php
class connectDB{
	private $myDB;
	function __construct(){
		$this->connect();
	}
	function connect(){
		$this->myDB = new MySQLi ('localhost', 'root', 'root', 'second');
		!($this->myDB->connect_error)?:die('Error connect: ' . $this->myDB->connect_error);
	}
	function disconnect() {
		$this->myDB->close();
	}
	function query($query) {
		$result = $this->myDB->query($query);
		$this->disconnect();
		return($result);
	}
}
//class test{
//	public $errors = false;
//	function check($login, $password, $repassword, $email){
//		$this->login($login);
//		$this->password($password);
//		$this->email($email);
//		$this->repassword($password, $repassword);
//		if ($this->errors == false) {
//			$send = new reg;
//			$send->createUser($login, $password, $email);
//		}
//	}
//	function login($obj){
//		$unic = new reg;
//		$unic = $unic->unicUser($obj);
//		if(!(preg_match("/^[a-z][a-z0-9]*?([-_][a-z0-9]+){0,2}$/", $obj))){
//			echo "Неверный логин";
//			$this->errors = true;
//		} elseif(!$unic) {
//			$err = array('errors'=>'Логин занят.');
//			echo json_encode($err);
//			$this->errors = true;
//		}	else {$this->login = $obj;}
//
//	}
//	function password($obj){
//		if(!preg_match("/^\S*(?=\S{9,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$obj)){
//			echo "Некорректный пароль.";
//			$this->errors = true;
//		} else {$this->password = $obj;}
//	}
//	function repassword($one,$two){
//		if (!($one == $two)) {
//			echo "Пароли не совпадают.";
//			$this->errors = true;
//		}
//	}
//	function email($obj){
//		$unic = new reg;
//		$unic = $unic->unicEmail($obj);
//		if(!(preg_match("/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u",$obj))){
//			echo "Некорректный Email.";
//			$this->errors = true;
//		} elseif(!$unic) {
//			echo "Email занят.";
//			$this->errors = true;
//		} else {$this->email = $obj;}
//	}
//}
//class reg extends conMySQL{
//	function unicUser($login){
//		$conMySQL = new conMySQL;
//		$result = $conMySQL->mySQL->query("SELECT count(*) FROM users where login='".$login."'");
//		$arr = $result->fetch_array(MYSQLI_NUM);
//		$conMySQL->mySQL->close();
//		if($arr[0] == 0) return true;
//	}
//	function unicEmail($email){
//		$conMySQL = new conMySQL;
//		$result = $conMySQL->mySQL->query("SELECT count(*) FROM users where email='".$email."'");
//		$arr = $result->fetch_array(MYSQLI_NUM);
//		$conMySQL->mySQL->close();
//		if($arr[0] == 0) return true;
//	}
//	function createUser($login, $password, $email) {
//		$conMySQL = new conMySQL;
//		$conMySQL->mySQL->query ("INSERT INTO `users` (`id`, `login`, `password`, `email`, `date_reg`) VALUES (NULL, '".$login."', MD5('".$password."'), '".$email."', UNIX_TIMESTAMP())");
//		echo "<script type='text/javascript'>alert('Аккаунт успешно создан.');</script>";
//		$users = new user($login);
//		$conMySQL->mySQL->close();
//	}
//}
//class user extends conMySQL{
//	function __construct($login){
//		$conMySQL = new conMySQL;
//		$result = $conMySQL->mySQL->query("SELECT * FROM `users` WHERE `login` LIKE '".$login."'");
//		$row = $result->fetch_assoc();
//		$_SESSION['USER_ID'] = $row["id"];
//		$_SESSION['USER_LOGIN'] = $row["login"];
//        $_SESSION['USER_EMAIL'] = $row["email"];
//        $_SESSION['USER_DATE_REG'] = $row["date_reg"];
//		$conMySQL->mySQL->close();
//	}
//}
//class auth extends conMySQL{
//	public $issetUser;
//	public $correctPass;
//	function correctPass($login, $password){
//		$conMySQL = new conMySQL;
//		$result = $conMySQL->mySQL->query("SELECT count(*) FROM users where login='".$login."'");
//		$arrU = $result->fetch_array(MYSQLI_NUM);
//		if ($arrU[0] == 0) $this->issetUser = false; else $this->issetUser = true;
//		//
//		$result = $conMySQL->mySQL->query("SELECT * FROM `users` WHERE `login` LIKE '".$login."' AND `password` LIKE MD5('".$password."')");
//		$arrP = $result->fetch_array(MYSQLI_NUM);
//		$conMySQL->mySQL->close();
//		($arrP[0] == 0) ? $this->correctPass = false : $this->correctPass = true;
//		$this->authUser($login);
//	}
//	function authUser($login){
//		if (!$this->issetUser) echo "<script type='text/javascript'>alert('Пользователь не найден.');</script>";
//		elseif (!$this->correctPass) echo "<script type='text/javascript'>alert('Пароль не соответствует.');</script>";
//		else {
//			$users = new user($login);
//		}
//	}
//}
?>
