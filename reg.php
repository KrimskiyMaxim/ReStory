<?session_start();?>
<!doctype html>
<html>
<head>
	<?
		$title = "Регистрация";
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
	if(isset($_POST['submit_reg'])){
		$check = new addUser;
		$name_file = $check->nextIDs();
		$check->check(mb_strtolower($_POST['login_reg']), $_POST['password_reg'], $_POST['repassword_reg'], $_POST['email_reg'], $_POST['name_reg'], $_POST['fname_reg']); 
			if($check->errors == false){
					move_uploaded_file($_FILES['img_case']['tmp_name'],"users/img/"."$name_file.jpg");
			}
		}
	?>
	<article>
	<div id="registration">
	<form method="post" name="reg_form" id="reg_form" enctype="multipart/form-data">
		<div id="user_logo">
			<input type="file" multiple accept="image/*" id="img_case" name="img_case"/>
			<label for="img_case" id="label_reg"><i class="fa fa-plus" aria-hidden="true"></i></label>
			<span><img class="user_logo_span_img_HbW" id="preview" src="img/none_profile.png"></span>
		</div>
		<div id="user_date">
			<input type="text" name="login_reg" id="login_reg" placeholder="Логин">
			<input type="text" name="name_reg" id="name_reg" placeholder="Имя">
			<input type="text" name="fname_reg" id="fname_reg" placeholder="Фамилия">
			<input type="email" name="email_reg" id="email_reg" placeholder="Email">
			<input type="password" name="password_reg" id="password_reg" placeholder="Пароль">
			<input type="password" name="repassword_reg" id="repassword_reg" placeholder="Повторите пароль">
			<input type="submit" name="submit_reg" id="submit_reg" value="Зарегистрировать">
		</div>
	</form>
	<div id="auth_reg">
		<p>Есть аккаунт?</p>
		<ins><a href="auth.php">Войти</a></ins>
	</div>
	</div>
	</article>
	<footer>
		<? require_once("lib/parts/footer.php"); ?>
	</footer>
</body>
</html>