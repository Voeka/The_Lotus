<?php
require('db.php');
// print_r($_POST);
// print_r($_SESSION);


if(isset($_GET['logout'])){
    unset($_SESSION['user']);
    echo('<script>alert("Вы успешно вышли!"); location.href = "index.php"</script>');
}

if(isset($_POST)){
    if(!empty($_POST['login'])){
        $mail =$_POST['email'];
        $password = hash("sha256", $_POST['password']);
        $query = $db->query("SELECT * from users where email='$mail' and password='$password'");
        
        if($query){
            $res = $query->fetchAll();
            if(!empty($res)){
                $_SESSION['user']=$res[0];
                echo('<script>alert(`Вы успешно вошли!`);window.location.href = `index.php`;</script>');
            }else{
                echo "<script>alert('Неверный логин или пароль!');</script>";
            }
        }else{
            print_r($db->errorInfo());
        }
    }

    if(!empty($_POST['regin'])){
        $name = $_POST['name'];
        $Fname = $_POST['Fname'];
        $mail = $_POST['email'];
        $tel = $_POST['tel'];
        $password = hash('sha256',$_POST['password']);
        $date = $_POST['date'];
        
        $query = $db->query("INSERT INTO `users` 
        (`id`, `login`, `password`, `role`, `email`, `fam`, `name`, `sname`, `tel`, `dabirh`, `img`) VALUES 
        (NULL, '$mail', '$password', 'user', '$mail', '$Fname', '$name', '', '$tel', '$date', '')");

        if($query){
            echo("
            <script>alert('Аккаунт создан! Можно авторизоваться!');location.href = 'index.php'</script>
            ");
        }else{
            echo "<script>alert('У вас ошибка!')</script>";
            print_r($db->errorInfo());
        }

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
        <div class="testone">
            <h2>Тест на проверку уровня японского языка</h2>
            <button class="green butttton">Начать</button>
        </div>
        <div class="testotwo">
            <p class="title">1 из 5</p>
            <p class="title bold">Сколько алфавитов в японском языке?</p>
            
            <form name="q1">
                <label>Один <input type="radio" name="two" id="No"></label><br>
                <label>Два <input type="radio" name="two" id="No"></label><br>
                <label>Три <input type="radio" name="two" value="Yes" id="Yes"></label><br>
                <label>Четыре <input type="radio" name="two" id="No"></label><br>
                <input type="button" class="nexttwo green" value="Далее">
            </form>
        </div>
        <div class="testothreo">
            <p class="title">2 из 5</p>
            <p class="title bold">Сколько гласных в японском языке?</p>
            
            <form name="q2">
                <label>Три <input type="radio" name="three" id="No"></label><br>
                <label>Четыре <input type="radio" name="three" id="No"></label><br>
                <label>Пять <input type="radio" name="three" value="Yes" id="Yes"></label><br>
                <label>Шесть <input type="radio" name="three" id="No"></label><br>
                <input type="button" class="nextthree green" value="Далее">
            </form>
        </div>

        <div class="testofour">
            <p class="title">3 из 5</p>
            <p class="title bold">Сколько иероглифов в японском языке?</p>
            
            <form name="q3">
                <label>Пять тысяч <input type="radio" name="four" id="No"></label><br>
                <label>Две тысячи <input type="radio" name="four" id="No"></label><br>
                <label>Три тысячи <input type="radio" value="Yes" name="four" id="Yes"></label><br>
                <label>Одна тысяча <input type="radio" name="four" id="No"></label><br>
                <input type="button" class="nextfour green" value="Далее">
            </form>
        </div>
        <div class="testofive">
            <p class="title">4 из 5</p>
            <p class="title bold">Сколько согласных в японском языке?</p>
            
            <form name="q4">
                <label>Десять <input type="radio" name="five" id="No"></label><br>
                <label>Двенадцать <input type="radio" name="five" id="No"></label><br>
                <label>Четырнадцать <input type="radio" value="Yes" name="five" id="Yes"></label><br>
                <label>Шестьнадцать <input type="radio" name="five" id="No"></label><br>
                <input type="button" class="nextfive green" value="Далее">
            </form>
        </div>
        <div class="testosix">
            <p class="title">5 из 5</p>
            <p class="title bold">Сколько иероглифов в хирагане?</p>
            
            <form name="q5">
                <label>Сорок <input type="radio" name="six" value="" id="No"></label><br>
                <label>Сорок пять <input type="radio" name="six" value="" id="No"></label><br>
                <label>Сорок гесть <input type="radio" name="six" value="Yes" id="Yes"></label><br>
                <label>Пятьдесят <input type="radio" name="six" value="" id="No"></label><br>
                <input type="button" class="nextsix green" value="Проверить">
            </form>
        </div>
        <div class="testogg">
            <p class="title">Результат</p>
            <span class="SPANaa">

            </span>
            <script>
                $('.nextsix').click(function(){
                    console.log('aaa');
                    var a = 0;
                    if(q5.six.value=='Yes'){
                        a+=1;
                        console.log('bbb');
                    }
                    if(q4.five.value=='Yes'){
                        a+=1;
                        console.log('bbb');
                    }
                    if(q3.four.value=='Yes'){
                        a+=1;
                        console.log('bbb');
                    }
                    if(q2.three.value=='Yes'){
                        a+=1;
                        console.log('bbb');
                    }
                    if(q1.two.value=='Yes'){
                        a+=1;
                        console.log('bbb');
                    }
                    console.log(a);

                    $('.SPANaa').append('<p class="accent">'+a+' правильных из 5.'+'</p>')
                    if(a==2||a==1){
                        $('.SPANaa').append('<p class="accent">У вас знания в японском языке есть, но их мало</p>')
                    }
                    if(a==3){
                        $('.SPANaa').append('<p class="accent">У вас есть знания в японском языке на среднем уровне </p>')
                    }
                    if(a==0){
                        $('.SPANaa').append('<p class="accent">У вас нет знаний в японском языке</p>')
                    }
                    if(a>=4){
                        $('.SPANaa').append('<p class="accent">У вас хорошие знания в японском языке </p>')
                    }
                })
                
            </script>
            
            <button id="restart">Заново</button>
        </div>
        

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