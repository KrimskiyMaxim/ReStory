<?
function getArticles($start, $end) {
	$begin = new connectDB;
	$result = $begin->query("SELECT * FROM `articles` ORDER BY `id` DESC LIMIT $start, $end");
	$array = array();
	while ($row = $result->fetch_assoc()) {
		$array[] = $row;
	}
	return($array);
}	
function getTop($lim) {
	$begin = new connectDB;
	$result = $begin->query("SELECT * FROM `articles` ORDER BY `articles`.`views` DESC LIMIT $lim");
	$array = array();
	while ($row = $result->fetch_assoc()) {
		$array[] = $row;
	}
	return($array);
}
function nextID() {
	$array = getArticles(0, 1);
	$nextID = $array[0]['id'];
	$nextID++;
	return $nextID;
}
function numberArticles() {
	$begin = new connectDB;
	$result = $begin->query("SELECT * FROM `articles` ORDER BY `id` DESC");
	return($result->num_rows);
}
function addArticle($id, $title, $little, $full){
	$begin = new connectDB;
	$result = $begin->query("INSERT INTO `articles` (`id`, `title`, `little_text`, `full_text`, `author`, `views`, `rating`, `date`) VALUES ('".$id."', '".$title."', '".$little."', '".$full."', '1', '0', '0', UNIX_TIMESTAMP())");
	echo('<script>window.location="/";</script>');
}
?>