<?php 
require('db.php');

// print_r($_SESSION);

if(empty($_SESSION['user'])){
    echo("
    <script>alert('Вы не авторизовались!');location.href='index.php'</script>
    ");
}



if(isset($_GET['logout'])){
    unset($_SESSION['user']);
    echo('<script>alert("Вы успешно вышли!"); location.href = "index.php"</script>');
}

$userid = $_SESSION['user']['id'];


if(!empty($_POST)){
    if($_POST['changeprofile']){
        if($_POST['fname']!=$_SESSION['user']['fam']){
            $db->query("UPDATE `users` SET `fam` = '$_POST[fname] ' WHERE `users`.`id` = '$userid';");
            $_SESSION['user']['fam'] = $_POST['fname'];
        }
        if($_POST['name']!=$_SESSION['user']['name']){
            $db->query("UPDATE `users` SET `name` = '$_POST[name] ' WHERE `users`.`id` = '$userid';");
            $_SESSION['user']['name'] = $_POST['name'];
        }
        if($_POST['sname']!=$_SESSION['user']['sname']){
            $db->query("UPDATE `users` SET `sname` = '$_POST[sname] ' WHERE `users`.`id` = '$userid';");
            $_SESSION['user']['sname'] = $_POST['sname'];
        }
        if($_POST['tel']!=$_SESSION['user']['tel']){
            $db->query("UPDATE `users` SET `tel` = '$_POST[tel] ' WHERE `users`.`id` = '$userid';");
            $_SESSION['user']['tel'] = $_POST['tel'];
        }
        if($_POST['email']!=$_SESSION['user']['email']){
            $db->query("UPDATE `users` SET `email` = '$_POST[email] ' WHERE `users`.`id` = '$userid';");
            $_SESSION['user']['email'] = $_POST['email'];
        }
        if($_POST['img']!=$_SESSION['user']['img']){
            $db->query("UPDATE `users` SET `img` = '$_POST[img] ' WHERE `users`.`id` = '$userid';");
            $_SESSION['user']['img'] = $_POST['img'];
        }

        echo('<script>alert("Вы успешно сменили данные!"); location.href = "kabinet.php"</script>');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="js/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
    <title>Лотос Главная</title>
</head>
<body>
    <!-- ___________________________________________________________________________ -->
    <div class="darkness">
        <div class="log_in">
            <form method='post'>
                <input type="hidden" name="login" value='1'>
                <img src="image/Exit.png" alt="Exit" class="Exit">
                <p class="title">Почта</p>
                <input require type="email" name='email' placeholder="Почта" class="accent yellow">
                <p class="title">Пароль</p>
                <input require type="password" name='password' placeholder="Пароль" class="accent yellow"><br>
                <input type="submit" value="Войти" class='green title'>
                <!-- <input type="button" value="Войти" onclick="changeButttons()" class="green title"> -->
                <p class="forgoten" id="Forgote">Забыл пароль</p>
            </form>

        </div>

        <div class="register">
            <form method='post'>
                <input type="hidden" name="regin" value='1'>
                <img src="image/Exit.png" alt="Exit" class="Exit">
                <div class="stroke">
                    <div class="litlestroke">
                        <p class="title">Имя</p>
                        <input required type="text" name='name' class="accent yellow" placeholder="Имя">
                    </div>
                    <div class="litlestroke">
                        <p class="title">Фамилия</p>
                        <input required type="text" name='Fname' class="accent yellow" placeholder="Фамилия">
                    </div>
                </div>
                <div class="stroke">
                    <div class="litlestroke">
                        <p class="title">Почта</p>
                        <input required type="email" name='email' class="accent yellow" placeholder="Почта">
                    </div>
                    <div class="litlestroke">
                        <p class="title">Телефон</p>
                        <input required type="tel" name='tel' class="accent yellow" id="phone" placeholder="+7 (999) 999-99-99">
                    </div>
                </div>
                <div class='stroke'>
                    <div class="litlestroke">
                        <p class="title">Пароль</p>
                        <input minlength='4' required type="password" name='password' class="accent yellow" placeholder="Пароль">
                    </div>
                    <div class="litlestroke">
                        <p class="title">Дата рождения</p>
                        <input required type="date" name='date' class="accent yellow">
                    </div>
                </div>

                <input type="submit" value="Зарегистрироваться" class='green title'>
                
                <!-- <input type="button" value="Зарегистрироваться" onclick="changeButttons()" class="green title"> -->
            </form>
        </div>

        <div class="forgotonn">
            <form>
                <img src="image/Exit.png" alt="Exit" class="Exit">
                <p class="title">Почта</p>
                <input type="email" class="yellow accent" placeholder="Почта"><br>
                <input type="submit" value="Восстановить" class="green title">
            </form>
        </div>

    </div>


    <header>
        <img src="image/MainLogo.png" alt="MainLogo" id="mainLogo">
        <p id="headertext">Языковая школа Японского языка Лотос</p>
        <div class="buttons">
            
            <button class="yellow" id="lern"><p class="bold">Изучать</p></button>
            <?php if(empty($_SESSION['user'])){ ?>
            <button class="pink" id="login" onclick="DarkUp(); LogingIN();"><p><img src="image/LogIn.png" alt="LogIn">Войти</p></button>
            <button class="green" id="reg" onclick="DarkUp(); registration();" id="Register"><p>Регистрация</p></button>

            <?php }else{ ?>
            <!-- <a href="?logout">Выйти</a> -->
            <button class="green" id="logout" onclick="comeout()"><p>Выйти</p></button>
            <button class="pink" id="lich" onclick="cometolight()"><p>Личный кабинет</p></button>
            <?php }?>
            
        </div>
    </header>

    <!-- ++++++++++++++++++++++++++++++++++++ -->
    <nav class="yellow">
        <a href="index.php">Главная</a>
        <div class="UpSlider"><a href="AboutOurSchool.php">О нас</a>
            <ul class="slider">
                <li><a href="AboutOurSchool.php">О нашей школе</a></li>
                <li><a href="Reviews.php">Отзывы</a></li>
                <li><a href="Contact.php">Контакты</a></li>
            </ul> 
        </div>
        <a href="Bloge.php">Блог</a>
        <a href="Kurs.php">Курсы и услуги</a>
        <a href="Test.php">Тест на проверку уровня японского</a>
        <a href="Partners.php">Партнеры</a>
    </nav>
    <!-- Главное тело сайта -->
    <!--  -->
    <!--  -->
    <main>
        <h2>Личный кабинет</h2>
        <form method="post">
        <div class="kabinItems">
            <p class="title imagetexts">Фотография</p>
            <img src="<?php print($_SESSION['user']['img']) ?>" alt="Фотография">
            <input type="text" disabled='disabled' name="img" id="" value='<?php print($_SESSION['user']['img']); ?>'>
        </div>
        
        <div class="kabinItems">
            <p class="title">Фамилия</p>
            <input type="text" disabled="disabled" name="fname" id="" value="<?php print($_SESSION['user']['fam']); ?>">
        </div>
        <div class="kabinItems">
            <p class="title">Имя</p>
            <input type="text" disabled="disabled" name="name" id="" value="<?php print($_SESSION['user']['name']); ?>">
        </div>
        <div class="kabinItems">
            <p class="title">Отчество</p>
            <input type="text" disabled="disabled" name="sname" id="" value="<?php print($_SESSION['user']['sname']); ?>">
        </div>
        <div class="kabinItems">
            <p class="title">Почта</p>
            <input type="email" disabled="disabled" name="email" id="" value="<?php print($_SESSION['user']['email']); ?>">
        </div>
        <div class="kabinItems">
            <p class="title">Телефон</p>
            <input type="tel" name='tel' disabled="disabled" class="" id="phone" value="<?php print($_SESSION['user']['tel']); ?>" placeholder="+7 (999) 999-99-99">
        </div>
        
        <p class="title">Изменить профиль</p>
            <input type="checkbox"  class='changeprofile' name="changeprofile" id="profilebutton">
        
       
        
        <input type="submit" disabled="disabled" class='submit' value="Редактировать профиль">
        </form>
        <div class="kabinItems">
            <p class="title">Пароль</p>
            <button class='changePassword' onclick="changePassword()"><p>Изменить пароль</p></button>
            <!-- <input type="password" disabled="disabled" name="pasword" id="" value="<?php print($_SESSION['user']['tel']); ?>"> -->
        </div>

        <!-- <button id="profilebutton" class="changeprofile"><p class='title imagetexts '>Редактировать профиль<img src="image/changes.png" alt=""></p> </button> -->
        <?php if($_SESSION['user']['kurse']!=''){?>
        <p class="title">Ваше расписание по курсу: <br><?php print($_SESSION['user']['kurse']); ?></p>
        <?php if($_SESSION['user']['lesson1']!=''){?>
        <p class="accent"><?php print($_SESSION['user']['lesson1']);?></p>
        <?php }?>
        <?php if($_SESSION['user']['lesson2']!=''){?>
        <p class="accent"><?php print($_SESSION['user']['lesson2']);?></p>
        <?php }?>
        <?php if($_SESSION['user']['lesson3']!=''){?>
        <p class="accent"><?php print($_SESSION['user']['lesson3']);?></p>
        <?php }?>
        <?php }else{?>
            <p class='title'>У вас не куплен курс!</p>
            <?php };?>

    </main>
    

    <nav class="yellow">
        <a href="index.php">Главная</a>
        <div class="UpSlider"><a href="AboutOurSchool.php">О нас</a>
            <ul class="slider">
                <li><a href="AboutOurSchool.php">О нашей школе</a></li>
                <li><a href="Reviews.php">Отзывы</a></li>
                <li><a href="Contact.php">Контакты</a></li>
            </ul> 
        </div>
        <a href="Bloge.php">Блог</a>
        <a href="Kurs.php">Курсы и услуги</a>
        <a href="Test.php">Тест на проверку уровня японского</a>
        <a href="Partners.php">Партнеры</a>
    </nav>

    <footer class="yellow">
        <div>
            <p class="accent">Языковая школа Японского языка Лотос</p>
            <p class="accent">Мы в социальных сетях</p>
            <div class="Sochia"><img src="image/Sochia1.png" id="VK" alt="VK"><img src="image/Sochia2.png" id="TG" alt="TG"><img src="image/Sochia3.png" id="Whatsapp" alt="WhatsApp"><img src="image/Sochia4.png" id="Disc" alt="Discord"></div>
            <p class="accent">Контакты</p><br>
            <p>+7 9XX XXX xx-xx</p><br>
            <p>+7 9XX XXX xx-xx</p>
        </div>
        <div>

            <!-- Карта от яндекса -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2241.302978590731!2d37.51383811610326!3d55.82270029406603!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b5482f44ad7a13%3A0x64d62904b7a299db!2z0JPQkdCf0J7QoyDQn9CaINC40LwuINCdLtCdLiDQk9C-0LTQvtCy0LjQutC-0LLQsC4g0J7RgtC00LXQu9C10L3QuNC1INCa0L3QuNC20L3QvtCz0L4g0JHQuNC30L3QtdGB0LA!5e0!3m2!1sru!2sru!4v1680156444316!5m2!1sru!2sru" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <p class="accent">Зои и Александра Космодемьянских ул., 19, Москва, 125130</p>

        </div>
    </footer>
    <script src="js/javascript.js"></script>
</body>
</html>