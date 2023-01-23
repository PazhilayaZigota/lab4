<?php 
$xmlFile = simplexml_load_file("./data/data.xml");
$xmlFile->formatOutput = true;

$id = $_GET['id'];
foreach($xmlFile as $user){
    if ($id == $user->id){
        $f_name = $user->firstname;
        $s_name = $user->secondname;
        $father = $user->father;
        $birthday = $user->birthday;
        $hometown = $user->hometown;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index/import.css">
    <title>Ваша страница</title>
</head>
<body>
    <section class="header">
        <nav class="flex container header_nav">
            <div>logo</div>
            <div class="dropdown">
                <button class="dropbtn">Параметры</button>
                <div class="dropdown-content">
                    <a href="list.php">Выйти</a>
                    <a href="update.php?id=<?php echo($id) ?>">Редактировать</a>
                    <a href="delete.php?id=<?php echo($id) ?>">Удалить страницу</a>
                </div>
            </div>
        </nav>
    </section>
    <section class="main">
        <nav class="flex container main_nav">
            <div class="flex main_menu">
                <a href="#">Профиль</a>
                <a href="#">Друзья</a>
                <a href="#">Фотографии</a>
                <a href="#">Видеозаписи</a>
                <a href="#">Аудиозаписи</a>
                <a href="#">Сообщения</a>
                <a href="#">Сообщества</a>
                <a href="#">Новости</a>
            </div>
            <div class="flex column_addition">
                <div class="flex main_header">
                    <div class="name"><?php echo($f_name);?> <?php echo($s_name); ?> <?php echo($father); ?></div>
                    <div class="online-status">Онлайн</div>
                </div>
                <div class="flex">
                    <div class="flex main_column-1">
                        <img class="ava" src="./img/Гигачад.jpg">
                        <div class="flex under_ava">
                            <button class="col-6">Написать сообщение</button>
                            <button class="col-6">Добавить в друзья</button>
                        </div>
                        <p class="center">20 млн. подписчиков</p>
                        <button class="center news">Новости</button>
                        <p class="friends">Друзья</p>
                        <div class="flex friends_ava">
                            <a href="#"><img src="./img/осел.jpg"></a>
                            <a href="#"><img src="./img/осел.jpg"></a>
                            <a href="#"><img src="./img/осел.jpg"></a>
                            <a href="#"><img src="./img/осел.jpg"></a>
                        </div>
                        <div class="flex friends_ava">
                            <a href="#"><img src="./img/осел.jpg"></a>
                            <a href="#"><img src="./img/осел.jpg"></a>
                            <a href="#"><img src="./img/осел.jpg"></a>
                            <a href="#"><img src="./img/осел.jpg"></a>
                        </div>
                        <p class="friends">Друзья онлайн</p>
                        <div class="flex friends_ava">
                            <a href="#"><img src="./img/осел.jpg"></a>
                            <a href="#"><img src="./img/осел.jpg"></a>
                            <a href="#"><img src="./img/осел.jpg"></a>
                            <a href="#"><img src="./img/осел.jpg"></a>
                        </div>
                        <div class="flex friends_ava">
                            <a href="#"><img src="./img/осел.jpg"></a>
                            <a href="#"><img src="./img/осел.jpg"></a>
                            <a href="#"><img src="./img/осел.jpg"></a>
                            <a href="#"><img src="./img/осел.jpg"></a>
                        </div>
                    </div>
                    <div class="flex main_column-2">
                        <div class="flex center status">Статус</div>
                        <div class="flex info center">
                            <div>Город: <?php echo($hometown); ?></div>
                            <div>День рождения: <?php echo($birthday); ?></div>
                            <div class="flex extra_info_cont">
                                <button class="extra_info">Показать подробную информацию</button>
                            </div>
                        </div>
                        <div class="flex center foto_tittle">Фотографии</div>
                        <div class="fotos flex center">
                            <img src="./img/Гигачад1.jpg">
                            <img src="./img/Гигачад2.jpg">
                            <img src="./img/Гигачад3.jpg">
                        </div>
                        <div class="flex center blog_tittle">
                            <div>2 записи</div>
                            <input class="blog_search">
                        </div>
                        <div class="flex center blog">
                            <div class="flex note">
                                <img class="mini_ava" src="./img/Гигачад.jpg">
                                <div class="flex blog_addition">
                                    <div class="blog_name"><?php echo($f_name); ?> <?php echo($s_name); ?></div>
                                    <div class="blog_text">Эх, Шарик, я как и ты был на цепи...</div>
                                </div>
                            </div>
                            <div class="flex note">
                                <img class="mini_ava" src="./img/Гигачад.jpg">
                                <div class="flex blog_addition">
                                    <div class="blog_name"><?php echo($f_name); ?> <?php echo($s_name); ?></div>
                                    <div class="blog_text">Раньше я тоже был большой, я ненавидил себя, боялся женщин и вообще не хотел жить. А теперь посмотрите на меня, а всего то нужно было пойти в зал и полюбить мужчин.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </section>
</body>
</html>