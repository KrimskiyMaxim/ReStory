<?session_start();?>
<!doctype html>
<html>
<head>
	<?
		$title = "Статья";
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
					if(isset($_POST['submit-del-post'])) {
						$func = 'delArticles';
						$func($post["id"]);
					}
				$authorName = new queryDB;
				$authorName = $authorName->searchID('users', $post["author"]);
					if(isset($_SESSION['USER_ID']) && $_SESSION['USER_ID'] == $post["author"] || isset($_SESSION['USER_ID']) && $_SESSION['USER_LEVEL'] >= 100) {
						$var = "
							<div id='label-post-edit'>
								<a href='edit.php?id=".$post["id"]."'><i class='fa fa-pencil' aria-hidden='true'></i></a>
								<form method='post' id='del-post' name='del-post'>
									<input style='display: none;' type='submit' name='submit-del-post' id='submit-del-post' ></input>
									<label for='submit-del-post'><i style='font-size: 1.2em; margin-left: 10px; cursor: pointer;' class='fa fa-times' aria-hidden='true'></i></label>
								</form>
							</div>
							
						";
					} else {
						$var = '';
					}
				echo('
				<div class="full-post" id="last-post" >
					<div id="title-post" style="color:#333;">'.$post["title"].'</div>
					<div id="img-post">
							'.$var.'
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