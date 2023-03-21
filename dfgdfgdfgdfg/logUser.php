<?php
	session_start();
	require_once 'conf.php';
	if (!empty($_POST['password']) and !empty($_POST['login'])) 
	{
		
		$user = $dbh->prepare("SELECT * FROM users WHERE login =:login");
		$user->bindParam(':login',$login);	
		$login = $_POST['login'];
		$user->execute();
		$current_user = $user->fetch(PDO::FETCH_ASSOC);
		if (isset($current_user['id'])) 
		{

			$hash = $current_user['password'];
			if(password_verify($_POST['password'], $hash))
			{
				$_SESSION['auth'] = true;
				$_SESSION['id'] = $current_user['id'];
				$_SESSION['login'] = $current_user['login'];
				header("Location: index.php");
			}
			else
			{
				echo "Пароль не верный!";
			}
		} 
		else 
		{
			echo "Данный пользователь не зарегистрирован";
		}
	}
	else
	{
		echo "Заполните все значения";
	}
?>