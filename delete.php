<?php
if (isset($_POST['list'])) {
    $id = $_GET['id'];
    $adress = "http://localhost/web/list.php";
    header("Location: $adress");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/delete.css">
    <title>Удалить аккаунт</title>
</head>
<body>  
    <div class="flex container">
        <form class="flex block" method="POST">
            <div class="top">Удаление</div>
            <?php
                if (isset($_POST['delete'])){
                    $xmlFile = simplexml_load_file("../web/data/data.xml");
                    $id = $_GET['id'];

                    foreach($xmlFile as $user){
                        
                        if ($user->id == $id){
                            $dom = dom_import_simplexml($user);
                            $dom->parentNode->removeChild($dom);

                            $xmlFile->asXML("../web/data/data.xml");
                            echo ("<div class='question success'>Страница успешно удалена!</div>");
                            break;     
                        }
                    }
                }
                elseif (isset($_POST['back'])){
                    $id = $_GET['id'];
                    $adress = "http://localhost/web/index.php?id=$id";
                    header("Location: $adress");
                }
                else{
                    echo ("<div class='question'>Вы уверены, что хотите удалить страницу?</div>");
                }
            ?>
            <div class="flex btn">
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
</body>
</html>