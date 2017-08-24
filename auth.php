<?session_start();?>
<!doctype html>
<html>
<head>
	<?
		$title = "Авторизация";
		require_once "lib/parts/head.php";
		require_once "lib/frame.php";
		require_once "lib/user.php";
	?>
</head>
<body>
	<header>
		<?
			require_once("lib/parts/header.php");
		?>
	</header>
	<?
	if(isset($_POST['submit_auth'])){
		$begin = new auth;
		$begin->correctInfo($_POST['login_auth'], $_POST['password_auth']);
	}
	?>
	<article>
	<div id="authorization">
	<form method="post" name="auth_form" id="auth_form" enctype="multipart/form-data">
		<div id="user_date">
			<input type="text" name="login_auth" id="login_auth" placeholder="Логин">
			<input type="password" name="password_auth" id="password_auth" placeholder="Пароль">
			<input type="submit" name="submit_auth" id="submit_auth" value="Войти">
		</div>
	</form>
	</div>
	</article>
	<footer>
		<? require_once("lib/parts/footer.php"); ?>
	</footer>
</body>
</html>