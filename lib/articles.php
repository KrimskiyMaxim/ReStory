<?
function getArticles($start, $end) {
	$begin = new queryDB;
	$result = $begin->query("SELECT * FROM `articles` ORDER BY `id` DESC LIMIT $start, $end");
	$array = array();
	while ($row = $result->fetch_assoc()) {
		$array[] = $row;
	}
	return($array);
}	
function getTop($lim) {
	$begin = new queryDB;
	$result = $begin->query("SELECT * FROM `articles` ORDER BY `articles`.`views` DESC LIMIT $lim");
	$array = array();
	while ($row = $result->fetch_assoc()) {
		$array[] = $row;
	}
	return($array);
}
function nextIDs() {
	$begin = new queryDB;
	$result = $begin->nextID('articles');
	return $result;
}
function numberArticles() {
	$begin = new queryDB;
	$begin->numberRecords('articles');
	return($begin);
}
function addArticle($id, $title, $little, $full, $author){
	$begin = new queryDB;
	$result = $begin->query("INSERT INTO `articles` (`id`, `title`, `little_text`, `full_text`, `author`, `views`, `rating`, `date`) VALUES ('".$id."', '".$title."', '".$little."', '".$full."', '$author', '0', '0', UNIX_TIMESTAMP())");
	echo('<script>window.location="/";</script>');
}
function viewPlus($id) {
	$begin = new queryDB;
	$result = $begin->searchID('articles', $id);
	$nextVeiw = $result['views'] + 1;
	$begin->query("UPDATE `articles` SET `views` = '$nextVeiw' WHERE `articles`.`id` = $id");
}
?>