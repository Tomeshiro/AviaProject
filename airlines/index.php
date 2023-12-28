<?php
	session_start();
?>
<html>
	<head>
		<title>
			АвиаБилеты
		</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>
		<img class="logo" src="images/logo.jpg"/>
		<h1 id="title">
            АвиаБилеты
		</h1>
		<div>
			<ul>
				<li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Главная</a></li>
				<li>
					<?php
							echo "<a href=\"views/login_page.php\"><i class=\"fa fa-ticket\" aria-hidden=\"true\"></i> Забронировать билеты</a>";
					?>
				</li>

				<li>
					<?php
							echo "<a href=\"views/login_page.php\"><i class=\"fa fa-sign-in\" aria-hidden=\"true\"></i> Вход</a>";
					?>
				</li>
			</ul>
		</div>
		<div class="container">
			<div class="welcome_text">Добро пожаловать к нам!</div>
			<img src="images/background.jpg" width=100%>
		</div>
		<!--check out addling local host in links and other places

			shift login/logout buttons to right side
		-->
	</body>
</html>