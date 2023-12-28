<?php
	session_start();
?>
<html>
	<head>
		<title>
			Администраторская панель
		</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<img class="logo" src="../images/logo.jpg"/>
		<h1 id="title">
			АвиаБилеты	</h1>
		<div>
			<ul>
				<li><a href="admin_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Главная</a></li>
				<li><a href="../controllers/logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Выход</a></li>
			</ul>
		</div>
		<h2>Добро пожаловать, администратор!</h2>
		<table cellpadding="5">
			
			<tr>
				<td class="admin_func"><a href="admin_view_booked_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> Посмотреть список забронированных билетов на рейс</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="add_flight_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Добавить рейс</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="delete_flight_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Удалить рейс</a>
				</td>
			</tr>
			<tr>
				<td class="admin_func"><a href="add_jet_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Добавить самолёт</a>
				</td>
			</tr>
		</table>
	</body>
</html>