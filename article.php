<?session_start();?>
<!doctype html>
<html>
<head>
	<?
		$title = "Авторизация";
		require_once "lib/parts/head.php";
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
				$nextView = viewPlus($_GET['id']);
				$post = new queryDB();
				$post = $post->searchID('articles', $_GET['id']);
				$authorName = new queryDB;
				$authorName = $authorName->searchID('users', $post["author"]);
				echo('
				<div class="full-post" id="last-post" >
					<div id="title-post" style="color:#333;">'.$post["title"].'</div>
					<div id="img-post">
							<div id="label-post">
									<div> Автор: '.$authorName["fname"].' '.$authorName["name"].' ('.date("d M, Y", $post["date"]).')</div>
									<div><i class="fa fa-eye" aria-hidden="true"></i> '.$post["views"].'</div>
							</div>
							<img src="articles/img/'.$post["id"].'.jpg">
					</div>
				<div id="text-post">'.$post["full_text"].'</div>
				</div>
				');	
		?>
		</div>
		<div id="top-posts">
		<?
			$post = getTop(5);
			for($i = 0; $i<count($post); $i++){
				echo('
				<div class="post" style="flex-basis:auto;">
					<div class="img-post">
						<a href=article.php?id='.$post[$i]["id"].'>
							<div class="label-post">
									<div class="label-post-up">'.$post[$i]["title"].'</div>
									<div class="label-post-down">
										<div>Admin ('.date("d M, Y", $post[$i]["date"]).') </div>
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