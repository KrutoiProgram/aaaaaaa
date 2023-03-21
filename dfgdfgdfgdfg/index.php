<?php
session_start();
if (empty($_SESSION['auth'])) 
	die("Нет доступа");
?>
<html>
	<head>
		<title>Личный блог</title>
		<meta charset="utf-8">
		<style>
			a{
				color:#458f7e;
			}
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
			}
			.menucontainer{
				float:left;
				width: 420px
				margin: 0 auto;
			}
			.logcontainer{
				float:right;
				width: 420px
				margin: 0 auto;
			}
			.post {
				float: left;
				width:420px;
				margin:20px;
			}
			button {
					width:100%;
					height:34px;
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
		<div class ="menucontainer">
			<h2>Рубрики</h2>
			<hr>
			<?php
			require_once 'conf.php';
			$rows = $dbh->query("select * from heading");
			foreach($rows as $row)
			{
				echo "<a href='HeadingPosts.php?id=".$row['headid']."'>".$row['rub_title']."</a><br><br>";
			}
			echo "<a href='index.php'>"."На главную"."</a><br><br>";
			echo "<hr>";
			echo "<a href='logout.php'>Выход</a>";
			?>

		</div>
<div class ="logcontainer">
			<h2>Пользователь</h2>
			<hr>
			<?php
			require_once 'conf.php';
			$iduser = $_SESSION['id'];
			$user = $dbh->query("select * from users where id = $iduser");
			$user->execute();
			$current_user = $user->fetch(PDO::FETCH_ASSOC);
			echo "Логин - ".$current_user['login'];
			?>
			<hr>
			<form action="FormaEditUser.php">
				<button type="submit">Измнеить данные пользователя</button>
			</form>
			<form action="FormaAddPost.php">
				<button type="submit">Добавить пост</button>
			</form>
		</div>
		<div class ="container">
			
			<h1>Личный блог Иванова И.И.</h1>
			<?php
			$rows = $dbh->query("select * from blog join heading on blog.headingid = heading.headid");
			foreach ($rows as $row) 
			{	
				echo "<div class='post'><h2>".$row['title']."</h2>";
				echo "<p><i>".$row['author']."</i></p>";
				echo "<p>Дата публикации: ".$row['post_date']."</p>";
				if(strlen($row['text'])>100)
				{
					echo "<hr><p>".substr($row['text'], 0,100)."...</p>";
				}
				else
				{
					echo "<hr><p>".$row['text']."</p>";
				}
				echo "<p>".$row['rub_title']."</p>";
				echo "<a href='post.php?id=".$row['id']."'>Читать подробнее</a></div>";
			}
			?>
		</div>
		
	</body>
</html>
