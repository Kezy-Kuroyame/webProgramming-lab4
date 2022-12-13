<?php 
//ini_set('display_errors', 'Off'); 
require_once('../lab4/utils/ErrorCollection.php');
$xmlFile = simplexml_load_file("../lab4/data/data.xml");


$errors = new ErrorCollection();
$id = $_GET['id'];
$adress = "http://localhost/lab4/index.php?id=$id";





foreach($xmlFile as $user){
    if ($id == $user->id){
        $password = $user->password;
        $name = $user->name;
        $oldLogin = $user->login;
        $surname = $user->surname;
        $birthday = $user->birthday;
        $city = $user->city;
        break;
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submit'])){
    if (empty($_POST["login"])) {
        $errors->addError("Введите логин");
    }
    else{
        $login = $_POST["login"];
    }

    // if (isset($_POST['changePassword'])){
    if (empty($_POST["password"]) and !empty($_POST["passwordConfirm"])) {
        $errors->addError("Введите старый пароль");
    }
    elseif ($_POST["password"] != $password and !empty($_POST["password"])){
        $errors->addError("Вы ввели неверный пароль");
    }

    if (empty($_POST["password_new"]) and !empty($_POST["password"])){
        $errors->addError("Введите новый пароль");  
    } elseif(!empty($_POST["password"])) {
        $password = $_POST["password_new"];
    }


    if (empty($_POST["name"])) {
        $errors->addError("Нужно напсать имя пользователя");
    }
    else{
        $name = $_POST["name"];
    }

    if (empty($_POST["surname"])) {
        $errors->addError("Нужно написать фамилию");
    }
    else{
        $surname = $_POST["surname"];
    }

    if (empty($_POST["birthday"])) {
        $errors->addError("Нужно написать дату рождения");
    }
    else{
        $birthday = $_POST["birthday"];
    }

    if (empty($_POST["city"])) {
        $errors->addError("Нужно написать место жительства");
    }
    else{
        $city = $_POST["city"];
    }

    if ($oldLogin != $login){
        foreach ($xmlFile as $user){
            if ($user->login == $login){
                $errors->addError("Такой логин уже существует");
                break;
            }
        }
    }
    if (!$errors->hasErrors()){
        foreach($xmlFile as $user){
            if ($id == $user->id){
                $user->name = $name;
                $user->login = $oldLogin;
                $user->surname = $surname;
                $user->birthday = $birthday;
                $user->city = $city;
                $user->password = $password;

                

                $xmlFile->asXML("../lab4/data/data.xml");
                break;
            }
        }
    }
}
if (isset($_POST['back'])){
    header("Location: $adress");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lab4/assets/css/update.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;500&display=swap" rel="stylesheet">
    <title>Social-site</title>
</head>
<body>
    <div class="block">
        <div class="header">Параметры</div>
        <div class="line"></div>
        <div class="content">
            <form method="POST">
                <div class="info">
                    <label>Логин:</label>
                    <input type="text" name="login" value="<?php echo($oldLogin);?>"><br>
                </div>
                <?php
                // echo ("$changePassword");
                $changePas = false;

                if (!isset($_POST['changePassword'])) {
                    echo ('<div class="btn">'); 
                    echo('<input type="submit" value="Изменить пароль" name="changePassword">');
                    echo ('</div>');
                }
                else{
                    $changePas = true;
                }

                if ($changePas){
                    echo ('<div class="info">');
                    echo('<label>Старый пароль:</label>');
                    echo('<input type="password" name="password"><br>');
                    echo ('</div>');
                    echo ('<div class="info">');
                    echo('<label>Новый пароль:</label>');
                    echo('<input type="password" name="password_new"><br><br>');
                    echo ('</div>');
                }        
                ?>
                <div class="info">
                    <label>Имя:</label>
                    <input type="text" name="name" value="<?php echo($name);?>"><br>
                </div>
                <div class="info">
                    <label>Фамилия:</label>
                    <input type="text" name="surname" value="<?php echo($surname);?>"><br>
                </div>
                <div class="info">
                    <label>Дата рождения:</label>
                    <input type="text" name="birthday" value="<?php echo($birthday);?>"><br>
                </div>
                <div class="info">
                    <label>Город:</label>
                    <input type="text" name="city" value="<?php echo($city);?>"><br>
                </div>

                <?php 
                $errorMessage = implode("<br>", $errors->getErrors());
                if (isset($_POST['submit'])) {
                    if ($errors->hasErrors()) {
                        echo ('<div class="errors">');
                        echo ('<div class="line"></div>');
                        echo ($errorMessage);
                        echo ("</div>");
                    } else {
                        echo ('<div class="succes">');
                        echo ("Данные успешно сохранены!");
                        echo ('</div>');
                    }
                }
                ?>
                <div class="btn">
                    <input type="submit" value="Сохранить" name="submit">
                    <input type="submit" value="Вернуться" name="back">   
                </div>
            </form>
        </div>
    </div>
</body>
</html>