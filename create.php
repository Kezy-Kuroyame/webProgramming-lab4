<?php
require_once('../lab4/utils/ErrorCollection.php');

$errors = new ErrorCollection();

$login = '';
$password = '';
$passwordConfirm = '';

$name = '';
$surname = '';
$birthday = '';
$city = '';

$xmlFile = simplexml_load_file("../lab4/data/data.xml");


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

    if (empty($_POST["passwordConfirm"])) {
        $errors->addError("Нужно подтвержить пароль");
    } else {
        $passwordConfirm = $_POST["passwordConfirm"];
    }

    if (empty($_POST["name"])) {
        $errors->addError("Нужно напсать имя пользователя");
    } else {
        $name = $_POST["name"];
    }

    if (empty($_POST["surname"])) {
        $errors->addError("Нужно написать фамилию");
    } else {
        $surname = $_POST["surname"];
    }

    if (empty($_POST["birthday"])) {
        $errors->addError("Нужно написать дату рождения");
    } else {
        $birthday = $_POST["birthday"];
    }

    if (empty($_POST["city"])) {
        $errors->addError("Нужно написать место жительства");
    } else {
        $city = $_POST["city"];
    }


    if (strcmp($password, $passwordConfirm) !== 0) {
        $errors->addError("Пароль и его подтверждение не совпадают");
    }


    foreach ($xmlFile as $user) {
        if ($user->login == $login) {
            $errors->addError("Такой логин уже существует");
            break;
        }
    }
    $errorMessage = implode("<br>", $errors->getErrors());

    if (!$errors->hasErrors()) {
        $user = $xmlFile->addChild('user');
        $newId = count($xmlFile->user);
        $user->addChild("id", $newId);
        $user->addChild("login", $login);
        $user->addChild("password", $password);
        $user->addChild("name", $name);
        $user->addChild("surname", $surname);
        $user->addChild("birthday", $birthday);
        $user->addChild("city", $city);

        $xmlFile->asXML("../lab4/data/data.xml");


        // copy("index.php", "#$newId.php");

        $indexUrl = "http://localhost/lab4/index.php?id=$newId";
        header("Location: $indexUrl");
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social-site</title>
    <link rel="stylesheet" href="../lab4/assets/css/create.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="block">
        <div class="header">Создать аккаунт</div>
        <div class="line"></div>
        <div class="content">
            <form method="POST" action="create.php">
                <div class="info">
                    <label for="login">Логин:</label>
                    <input type="text" name="login" id='login'><br>
                </div>
                <!-- <div class="half_line"></div> -->
                <div class="info">
                    <label for='password'>Пароль:</label>
                    <input type="password" name="password" id='password'><br>
                </div>
                <!-- <div class="half_line"></div> -->
                <div class="info">
                    <label for='passwordConfirm'>Подтвердите пароль:</label>
                    <input type="password" name="passwordConfirm" id='passwordConfirm'><br><br>
                </div>
                <!-- <div class="half_line"></div> -->
                <div class="info">
                    <label for='name'>Имя:</label>
                    <input type="text" id='name' name="name"><br>
                </div>
                <!-- <div class="half_line"></div> -->
                <div class="info">
                    <label for='surname'>Фамилия:</label>
                    <input type="text" id='surname' name="surname"><br>
                </div>
                <!-- <div class="half_line"></div> -->
                <div class="info">
                    <label for='birthday'>Дата рождения:</label>
                    <input type="text" id='birthday' name="birthday"><br>
                </div>
                <!-- <div class="half_line"></div> -->
                <div class="info">
                    <label for='city'>Город:</label>
                    <input type="text" id='city' name="city"><br>
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
                    <input type="submit" value="Зарегистрироваться" name="registr">
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>