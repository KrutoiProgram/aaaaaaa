<?php
require_once 'conf.php';
if (!empty($_POST['password']) and !empty($_POST['login'])) 
{
	$new_user = $dbh->prepare("INSERT INTO users (login,password) VALUES(:login,:password)");
	$new_user->bindParam(':login',$login);
	$new_user->bindParam(':password',$password);

	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$login = $_POST['login'];

	$new_user->execute();





	$new_user = null;
	$dbh = null;
	echo "Зарегистрирован!";
}
else
{
	echo "Заполните все поля";
}
?>