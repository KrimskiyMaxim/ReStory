<? session_start(); ?>
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
			$post = getArticles(0, 10);
			for($i = 0; $i<count($post); $i++){
				($i==0)?$x = "id=\"last-post\"":$x='';
				echo('
				<div class="post" '.$x.'>
				<div class="img-post">
						<div class="label-post">
								<div class="label-post-up">'.$post[$i]["title"].'</div>
								<div class="label-post-down">
									<div>Admin ('.date("d M, Y", $post[$i]["date"]).') </div>
									<div><i class="fa fa-eye" aria-hidden="true"></i> '.$post[$i]["views"].'</div>
								</div>
						</div>
						<img src="articles/img/'.$post[$i]["id"].'.jpg">
				</div>
				<div class="text-post">
					'.$post[$i]["little_text"].' 
				</div>
				<div class="more">Далее...</div>
				</div>
				');
			}	
		?>
		</div>
		<div id="top-posts">
		<?
			$post = getTop(5);
			for($i = 0; $i<count($post); $i++){
				echo('
				<div class="post" style="flex-basis:auto;">
				<div class="img-post">
						<div class="label-post">
								<div class="label-post-up">'.$post[$i]["title"].'</div>
								<div class="label-post-down">
									<div>Admin ('.date("d M, Y", $post[$i]["date"]).') </div>
									<div><i class="fa fa-eye" aria-hidden="true"></i> '.$post[$i]["views"].'</div>
								</div>
						</div>
						<img src="articles/img/'.$post[$i]["id"].'.jpg">
				</div>
				<div class="text-post">
					'.$post[$i]["little_text"].' 
				</div>
				<div class="more">Далее...</div>
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