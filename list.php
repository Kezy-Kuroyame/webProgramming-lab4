<?php
require_once('../lab4/utils/ErrorCollection.php');

$errors = new ErrorCollection();
$xmlFile = simplexml_load_file("../lab4/data/data.xml");

$login = '';
$password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["login"])) {
        $errors->addError("Введите логин");
    } else {
        $login = $_POST["login"];
    }

    if (empty($_POST["password"])) {
        $errors->addError("Введите пароль");
    } else {
        $password = $_POST["password"];
    }

    foreach ($xmlFile as $user) {
        if ($user->login == $login) {
            if ($user->password == $password) {
                $userId = $user->id;
                $indexUrl = "http://localhost/lab4/index.php?id=$userId";
                header("Location: $indexUrl");
            } else {
                $errors->addError("Неверный пароль");
            }
        }
    }
    if (!empty($_POST['login'])) {
        $errors->addError("Такого логина не существует");
    }

    $errorMessage = implode("</br>", $errors->getErrors());
}

if (isset($_POST['reg'])){
    header("Location: http://localhost/lab4/create.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../lab4/assets/css/list.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;500&display=swap" rel="stylesheet">
    <title>Social-site</title>
</head>
<body>
<div class="block">    
    <form method="POST" action="">
        <div class="header">Авторизация</div>
        <div class="line"></div>
        <div class="info">
        <label>Логин:</label>
        <input type="text" name="login"><br>
        </div>
        <div class="info">
        <label>Пароль:</label>
        <input type="password" name="password"><br>
        </div>
        <div class="errors">
        <?php         
            if ($errors->hasErrors()) {
                echo ("<div class=line></div>");
                echo ($errorMessage);
                echo ("<div class=line></div>");
            } 
        
        ?>
        </div>
        <div class="btn">
            <input type="submit" value="Войти" name="log_in">
            <input type="submit" value="Регистрация" name="reg">
        </div>
    </form>
</div>
     
</body>
</html>
