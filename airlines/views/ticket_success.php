<?php
	session_start();
?>
<html>
	<head>
		<title>
			Успешная резервация билета
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
		<h2>РЕЗЕРВАЦИЯ УСПЕШНА</h2>
		<h3>Ваш платёж &#x20bd; <?php echo $_SESSION['total_amount']; ?> был получен.<br><br> Ваш код PNR - <strong><?php echo $_SESSION['pnr'];?></strong>. Ваши билеты были успешно зарезервированны.</h3>
		<!--Following data fields were empty!
			...
			ADD VIEW FLIGHT DETAILS AND VIEW JETS/ASSETS DETAILS for ADMIN
		-->
	</body>
</html>