<?php
session_start();
$dsn = "mysql:dbname=maindata;host=localhost";
$pdo = new PDO($dsn, "root", "");
$regist = $pdo->prepare('SELECT * FROM post');
$regist->execute();


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>掲示板</title>
</head>
<body>
	<h1>掲示板</h1>
	<section>

	<h2>新規投稿</h2>
	<form action="send.php" method="POST">

	名前：<?php echo $_SESSION["id"];?><br>
	投稿内容：<input type="text" name="contents"><br>
	<button type="submit">投稿</button>

	</form>

	</section>

	<section>
	<h2>投稿内容</h2>
		<?php foreach($regist as $loop): ?>
			<div>NO.<?php echo $loop['id'] ?></div>
			<div>name:<?php echo $loop['name'] ?></div>
			<div>contents:<?php echo $loop['contents'] ?></div>
			<div>-------------------------------------------------------------------</div>
		<?php endforeach; ?>

</section>

</body>
</html>