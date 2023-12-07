<?php 
require('db.php');

if($_SESSION['user']['role']!='admin'){
    echo("
    <script>alert('Вам сюда нельзя!');location.href='index.php'</script>
    ");
}

$news = $db->query("SELECT * FROM `news`")->fetchAll();

if(isset($_POST)){
    if((!empty($_POST['newnews']))or(!empty($_POST['news']))){
        $id = $_POST['id'];
        $name=$_POST['name'];
        $text=$_POST['text'];
        $img = $_POST['img'];
        $adress=$_POST['adress'];
        $date = $_POST['date'];

        if($_POST['news']=='1'){
            $query = $db->query("UPDATE `news` SET `name` = '$name', `text` = '$text', `img` = '$img', `adress` = '$adress' WHERE `news`.`id` = '$id'");
            if($query){
                echo("<script>alert('ВЫ изменили новость!!'); location.href = 'admin.php'</script>");
            }else{
                echo("<script>alert('Ошибка7!');</script>");
                print_r($db->errorInfo());
            }
        }
        if($_POST['newnews']=='1'){
            $query = $db->query("INSERT INTO `news` (`id`, `name`, `text`, `img`, `adress`, `date`) VALUES (NULL, '$name', '$text', '$img', '$adress', '$date')");
            if($query){
                echo("<script>alert('ВЫ добавили новость!'); location.href = 'admin.php'</script>");
            }else{
                echo("<script>alert('Ошибка9!');</script>");
                print_r($db->errorInfo());
            }
        }else{
            echo("<script>alert('Ошибка10!');</script>");
        }

    }

}

$parthers = $db->query("SELECT * FROM `parthers`")->fetchAll();

// part

if(isset($_POST)){
    if((!empty($_POST['part']))or(!empty($_POST['newpart']))){
        $id = $_POST['id'];
        $name=$_POST['name'];
        $description=$_POST['description'];
        $img = $_POST['img'];
        

        if($_POST['part']=='1'){
            $query = $db->query("UPDATE `parthers` SET `name` = '$name', `description` = '$description', `img` = '$img' WHERE `parthers`.`id` = $id");
            if($query){
                echo("<script>alert('ВЫ изменили партнера!!'); location.href = 'admin.php'</script>");
            }else{
                echo("<script>alert('Ошибка71!');</script>");
                print_r($db->errorInfo());
            }
        }
        if($_POST['newpart']=='1'){
            $query = $db->query("INSERT INTO `parthers` (`id`, `name`, `description`, `img`) VALUES (NULL, '$name', '$description', '$img')");
            if($query){
                echo("<script>alert('ВЫ добавили партнера!'); location.href = 'admin.php'</script>");
            }else{
                echo("<script>alert('Ошибка91!');</script>");
                print_r($db->errorInfo());
            }
        }

    }

}



$feedback = $db->query("SELECT * FROM `feedback`")->fetchAll();



if(isset($_POST)){
    if(!empty($_POST['feedback'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $tel = $_POST['tel'];
        $called = $_POST['called'];

        if($_POST['change']=='1'){
            $query = $db->query("UPDATE `feedback` SET `name` = '$name', `tel` = '$tel',`called` = '$called'  WHERE `feedback`.`id` = '$id'");
            if($query){
                echo("<script>alert('Данные изменены!');location.href='admin.php';</script>");
            }else{
                echo("<script>alert('Ошибка4!');</script>");
                print_r($db->errorInfo());
            }
        }
    }
}

$kurses = $db->query("SELECT * FROM `kurses`")->fetchAll();

if(isset($_POST)){
    if(!empty($_POST['kurse'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $nweek = $_POST['n-week'];
        $daysweek = $_POST['daysweek'];
        $price = $_POST['price'];
        $active = $_POST['active'];

        if($_POST['change']=='1'){
            $query = $db->query("UPDATE `kurses` SET `name` = '$name', `n-week` = '$nweek',`daysweek` = '$daysweek', `price` = '$price', `active` = '$active'  WHERE `kurses`.`id` = '$id'");
            if($query){
                echo("<script>alert('Данные изменены!');location.href='admin.php';</script>");
            }else{
                echo("<script>alert('Ошибка3!');</script>");
                print_r($db->errorInfo());
            }
        }
    }

    if(!empty($_POST['createkurse'])){
        $name = $_POST['name'];
        $nweek = $_POST['n-week'];
        $daysweek = $_POST['daysweek'];
        $price = $_POST['price'];
        $active = $_POST['active'];

        if($_POST['create']==1){
            $query = $db->query("INSERT INTO `kurses` (`id`, `name`, `n-week`, `daysweek`, `price`, `active`) VALUES (NULL, '$name', '$nweek', '$daysweek', '$price', '$active')");

            if($query){
                echo("<script>alert('Курс добавлен!');location.href='admin.php';</script>");
            }else{
                echo("<script>alert('Ошибка6!');</script>");
                print_r($db->errorInfo());
            }
        }
    }
}

$reviews = $db->query("SELECT * FROM `reviews`")->fetchAll();

if(isset($_POST)){
    if(!empty($_POST['reviews'])){
        $id = $_POST['id'];
        $iduser = $_POST['iduser'];
        $name = $_POST['name'];
        $review = $_POST['review'];

        if($_POST['change']=='1'){
            $query = $db->query("UPDATE `reviews` SET `name` = '$name', `iduser` = '$iduser',`reviews` = '$review'  WHERE `reviews`.`id` = '$id'");
            if($query){
                echo("<script>alert('Данные изменены!');location.href='admin.php';</script>");
            }else{
                echo("<script>alert('Ошибка2!');</script>");
                print_r($db->errorInfo());
            }
        }
    }
}

$teachers = $db->query("SELECT * FROM `teachers`")->fetchAll();

if(isset($_POST)){
    if((!empty($_POST['teacher']))or(!empty($_POST['newteacher']))){
        $id = $_POST['id'];
        $name=$_POST['name'];
        $img = $_POST['img'];
        

        if($_POST['teacher']=='1'){
            $query = $db->query("UPDATE `teachers` SET `name` = '$name', `img` = '$img' WHERE `teachers`.`id` = $id");
            if($query){
                echo("<script>alert('ВЫ изменили учителя!!'); location.href = 'admin.php'</script>");
            }else{
                echo("<script>alert('Ошибка72!');</script>");
                print_r($db->errorInfo());
            }
        }
        if($_POST['newteacher']=='1'){
            $query = $db->query("INSERT INTO `teachers` (`id`, `name`, `img`) VALUES (NULL, '$name', '$img')");
            if($query){
                echo("<script>alert('ВЫ добавили учителя!'); location.href = 'admin.php'</script>");
            }else{
                echo("<script>alert('Ошибка92!');</script>");
                print_r($db->errorInfo());
            }
        }

    }

}

// teacher
// newteacher

$users = $db->query("SELECT * FROM `users`")->fetchAll();

if(isset($_POST)){
    if(!empty($_POST['users'])){
        $id = $_POST['id'];
        $login = $_POST['login'];
        $role = $_POST['role'];
        $email = $_POST['email'];
        $fam = $_POST['fam'];
        $name = $_POST['name'];
        $sname = $_POST['sname'];
        $tel = $_POST['tel'];
        $dabirh = $_POST['dabirh'];
        $img = $_POST['img'];
        $kursea = $_POST['kursea'];
        $lesson1 = $_POST['lesson1'];
        $lesson2 = $_POST['lesson2'];
        $lesson3 = $_POST['lesson3'];

        if($_POST['change']==1){
            $query = $db->query("UPDATE `users` SET `login` = '$login', `role` = '$role', `email` = '$email', `fam` = '$fam', `name` = '$name', `sname` = '$sname', `tel` = '$tel', `dabirh` = '$dabirh', `img` = '$img', `kurse` = '$kursea', `lesson1` = '$lesson1', `lesson2` = '$lesson2', `lesson3` = '$lesson3' WHERE `users`.`id` = '$id'");

            if($query){
                echo("<script>alert('Данные изменены!');location.href='admin.php';</script>");
            }else{
                echo("<script>alert('Ошибка1!');</script>");
                print_r($db->errorInfo());
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <a href="index.php">Назад</a>
    </header>

<body>
<section class='calls'>
<h1>Секция с звонками</h1>
    <?php foreach($feedback as $feed){ ?>
        <form method="post">
            <input type="hidden" name="feedback" value='1'>
            <input type="hidden" name="id" value='<?php print($feed['id']); ?>'>
            <input type="text" name="name" value='<?php print($feed['name']); ?>'>
            <input type="tel" name="tel" value='<?php print($feed['tel']); ?>'>
            <label>Тут 1 или 0. Где 1 - уже звонили, а 0 - нет <input type="number" name="called" value='<?php print($feed['called']); ?>'></label>
            <input type="checkbox" name="change" id="" value='1'>
            <input type="submit" value="Изменить">
        </form>
        <br>
    <?php } ?>
</section>
<hr>
<section class='calls'>
    <h1>Курсы</h1>
    <?php foreach($kurses as $kurse){?>
        <form method="post">
            <input type="hidden" name="kurse" value='2'>
            <input type="hidden" name="id" value='<?php print($kurse['id']); ?>'>
            <input type="text" name="name" value='<?php print($kurse['name']); ?>'>
            <input type="number" name="n-week" value='<?php print($kurse['n-week']); ?>'>
            <input type="text" name="daysweek" value='<?php print($kurse['daysweek']); ?>'>
            <input type="text" name="price" value='<?php print($kurse['price']); ?>'>
            <label>Тут 1 или 0. Где 1 - активно, а 0 - нет <input type="number" name="active" value='<?php print($kurse['active']); ?>'></label>
            <input type="checkbox" name="change" id="" value='1'>
            <input type="submit" value="Изменить">
        </form>
    <?php }?>
    <hr>
<h1>Создать курс</h1>
    <form method="post">
        <input type="hidden" name="createkurse" value='1'>
        <input type="text" name="name" value='' placeholder='Имя курса'>
        <input type="number" name="n-week" value='' placeholder='N-раз в неделю'>
        <input type="text" name="daysweek" value='' placeholder='Дни недели'>
        <input type="text" name="price" value='' placeholder='Цена'>
        <label>Тут 1 или 0. Где 1 - активно, а 0 - нет <input type="number" name="active" value='1'></label>
        <input type="checkbox" name="create" id="" value='1'>
        <input type="submit" value="Создать">
    </form>

</section>
<hr>
<section class='calls'>
<h1>Новости</h1>
    <?php foreach($news as $new){ ?>
        <form method="post">
            <input type="hidden" name="id" value='<?php print($new['id']);?>'>
            <input type="text" name="name" value='<?php print($new['name']);?>'>
            <input type="text" name="text" value='<?php print($new['text']);?>'>
            <input type="text" name="img" value='<?php print($new['img']);?>'>
            <input type="text" name="adress" value='<?php print($new['adress']);?>'>
            <input type="date" name="date" id="" value=<?php print($new['date']);?>>
            <input type="checkbox" name="news" id="" value='1'>
            <input type="submit" value="Изменить">
        </form>
    <?php }?>

    <hr>
    <h1>Создать новость</h1>
    <form method="post">
            <input type="text" name="name" value='' placeholder='Имя новости'>
            <input type="text" name="text" value='' placeholder='Текст новости'>
            <input type="text" name="img" value='' placeholder='Картинка новости'>
            <input type="text" name="adress" value='' placeholder='Адресс новости'>
            <input type="date" name="date" id="" value=''>
            <input type="checkbox" name="newnews" id="" value='1'>
            <input type="submit" value="Создать">
        </form>
</section>
<hr>
<section class='calls'>
    <h1>Партнеры</h1>
    <?php foreach($parthers as $part){?>
        <form method="post">
            <input type="hidden" name="id" value='<?php print($part['id']);?>'>
            <input type="text" name="name" value='<?php print($part['name']);?>'>
            <input type="text" name="description" value='<?php print($part['description']);?>'>
            <input type="text" name="img" value='<?php print($part['img']);?>'>
            <input type="checkbox" name="part" id="" value='1'>
            <input type="submit" value="Изменить">
        </form>
    <?php }?>
    <hr>
    <h1>Добавить партнера</h1>
    <form method="post">
            <input type="hidden" name="id" value='' >
            <input type="text" name="name" value='' placeholder='Название'>
            <input type="text" name="description" value='' placeholder='Описание'>
            <input type="text" name="img" value='' placeholder='Картинка'>
            <input type="checkbox" name="newpart" id="" value='1'>
            <input type="submit" value="Добавить">
        </form>
</section>

<hr>
<section class='calls'>
<h1>Обзоры</h1>
        <?php foreach($reviews as $review){ ?>
            <form method="post">
                <input type="hidden" name="reviews" value='3'>
                <input type="hidden" name="id" value='<?php print($review['id']); ?>'>
                <input type="text" name="name" value='<?php print($review['name']); ?>'>
                <input type="number" name="iduser" value='<?php print($review['iduser']); ?>'>
                <input type="text" name="review" value='<?php print($review['reviews']); ?>'> 
                <input type="checkbox" name="change" id="" value='1'>
                <input type="submit" value="Изменить">
            </form>
        <?php }?>
</section>
<hr>
<section class='calls'>
    <h1>Учителя</h1>
    <?php foreach($teachers as $teacher){?>
        <form method="post">
                <input type="hidden" name="id" value='<?php print($teacher['id']); ?>'>
                <input type="text" name="name" value='<?php print($teacher['name']); ?>'> 
                <input type="text" name="img" value='<?php print($teacher['img']); ?>'> 
                <input type="checkbox" name="teacher" id="" value='1'>
                <input type="submit" value="Изменить">
            </form>
    <?php }?>
    <hr>
    <h1>Добавить учителя</h1>
    <form method="post">
            <input type="hidden" name="id" value='' >
            <input type="text" name="name" value='' placeholder='Имя'> 
            <input type="text" name="img" value='' placeholder='Картинка'> 
            <input type="checkbox" name="newteacher" id="" value='1'>
            <input type="submit" value="Изменить">
    </form>
</section>

<hr>
<section class='calls'>
<h1>Пользователи</h1>

<?php foreach($users as $user){?>
    <form method="post">
        <!-- ЮЗЕРЫ -->
        <input type="hidden" name="users" value='4'>
        <input type="hidden" name="id" value='<?php print($user['id']); ?>'>
        <input type="text" name="login" id="" value='<?php print($user['login']); ?>'>
        <input type="text" name="role" id="" value='<?php print($user['role']); ?>'>
        <input type="email" name="email" id="" value='<?php print($user['email']); ?>'>
        <input type="text" name="fam" id="" value='<?php print($user['fam']); ?>'>
        <input type="text" name="name" id="" value='<?php print($user['name']); ?>'>
        <input type="text" name="sname" id="" value='<?php print($user['sname']); ?>'>
        <input type="tel" name="tel" id="" value='<?php print($user['tel']); ?>'>
        <input type="date" name="dabirh" id="" value='<?php print($user['dabirh']); ?>'>
        <input type="text" name="img" id="" value='<?php print($user['img']); ?>'>
        <input type="text" name="kursea" id="" value='<?php print($user['kurse']); ?>'>
        <input type="text" name="lesson1" id="" value='<?php print($user['lesson1']); ?>'>
        <input type="text" name="lesson2" id="" value='<?php print($user['lesson2']); ?>'>
        <input type="text" name="lesson3" id="" value='<?php print($user['lesson3']); ?>'>
        <input type="checkbox" name="change" id="" value='1'>
        <input type="submit" value="Изменить">
        

    </form>

<?php }?>
</section>
    
</body>
</html>