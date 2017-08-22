<!doctype html>
<html>
<head>
	<?
		$title = "Добавить пост";
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
	<?
	if(isset($_POST['done'])){
		$name_file = nextIDs();
		move_uploaded_file($_FILES['img_case']['tmp_name'],"articles/img/"."$name_file.jpg");
		$func = 'addArticle';
		$func($name_file, $_POST['title'], $_POST['little_text'], $_POST['full_text']);
		}
	?>
	<article>
	<div id="addArticle">
	<p>Добавление статьи</p>
	<form method="post" action="" name="form_addArticle" enctype="multipart/form-data" id="form_addArticle">
		<div id="posts">
			<div class="post" id="last-post">
					<div class="img-post">
					<div class="label-post">
					<div class="label-post-up">
					<div><input name="title" class="addArticle" type="text" placeholder="Название статьи"></div>
					<div><input type="file" multiple accept="image/*" id="img_case" name="img_case"/><label for="img_case"><i id="upload" class="fa fa-arrow-circle-up" aria-hidden="true"></i></label></div>
					</div>
					<div class="label-post-down">
					<div>Admin (<? echo(date("d M, Y")); ?>) </div>
					<div><i class="fa fa-eye" aria-hidden="true"></i> 0</div>
					</div>
					</div>
					<img id="preview" src="articles/img/none.jpg">
					</div>
				<div class="text-post">
					<textarea name="little_text" class="addArticle" type="text" placeholder="Краткое содержание статьи"></textarea>
					<textarea name="full_text" class="addArticle" type="text" placeholder="Полное содержание статьи" style="height: 500px;"></textarea>
				</div>
				<input class="more" id="done" name="done" value="Готово" type="submit">
			</div>
		</div>
	</form>
	</div>	
	</article>
	<footer>
		<? require_once("lib/parts/footer.php"); ?>
	</footer>
</body>
</html>