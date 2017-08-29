<?session_start();?>
<!doctype html>
<html>
<head>
	<?
		$title = "Редактирование пост";
		require_once("lib/parts/head.php");
		require_once "lib/frame.php";
		require_once "lib/articles.php";
	?>
</head>
<body>
	<?php 
	$post = new queryDB();
	$post = $post->searchID('articles', $_GET['id']);
	if(isset($_SESSION['USER_ID']) && $_SESSION['USER_ID'] == $post["author"]): ?>
	<header>
		<?
			require_once("lib/parts/header.php");
		?>
	</header>
	<?
	if(isset($_POST['done'])){
		$name_file = $post["id"];
		move_uploaded_file($_FILES['img_case']['tmp_name'],"articles/img/"."$name_file.jpg");
		$func = 'editArticles';
		$func($post["id"], $_POST['title'], $_POST['little_text'], $_POST['full_text']);
		}
	?>
	<article>
	<?php if(isset($_SESSION['USER_ID'])): ?>
	<div id="addArticle">
	<p>Редактирование статьи</p>
	<form method="post" action="" name="form_addArticle" enctype="multipart/form-data" id="form_addArticle">
		<div id="posts">
			<div class="post" id="last-post">
					<div class="img-post">
					<div class="label-post">
					<div class="label-post-up">
					<div><input name="title" class="addArticle" type="text" placeholder="Название статьи" value='<?=$post['title']?>'</input></div>
					<div><input type="file" multiple accept="image/*" id="img_case" name="img_case"/><label for="img_case"><i id="upload" class="fa fa-arrow-circle-up" aria-hidden="true"></i></label></div>
					</div>
					<div class="label-post-down">
					<div><? echo(ucfirst($_SESSION['USER_FNAME']).' '.ucfirst($_SESSION['USER_NAME']))?> (<? echo(date("d M, Y")); ?>) </div>
					<div><i class="fa fa-eye" aria-hidden="true"></i> 0</div>
					</div>
					</div>
					<img id="preview" src="articles/img/<?=$post['id']?>.jpg">
					</div>
				<div class="text-post">
					<textarea name="little_text" class="addArticle" type="text" placeholder="Краткое содержание статьи"><?=$post['little_text']?></textarea>
					<textarea name="full_text" class="addArticle" type="text" placeholder="Полное содержание статьи" style="height: 500px;"><?=$post['full_text']?></textarea>
				</div>
				<input class="more" id="done" name="done" value="Готово" type="submit">
			</div>
		</div>
	</form>
	</div>
	<?php else :?>
	<?="<script>window.location='/';</script>"?>
	<?php endif;?>
	</article>
	<footer>
		<? require_once("lib/parts/footer.php"); ?>
	</footer>
	<?php else : echo('<script>window.location="/";</script>');?>
	<? endif; ?>
</body>
</html>