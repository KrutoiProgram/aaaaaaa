<?php
	if(!isset($_GET['id'])) 
	{
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
		exit;
	}
	require_once 'conf.php';
	$post = $dbh->prepare("SELECT * FROM blog join heading on blog.headingid = heading.headid WHERE id=:id");
	$post->bindParam(':id', $id);
	$id = $_GET[id];
	$post->execute();
	$result = $post->fetch(PDO::FETCH_ASSOC);

	if (!$result) 
	{
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
		exit;
	}
?>

<html>
	<head>
		<title>Личный блог</title>
		<meta charset="utf-8">
		<style>
			
			a:visited
			{
				color:#6fd9c0;
			}
			body {
				font-family: Arial;
			}
			.container{
				width: 1000px;
				margin: 0 auto;
				padding: 20px;
			}
			.post-footer > p {
				display: inline-block;
				margin: 20px;
				font-style: italic
			}
			a{
				display: inline-block;
				margin: 20px;
				font-style: italic
				color:#458f7e;
			}
		</style>
	</head>
	<body>
		
		<div class ="container">
			<h1>Личный блог Иванова И.И.</h1>
			<h2>Название - <?= $result['title']?></h2>
			<h3>Основной текст</h3>
			<hr>
			<p><?= $result['text']?></p>
			<hr>
			<div class="post-footer">
				<p>Дата поста - <?= $result['post_date']?></p>
				<p>Автор - <?= $result['author']?></p>
				<a href="HeadingPosts.php?id=<?=$result['headingid']?>">
					<p>Рубрика - <?= $result['rub_title']?></p>
				</a>
				<a href="index.php"><p>На главную<p></a>
			</div>
		</div>
	</body>
</html>