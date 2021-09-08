<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板</title>
</head>
<body>
    <session>

    <h1>投稿完了</h1>
    <button onclick="location.href='index.php'">戻る</button>

    </session>

	<?php
        session_start();
		$name = $_SESSION["id"];
		$contents = $_POST["contents"];
		date_default_timezone_set('Asia/Tokyo');
		$created_at = date('Y-m-d H:i:s');
        $id = null;

		$dsn = "mysql:dbname=maindata;host=localhost";

		$pdo = new PDO($dsn, "root", "");

		$regist = $pdo->prepare("INSERT INTO post(id, name, contents, created_at) VALUES (:id,:name,:contents,:created_at)");
        $regist->bindParam(":id", $id);
        $regist->bindParam(":name", $name);
        $regist->bindParam(":contents", $contents);
        $regist->bindParam(":created_at", $created_at);
        $regist->execute();

	?>

</body>
</html>