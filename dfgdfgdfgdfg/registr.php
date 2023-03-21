<?php 
session_start();
if (!empty($_SESSION['auth'])) 
	die("Вы авторизованны");	
?>
<!DOCTYPE html>
	<head>
		<title>Регистрация</title>
		<meta charset="utf-8">
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

				button {
					border-radius: 10px;
				    padding: 10px;
				    background: #1e947a;
				    border: unset;
				    cursor: pointer;
				    color:white;
				}
		</style>
	</head>
	<body>
	<div id="container-title">
		<h1>Регистрация аккаунта</h1>
	</div>
	<div id="container">
	<form method="POST" action="addUser.php">
		<label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit">Зарегистрировать</button>
        <p>
            У вас есть аккаунт? - <a href="Auth.php">Войти</a>!
        </p>

	</form>
	</div>
	</body>