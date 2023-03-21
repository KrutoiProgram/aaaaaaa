<?php 
session_start();
if (empty($_SESSION['auth'])) 
	die("Нет доступа");
	
	require_once 'conf.php';
	
?>
<!DOCTYPE html>
	<head>
		<title>Добавить запись в блог</title>
		<meta charset="utf-8">
		<style>
			<style>
			* {
				    margin: 0;
				    padding: 0;
				    box-sizing: border-box;
				}

				#container {
				    height: 100vh;
				    display: flex;
				    align-items: center;
				    justify-content: center;
				    font-family: Montserrat, sans-serif;
				}
				#container-heading {
				    align-items: center;
				    justify-content: center;
				    font-family: Montserrat, sans-serif;
				}
				#container-title {
					color:#339e86;
				    align-items: center;
				    justify-content: center;
				    margin-bottom: 25px;
				    display: flex;
				}
				a {
				    color:#4be3c1;
				    font-weight: bold;
				    text-decoration: none;
				}

				p {
				    margin: 10px 0;
				}

				form {
				    display: flex;
				    flex-direction: column;
				    width: 400px;
				}

				input {
				    margin: 10px 0;
				    padding: 10px;
				    border: unset;
				    border-bottom: 2px solid #e3e3e3;
				    outline: none;
				}
				label
				{
					color:#59ebc8
				}
				h1,h2
				{
					color:#59ebc8
				}
				button {
					width:50%;
					height:35px;
					border-radius: 10px;
				    padding: 10px;
				    background: #1e947a;
				    border: unset;
				    cursor: pointer;
				    color:white;

				}
		</style>
		</style>
	</head>
	<div id="container">
	<form method="POST" action="editUser.php">
		<div>
			<?php
			$iduser = $_SESSION['id'];
			$user = $dbh->query("select * from users where id = $iduser");
			$user->execute();
			$current_user = $user->fetch(PDO::FETCH_ASSOC);
			?>
			<h1>Изменение пароля</h1>
			<h2 for=\author\>Логин пользователя <?= $current_user['login'] ?></h2><br>
		</div>
		<div>
			<label for="title">Старый пароль</label><br>
			<input type="text" name="oldpass" placeholder="Старый пароль">
		</div>
		<div>
			<label for="title">Новый пароль</label><br>
			<input type="text" name="newpass" placeholder="Новый пароль">
		</div>
		
		
		<div>
			
			<button type="submit" name="submit">Изменить пароль</button>
		</div>
	</div>

	
	
