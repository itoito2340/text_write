<?php

session_start();

$name = $_POST["name"];
$password = $_POST["password"];

$dsn = 'mysql:host=localhost;dbname=maindata';
$pdo = new pdo($dsn,'root');

$query = 'SELECT * FROM user WHERE name=:name';
$stmt = $pdo->prepare($query);
$items = array(':name'=>$name);
$stmt->execute($items);
$data = $stmt->fetch();

if(password_verify($password,$data["password"])){
    $_SESSION["id"] = $name;
    header("Location: index.php");
}
else{
    echo "名前、またはパスワードが違います。";
}

?>