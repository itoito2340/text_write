<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    
    $name = $_POST["name"];
    $password = $_POST["password"];
    $err = null;

    if(empty($name)){
        echo "名前が入力されていません。";
        $err["name"] = "empty";
    }
    if(empty($password)){
        echo "パスワードが入力されていません。"; 
        $err["password"] = "empty"; 
    } 
    if(!isset($err)){
        $hash = password_hash($password, PASSWORD_DEFAULT);

            $dsn = 'mysql:host=localhost;dbname=maindata';
            $pdo = new pdo($dsn,'root');
        
            $query = 'INSERT INTO user(name,password) VALUES(:name,:hash)';
            $do = $pdo->prepare($query);
            $params = array(':name' => $name, ':hash' => $hash);
            $do->execute($params);

            echo "登録完了";
    }
    ?>
</body>
</html>