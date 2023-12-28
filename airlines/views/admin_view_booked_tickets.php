<?php
	session_start();
?>
<html>
	<head>
		<title>
			View Booked Tickets
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
    			margin: 0% 15.8%
			}
			input[type=date] {
				border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 5.5px 44.5px;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<link rel="stylesheet" href="font-awesome-4.7.0\css\font-awesome.min.css">
	</head>
	<body>
		<img class="logo" src="../images/logo.jpg"/>
		<h1 id="title">
			АвиаБилеты
		</h1>
		<div>
			<ul>
				<li><a href="admin_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Главная</a></li>
				<li><a href="../controllers/logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Выход</a></li>
			</ul>
		</div>
		<form action="../controllers/admin_view_booked_tickets_form_handler.php" method="post">
			<h2>ПРОСМОТР СПИСКА ЗАБРОНИРОВАННЫХ БИЛЕТОВ НА РЕЙС</h2>
			<div>
			<table cellpadding="5">
				<tr>
					<td class="fix_table">Введите номер рейса</td>
					<td class="fix_table">Введите дату отправки</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="text" name="flight_no" required></td>
					<td class="fix_table"><input type="date" name="departure_date" required></td>
				</tr>
			</table>
			<br>
			<br>
			<input type="submit" value="Отправить" name="Submit">
			</div>
		</form>
	</body>
</html>