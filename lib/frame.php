<?
ini_set('display_errors',1);
error_reporting(E_ALL);
class connectDB{ 
	public $myDB;
	function __construct(){
		$this->connect();
	}
	function connect(){	/*Подключение к БД*/
		$this->myDB = new MySQLi ('localhost', 'root', 'root', 'second');
		!($this->myDB->connect_error)?:die('Error connect: ' . $this->myDB->connect_error);
	}
	function disconnect() {	/*Закрытие соединения с БД*/
		$this->myDB->close();
	}
}
class queryDB extends connectDB{
	function query($query) { /*запрос к БД с возвращением результата*/
		$connect = new connectDB;
		$result = $connect->myDB->query($query);
		$connect->disconnect();
		return($result);
	}
	function deleteString($table, $id) { /*Удаляет строку с определенным ID*/
		$this->query("DELETE FROM `$table` WHERE `$table`.`id` = $id");
	}
	function nextID($table) { /*Возвращает следующией ID в таблице*/
		$result = $this->query("SELECT * FROM `$table` ORDER BY `$table`.`id` DESC");
			while ($row = $result->fetch_assoc()) {
				$array[] = $row;
			}
		$num = $array[0]['id'];
		$num++;
		return $num;
	}
	function numberRecords($table) { /*Возвращает кол-во записей в таблице*/
		$result = $this->query("SELECT * FROM `$table` ORDER BY `id` DESC");
		return($result->num_rows);
	}
	function searchID($table, $id) { /*Возвращает строку с определенным ID*/
		
	}
	function unic($table, $row, $element) { /*Уникален ли элемент в ряду таблицы (Допустим, login или email)*/
		
	}
}