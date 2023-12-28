<?php
	session_start();
?>
<html>
	<head>
		<title>
			АвиаБилеты
		</title>
		<style>
			input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 30px;
			}
			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
    			margin: 0px 60px
			}
		</style>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<img class="logo" src="../images/logo.jpg"/>
		<h1 id="title">
			АвиаБилеты	</h1>
		<div>
			<ul>
				<li><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i> Главная</a></li>
				<li><a href="login_page.php"><i class="fa fa-ticket" aria-hidden="true"></i> Забронировать билеты</a></li>
				<li><a href="login_page.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Вход</a></li>
			</ul>
		</div>
		<br>
		<br>
		<br>
		<form class="float_form" style="padding-left: 40px" action="../controllers/login_handler.php" method="POST">
			<fieldset>
				<strong>Имя пользователя:</strong><br>
				<input type="text" name="username" placeholder="Введите имя пользователя" required><br><br>
				<strong>Пароль:</strong><br>
				<input type="password" name="password" placeholder="Введите пароль" required><br><br>
				<br>
				<?php
					if(isset($_GET['msg']) && $_GET['msg']=='failed')
					{
						echo "<br>
						<strong style='color:red'>Invalid Username/Password</strong>
						<br><br>";
					}
				?>
				<input type="submit" name="Login" value="Войти">
			</fieldset>
			<br>
			<a href="new_user.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Создать новый аккаунт?</a>
		</form>
	</body>
</html>