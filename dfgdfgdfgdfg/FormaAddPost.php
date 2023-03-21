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
				h1
				{
					color:#59ebc8
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
	<form method="POST" action="addPost.php">
		<div>
			<?php
			$iduser = $_SESSION['id'];
			$user = $dbh->query("select * from users where id = $iduser");
			$user->execute();
			$current_user = $user->fetch(PDO::FETCH_ASSOC);
			?>
			<h1>Автор записи <?= $current_user['login'] ?></h1><br>
		</div>
		<div>
			<label for="title">Заголовок записи</label><br>
			<input type="text" name="title" placeholder="заголовок">
		</div>
		<div>
			<label for="text">Рубрика</label><br>
			<select name="headings">
				<?php
					
					$rows = $dbh->query("select * from heading");
					foreach($rows as $row)
					{
						echo "<option value='".$row['headid']."'>".$row['rub_title']."</option>";
					}
				?>
			</select>
		</div>
		<div>
			<label for="text">Текст записи</label><br>
			<textarea name="text" placeholder="текст"></textarea>
		</div>
		
		<div>
			
			<button type="submit" name="submit">Добавить пост</button>
		</div>
		</form>
	<div id="container-heading">
	<form method="POST" action="addHeading.php">
		<div>
			<label for="heading_title">Название рубрики</label><br>
			<input type="text" name="heading_title" placeholder="Рубрика">
		</div>
		<div>
			
			<button type="submit" name="submit">Добавить рубрику</button>
		</div>
	</form>
	</div>
	</div>

	
	
