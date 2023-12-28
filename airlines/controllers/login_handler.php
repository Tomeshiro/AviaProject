<?php
			session_start();
			session_destroy();
			session_start();
			if(isset($_POST['Login']))
			{
				$data_missing=array();
				if(empty($_POST['username']))
				{
					$data_missing[]='Username';
				}
				else
				{
					$user_name=trim($_POST['username']);
				}
				if(empty($_POST['password']))
				{
					$data_missing[]='Password';
				}
				else
				{
					$pass_word=$_POST['password'];
				}


				if(empty($data_missing))
				{
                    $user_type = 123;
                    try {
                        $pdo = new PDO("mysql:host=db;dbname=appDB;charset=utf8mb4", 'user', 'password');
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $pdo->prepare("SELECT * FROM user WHERE user_id = :user_id AND pwd = :pwd");
                        $stmt->bindParam(':user_id', $user_name, PDO::PARAM_STR);
                        $stmt->bindParam(':pwd', $pass_word, PDO::PARAM_STR);
                        $stmt->execute();
                        $user = $stmt->fetch(\PDO::FETCH_ASSOC);
                        $_SESSION['login_user']=$user_name;
                        $_SESSION['role']=$user['role'];
                        if ($_SESSION['role'] == 'normal') {
                            header("location:../views/customer_homepage.php");
                        }
                        else if ($_SESSION['role'] == 'admin') {
                            header('location:../views/admin_homepage.php');
                        }


                    } catch (PDOException $e) {
                        die("Ошибка подключения к базе данных: " . $e->getMessage());
                    }
				}
				else
				{
					echo "The following data fields were empty<br>";
					foreach($data_missing as $missing)
					{
						echo $missing ."<br>";
					}
				}
			}
			else
			{
				echo "Submit request not received";
			}
