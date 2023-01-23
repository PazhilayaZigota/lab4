<?php
require_once('./utils/ErrorCollection.php');

$errors = new ErrorCollection();

$login = '';
$psswd = '';
$c_psswd = '';
$f_name = '';
$s_name = '';
$father = '';
$birthday = '';
$city = '';

$xmlFile = simplexml_load_file("./data/data.xml");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["login"])) {
        $errors->addError("Введите логин");
    } else {
        $login = $_POST["login"];
    }

    if (empty($_POST["password"])) {
        $errors->addError("Введите пароль");
    } else {
        $psswd = $_POST["password"];
    }

    if (empty($_POST["confirm-password"])) {
        $errors->addError("Нужно подтвержить пароль");
    } else {
        $c_psswd = $_POST["confirm-password"];
    }

    if (empty($_POST["first-name"])) {
        $errors->addError("Нужно написать имя пользователя");
    } else {
        $f_name = $_POST["first-name"];
    }

    if (empty($_POST["second-name"])) {
        $errors->addError("Нужно написать фамилию");
    } else {
        $s_name = $_POST["second-name"];
    }

    $father = $_POST["fathers-name"];

    if (empty($_POST["birthday"])) {
        $errors->addError("Нужно написать дату рождения");
    } else {
        $birthday = $_POST["birthday"];
    }

    if (empty($_POST["hometown"])) {
        $errors->addError("Нужно написать место жительства");
    } else {
        $hometown = $_POST["hometown"];
    }


    if (strcmp($psswd, $c_psswd) !== 0) {
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
        $user->addChild("password", $psswd);
        $user->addChild("firstname", $f_name);
        $user->addChild("secondname", $s_name);
        $user->addChild("father", $father);
        $user->addChild("birthday", $birthday);
        $user->addChild("hometown", $hometown);

        $xmlFile->asXML("./data/data.xml");



        $indexUrl = "http://localhost/web/index.php?id=$newId";
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
    <link rel="stylesheet" href="./styles/create.css">
    <title>Регистрация</title>
</head>
<body>  
    <div class="flex container">
        <form class="flex block" method="POST" action="">
            <div class="top">Регистрация</div>
            <label>Логин:</label>
            <input class="login" type="text" name="login">  
            <label>Пароль:</label>
            <input class="psswd" type="password" name="password">
            <label>Подтверждение пароля:</label>
            <input class="psswd" type="password" name="confirm-password">
            <label>Имя</label>
            <input class="first-name" type="text" name="first-name">
            <label>Фамилия</label>
            <input class="second-name" type="text" name="second-name">  
            <label>Отчество</label>
            <input class="fathers-name" type="text" name="fathers-name">  
            <label>Дата рождения</label>
            <input class="birthday" type="date" name="birthday">  
            <label>Родной город</label>
            <input class="hometown" type="text" name="hometown"> 
            <div class="errors">
                    <?php
                        
                        if ($errors->hasErrors()) {
                            
                            echo ("<div class=line></div>");
                            echo ($errorMessage);
                            echo ("<div class=line></div>");
                        } 
                    
                    ?>
                </div>  
            <input class="submit_input" type="submit" value="Зарегистрироваться" name='registr'>
            <label class="question">Уже есть аккаунт?</label>
            <a class="reg" href="list.php">Войти</a>
        </form>
    </div>
</body>
</html>