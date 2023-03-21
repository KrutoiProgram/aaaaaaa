<?php
require_once 'conf.php';
$new_post = $dbh->prepare("INSERT INTO heading (rub_title) VALUES(:rub_title)");
$new_post->bindParam(':rub_title',$rub_title);




if($_POST['heading_title']!="")
{
	$rub_title = $_POST['heading_title'];
	$new_post->execute();
}
else
{
	die("Заполните все поля");
}



$new_post = null;
$dbh = null;

header("Location: FormaAddPost.php");
?>