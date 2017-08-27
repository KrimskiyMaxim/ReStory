<div id="top">
	<div id="logo">
		<a href="/">ReStory</a>
	</div>
	<div id="menu">
	<?php if(isset($_SESSION['USER_ID'])): ?>
		<a href="/">Все посты</a>
		<a href="mypost.php">Мои посты</a>
		<a href="addArticle.php">Добавить пост</a>
		<a class="separator">|</a>
		<div id="search-box">
		<a><input type="text" id="search" placeholder="<? if(isset($_GET['source'])): echo($_GET['source']); endif;?>"></a>
		<a href="#"><i id='search-key' class="fa fa-search" aria-hidden="true"></i></a>
		</div>
	<?php else :?>
		<div id="search-box">
		<a><input type="text" id="search" placeholder="<? if(isset($_GET['source'])): echo($_GET['source']); endif;?>"></a>
		<a href="#"><i id='search-key' class="fa fa-search" aria-hidden="true"></i></a>
		</div>
	<? endif; ?>
	</div>
	<div id="auth">
		<? if(isset($_POST['logout'])){session_unset(); echo('<script>window.location="/";</script>');} ?>
		<?php if(isset($_SESSION['USER_ID'])): ?>
			<a><? echo(ucfirst($_SESSION['USER_FNAME']).' '.ucfirst($_SESSION['USER_NAME']))?></a>
			<div><a>|</a></div>
			<form class="logout" method="post">
				<div><input type="submit" id="logout" name="logout" value="Выход"></div>
			</form>
		<?php else :?>
<!--		<a id="enter">Войти</a>-->
		<a href="../../auth.php">Войти</a>
		<a class="separator">|</a>
		<a href="../../reg.php">Регистрация</a>
		<div id="box-auth">
<!--
			<form method="post" name="form_auth">
				<input type="text" name="login_auth" id="login_auth" placeholder="Введите логин">
				<input type="password" name="password_auth" id="password_auth" placeholder="Введите пароль">
				<input type="submit" name="submit_auth" id="submit_auth" value="Войти">
			</form>
-->
		</div>
		<? endif; ?>
	</div>
</div>