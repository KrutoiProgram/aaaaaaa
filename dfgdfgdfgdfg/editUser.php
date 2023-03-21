<?php
session_start();
require_once 'conf.php';
if (!empty($_POST['oldpass']) and !empty($_POST['newpass'])) 
{
	$user = $dbh->prepare("SELECT * FROM users WHERE id =:id");
	$user->bindParam(':id',$id);	
	$id = $_SESSION['id'];


	$oldPassword = $_POST['oldpass'];
	$newPassword = $_POST['newpass'];

	$user->execute();

	$current_user = $user->fetch(PDO::FETCH_ASSOC);
	$hash = $current_user['password'];
	
	if(password_verify($oldPassword,$hash))
	{
		$newPasswordHash = password_hash($newPassword,PASSWORD_DEFAULT);
		$user = $dbh->prepare("UPDATE users SET password='$newPasswordHash' WHERE id = '$id'");
		$user->execute();
	}
	else
	{
		die("Старый пароль не верный!");
	}
	
	$user = null;
	$dbh = null;
	echo "Данные изменены";
}
else
{
	echo "Ошибка!";
}
?>