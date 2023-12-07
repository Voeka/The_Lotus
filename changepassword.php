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

if(!empty($_POST)){
    if($_POST['changepassword']){
        if(hash('sha256',$_POST['password'])==$_SESSION['user']['password']){
            if($_POST['newpassword1']==$_POST['newpassword2']){
                if($_POST['password']!=$_POST['newpassword1']){
                    $newpassord = hash('sha256',$_POST['newpassword1']);
                    $userid = $_SESSION['user']['id'];
                    $query = $db->query("UPDATE `users` SET `password` = '$newpassord' WHERE `users`.`id` = '$userid';");
                        if($query){
                            $_SESSION['user']['password'] = $newpassord;
                            echo("
                            <script>alert('Пароль изменён!');window.location.href='kabinet.php';</script>
                            ");
                        }else{
                            echo "<script>alert('У вас ошибка!')</script>";
                            print_r($db->errorInfo());
                        }
                    print_r($_POST);
                }else{
                    echo("
                    <script>alert('Старый пароль совпадает с новым!');</script>
                    ");
                }
            
                
            }else{
                echo("
                <script>alert('Не правильный новый пароль и повтор пароля!');</script>
                ");
            }

        }else{
            echo("
                <script>alert('Не правильный старый пароль!');</script>
                ");
        }
        // print_r($_POST);
        
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
    
    <main>
        <h2>Изменение пароля</h2>

        <form method="post">
            <input type="hidden" name="changepassword" value=1>
        <div class="kabinItems">
            <p class="title">Старый пароль</p>
            <input type="text" minlength='4' required  name="password" id="" value="">
        </div>
        <div class="kabinItems">
            <p class="title">Новый пароль</p>
            <input type="text" minlength='4' required  name="newpassword1" id="" value="">
        </div>
        <div class="kabinItems">
            <p class="title">Повторите пароль</p>
            <input type="text" minlength='4' required  name="newpassword2" id="" value="">
        </div>
        <input type="submit" class='submit' value="Изменить пароль">
        </form>
        

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