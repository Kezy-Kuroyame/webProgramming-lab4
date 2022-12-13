<?php
if (isset($_POST['list'])) {
    $id = $_GET['id'];
    $adress = "http://localhost/lab4/list.php";
    header("Location: $adress");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../lab4/assets/css/delete.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;500&display=swap" rel="stylesheet">
    <title>Social-site</title>
</head>
<body>
    <div class="content">
        <div class="block">
            <div class="header">
                Удаление страницы
            </div>
            <div class="line"></div>
            <div class="main">
                <form method="POST">
                    <?php
                    if (isset($_POST['delete'])){
                        $xmlFile = simplexml_load_file("../lab4/data/data.xml");
                        $id = $_GET['id'];

                        foreach($xmlFile as $user){
                            
                            if ($user->id == $id){
                                $dom = dom_import_simplexml($user);
                                $dom->parentNode->removeChild($dom);

                                $xmlFile->asXML("../lab4/data/data.xml");
                                echo ("<div class='question success'>Страница успешно удалена!</div>");
                                break;     
                            }
                        }
                    }
                    elseif (isset($_POST['back'])){
                        $id = $_GET['id'];
                        $adress = "http://localhost/lab4/index.php?id=$id";
                        header("Location: $adress");
                    }
                    else{
                        echo ("<div class='question'>Вы уверены, что хотите удалить страницу?</div>");
                    }
                    ?>
                    <div class="btn">
                        <?php
                        if (isset($_POST['delete'])) {
                            echo('<input type="submit" value="Войти" name="list">');
                        } else {
                            echo ('<input type="submit" value="Удалить" name="delete">');
                            echo ('<input type="submit" value="Вернуться" name="back">');
                        }
                        ?>

                
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>