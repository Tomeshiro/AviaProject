<html>
	<head>
		<title>
			СОЗДАНИЕ НОВОГО АККАУНТА
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
    			margin: 0px 135px
			}
		</style>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<img class="logo" src="../images/logo.jpg"/>
		<h1 id="title">
			АвиаБилеты		</h1>
		<div>
			<ul>
				<li><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i> Главная</a></li>
				<li><a href="login_page.php"><i class="fa fa-ticket" aria-hidden="true"></i> Забронировать билеты</a></li>
				<li><a href="login_page.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Вход</a></li>
			</ul>
		</div>
		<br>
		<form class="center_form" action="../controllers/new_user_form_handler.php" method="POST" id="new_user_from">
			<h2><i class="fa fa-user-plus" aria-hidden="true"></i> Создать нового пользователя</h2>
			<br>
			<table cellpadding='10'>
				<strong>Введите параметры входа</strong>
				<tr>
					<td>Введите имя пользователя  </td>
					<td><input type="text" name="username" required><br><br></td>
				</tr>
				<tr>
					<td>Введите пароль  </td>
					<td><input type="password" name="password" required><br><br></td>
				</tr>
				<tr>
					<td>Введите почту</td>
					<td><input type="text" name="email" required><br><br></td>
				</tr>
			</table>
			<br>
			<table cellpadding='10'>
				<strong>Введите личные данные</strong>
				<tr>
					<td>Введите ваше имя  </td>
					<td><input type="text" name="name" required><br><br></td>
				</tr>
				<tr>
					<td>Введите ваш номер телефона</td>
					<td><input type="text" name="phone_no" required><br><br></td>
				</tr>
				<tr>
					<td>Введите ваш адрес</td>
					<td><input type="text" name="address" required><br><br></td>
				</tr>
			</table>
			<br>
			<input type="submit" value="Отправить" name="Submit">
			<br>
		</form>
	</body>
</html>