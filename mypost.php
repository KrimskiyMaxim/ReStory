<?session_start();?>
<!doctype html>
<html>
<head>
	<?
		$title = "ReSrory";
		require_once("lib/parts/head.php");
		require_once "lib/frame.php";
		require_once "lib/articles.php";
	?>
</head>
<body>
	<header>
		<?
			require_once("lib/parts/header.php");
		?>
	</header>
	<article>
	<div id="article">
	<div id="content">
		<div id="posts">
		<?
			if (!isset($_SESSION['USER_ID'])) {
				echo('<h1 style="color:#333; margin-top: 30px;">Ничего не найдено</h1>');
			}
			$post = getSearchArticles($_SESSION['USER_ID'], 'author', 0, 12);
			$numRecords = numSearchArticles($_SESSION['USER_ID'], 'author');
			$numPages = new queryDB;
			$numPages = ceil(count($numRecords) / 12);
			if(isset($_GET['page'])) {
			if($_GET['page'] > 1 && $_GET['page'] <= $numPages) {
				$i = $_GET['page'];
				$start = 12 * $i - 12;
				$post = getSearchArticles($_SESSION['USER_ID'], 'author', $start, 12);
			}}
			for($i = 0; $i<count($post); $i++){
				$authorName = new queryDB;
				$authorName = $authorName->searchID('users', $post[$i]["author"]);
				$x = '';
				echo('
				<div class="post" '.$x.'>
				<div class="img-post">
					<a href=article.php?id='.$post[$i]["id"].'>
						<div class="label-post">
								<div class="label-post-up">'.$post[$i]["title"].'</div>
								<div class="label-post-down">
									<div> '.$authorName["fname"].' '.$authorName["name"].' ('.date("d M, Y", $post[$i]["date"]).') </div>
									<div><i class="fa fa-eye" aria-hidden="true"></i> '.$post[$i]["views"].'</div>
								</div>
						</div>
						<img src="articles/img/'.$post[$i]["id"].'.jpg">
					</a>
				</div>
				<div class="text-post">'.$post[$i]["little_text"].'</div>
				<a href=article.php?id='.$post[$i]["id"].'><div class="more">Далее...</div></a>
				</div>
				');
			}
		?>
		<div class="page">
				<?
			if (isset($post[0]['id'])) {
				if ($numPages > 1) {
					(isset($_GET['page']))?$nowPage = $_GET['page']:$nowPage = 1;
					($nowPage == 1)?$prewPage=1:$prewPage=$nowPage-1;
					($nowPage == $numPages)?$nextPage=$numPages:$nextPage=$nowPage+1;
					echo('<a href="?page='.$prewPage.'"<i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>');
					if(isset($_GET['page'])){echo($_GET['page']);} else {echo('1');}
					echo('<a href="?page='.$nextPage.'"<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></a>');
				}
			}
				?>
		</div>
		</div>
		<div id="top-posts">
		<div style="font-size: 1.6em;">
			<i style="color: #333;" class="fa fa-star" aria-hidden="true"></i> <span style="color: #333;" >Популярное:</span>
		</div>
		<?
			$post = getTop(4);
			for($i = 0; $i<count($post); $i++){
				$authorName = new queryDB;
				$authorName = $authorName->searchID('users', $post[$i]["author"]);
				echo('
				<div class="post" style="flex-basis:auto;">
				<div class="img-post">
					<a href=article.php?id='.$post[$i]["id"].'>
						<div class="label-post">
								<div class="label-post-up">'.$post[$i]["title"].'</div>
								<div class="label-post-down">
									<div>'.$authorName["fname"].' '.$authorName["name"].' ('.date("d M, Y", $post[$i]["date"]).') </div>
									<div><i class="fa fa-eye" aria-hidden="true"></i> '.$post[$i]["views"].'</div>
								</div>
						</div>
						<img src="articles/img/'.$post[$i]["id"].'.jpg">
					</a>
				</div>
				<div class="text-post">'.$post[$i]["little_text"].'</div>
				<a href=article.php?id='.$post[$i]["id"].'><div class="more">Далее...</div></a>
				</div>
				');
			}
		?>
		</div>
	</div>
	</div>
	</article>
	<footer>
		<? require_once("lib/parts/footer.php"); ?>
	</footer>
</body>
</html>