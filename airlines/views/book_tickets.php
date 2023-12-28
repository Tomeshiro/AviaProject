<?php
	session_start();
?>
<html>
	<head>
		<title>
			Просмотр свободных рейсов
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
    			margin: 0px 127px
			}
			input[type=date] {
				border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 5.5px 44.5px;
			}
			select {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 6.5px 75.5px;
			}
		</style>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<img class="logo" src="../images/logo.jpg"/>
		<h1 id="title">
			АвиаБилеты
		</h1>
		<div>
			<ul>
				<li><a href="customer_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Главная</a></li>
				<li><a href="../controllers/logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Выход</a></li>
			</ul>
		</div>
		<form action="view_flights_form_handler.php" method="post">
			<h2>ПРОСМОТР СВОБОДНЫХ РЕЙСОВ</h2>
			<table cellpadding="5">
				<tr>
					<td class="fix_table">Введите Откуда</td>
					<td class="fix_table">Введите Куда</td>
				</tr>
				<tr>
					<td class="fix_table">
						<input list="origins" name="origin" placeholder="Откуда" required>
  						<datalist id="origins">
  						  	<option value="bangalore">
  						</datalist>
						<!-- <input type="text" name="origin" placeholder="From" required> --></td>
					<td class="fix_table">
						<input list="destinations" name="destination" placeholder="Куда" required>
  						<datalist id="destinations">
  						  	<option value="mumbai">
  						  	<option value="mysore">
  						  	<option value="mangalore">
  						  	<option value="chennai">
  						  	<option value="hyderabad">
  						</datalist>
						<!-- <input type="text" name="destination" placeholder="To" required> --></td>
				</tr>
			</table>
			<br>
			<table cellpadding="5">
				<tr>
					<td class="fix_table">Введите дату отправки</td>
					<td class="fix_table">Введите кол-во пассажиров</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="date" name="dep_date" min=
						<?php 
							$todays_date=date('Y-m-d'); 
							echo $todays_date;
						?> 
						max=
						<?php 
							$max_date=date_create(date('Y-m-d'));
							date_add($max_date,date_interval_create_from_date_string("90 days")); 
							echo date_format($max_date,"Y-m-d");
						?> required></td>
					<td class="fix_table"><input type="number" name="no_of_pass" placeholder="Допустим, 5" required></td>
				</tr>
			</table>
			<br>
			<table cellpadding="5">
				<tr>
					<td class="fix_table">Выберите класс</td>
				</tr>
				<tr>
					<td class="fix_table">
						<select name="class">
  							<option value="economy">Эконом</option>
  							<option value="business">Бизнес</option>
  						</select>
  					</td>
				</tr>
			</table>
			<br>
			<input type="submit" value="Поиск свободных рейсов" name="Search">
		</form>
	</body>
</html>