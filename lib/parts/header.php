<div id="top">
	<div id="logo">
		<a href="/">ReStory</a>
	</div>
	<div id="menu">
		<a href="#">Все посты</a>
		<a href="#">Мои посты</a>
		<a href="#">Сообщения</a>
		<a class="separator">|</a>
		<a><input type="text" id="search"></a>
		<a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
	</div>
	<div id="auth">
		<?php if(isset($_SESSION['USER_ID'])): ?>
		<? if(isset($_POST['logout'])){session_unset();} ?>
			<a><? echo(ucfirst($_SESSION['USER_FNAME'].' '.$_SESSION['USER_NAME']))?></a>
			<div><a> | </a></div>
			<form class="logout" method="post">
				<div><input type="submit" id="logout" name="logout" value="Выход"></div>
			</form>
		<?php else :?>
		<a id="enter">Войти</a>
		<a class="separator">|</a>
		<a href="../../reg.php">Регистрация</a>
		<div id="box-auth">
			<form method="post" name="form_auth">
				<input type="text" name="login_auth" id="login_auth" placeholder="Введите логин">
				<input type="password" name="password_auth" id="password_auth" placeholder="Введите пароль">
				<input type="submit" name="submit_auth" id="submit_auth" value="Войти">
			</form>
		</div>
		<? endif; ?>
	</div>
</div>