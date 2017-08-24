<?
class addUser{
	public $errors = false;
	function check($login, $password, $repassword, $email, $name, $fname){
		$this->login($login);
		$this->password($password);
		$this->email($email);
		$this->repassword($password, $repassword);
		$nextID = $this->nextIDs();
		if ($this->errors == false) {
			$send = new queryDB;
			$send->query("INSERT INTO `users` (`id`, `login`, `password`, `email`, `name`, `fname`, `date_reg`, `level`) VALUES ('$nextID', '$login', MD5('$password'), '$email', '$name', '$fname', UNIX_TIMESTAMP(), 'NULL')");
			$auth = new users($login);
		}
	}
	function login($obj){
		$unic = new queryDB;
		$unic = $unic->unic('users', 'login', $obj);
		if(!(preg_match("/^[a-z][a-z0-9]*?([-_][a-z0-9]+){0,2}$/", $obj))){
			echo "Неверный логин.";
			$this->errors = true;
		} elseif(!$unic) {
			$err = array('errors'=>'Логин занят.');
			echo "Логин занят.";
			$this->errors = true;
		}	else {$this->login = $obj;}

	}
	function password($obj){
		if(!preg_match("/^\S*(?=\S{9,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/",$obj)){
			echo "Некорректный пароль.";
			$this->errors = true;
		} else {$this->password = $obj;}
	}
	function repassword($one,$two){
		if (!($one == $two)) {
			echo "Пароли не совпадают.";
			$this->errors = true;
		}
	}
	function email($obj){
		$unic = new queryDB;
		$unic = $unic->unic('users', 'email', $obj);
		if(!(preg_match("/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u",$obj))){
			echo "Некорректный Email.";
			$this->errors = true;
		} elseif(!$unic) {
			echo "Email занят.";
			$this->errors = true;
		} else {$this->email = $obj;}
	}
	function nextIDs() {
		$begin = new queryDB;
		$result = $begin->nextID('users');
		return $result;
	}
}
class auth {
	private $correctLogin;
	private $correctPassword;
	function correctInfo($login, $password){
		$begin = new queryDB;
		$this->correctLogin = !($begin->unic('users', 'login', $login));
		//
		$result = $begin->query("SELECT * FROM `users` WHERE `login` LIKE '".$login."' AND `password` LIKE MD5('".$password."')");
		$result = $result->num_rows;
		($result == 1) ? $this->correctPassword = true : $this->correctPassword = false;
		$this->authUser($login);
	}
	function authUser($login){
		if (!$this->correctLogin) echo "<script type='text/javascript'>alert('Пользователь не найден.');</script>";
		elseif (!$this->correctPassword) echo "<script type='text/javascript'>alert('Пароль не соответствует.');</script>";
		else {
			$user = new users($login);
		}
	}
}
class users {
	function __construct($login){
		$begin = new queryDB;
		$result = $begin->query("SELECT * FROM `users` WHERE `login` LIKE '".$login."'");
		$row = $result->fetch_assoc();
		$_SESSION['USER_ID'] = $row["id"];
		$_SESSION['USER_LOGIN'] = $row["login"];
        $_SESSION['USER_EMAIL'] = $row["email"];
        $_SESSION['USER_NAME'] = $row["name"];
        $_SESSION['USER_FNAME'] = $row["fname"];
        $_SESSION['USER_LEVEL'] = $row["level"];
        $_SESSION['USER_DATE_REG'] = $row["date_reg"];
		echo('<script>window.location="/";</script>');
	}
}
?>