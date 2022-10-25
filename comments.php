<?php
    require 'db.php';
    $err = "";
    if(isset($_POST['send'])) {
        if(trim($_POST['name']) == "" || trim($_POST['email']) == "" || trim($_POST['message']) == ""){
            $err = "Заполните все поля!";
        }
        else {
            $comments = R::dispense('comments');
            $comments->name = $_POST['name'];
            $comments->email = $_POST['email'];
            $comments->message = $_POST['message'];
            $comments->date = date('Y-m-d H:i:s');
            $comments->post = $_GET['param'];
            R::store($comments);
            $redirect = $_GET['param'];
            header("location: comments.php?param=`$redirect`");
        }
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Комментарии</title>
    <link rel="stylesheet" href="/css/styles.css">
    <meta charset="utf-8">
</head>

<body>
    <h1>Добавить комментарий</h1>
    <input type="button" value="Назад к статьям" class="main-input" onclick="location='/back-akadem/articles.php'">

    <form method="post" class="div-form">
        <h3>Name:</h3>
        <label>
            <input type="text" name="name" placeholder="Name" style="height: 30px">
        </label>
        <h3>Email:</h3>
        <label>
            <input type="text" name="email" placeholder="Email" style="height: 30px">
        </label>
        <h3>Message:</h3>
        <label>
            <textarea name="message" placeholder="Message" style="height: 150px"></textarea>
        </label>
        <div style="width: 90%; padding-left: 5%; padding-right: 5%;; margin-top: 3%; margin-bottom: 3%">
            <button class="send-button" type="submit" name="send">Отправить</button>
        </div>
        <?= '<div style="color: red; text-align: center">'.$err.'</div>' ?>
    </form>

    <h1>Комментарии к статье</h1>

    <?php
    $post = $_GET['param'];
    $comen = mysqli_query($con, "SELECT * FROM `comments` WHERE post='$post' ORDER BY `id`")
    ?>
    <?php while ($kom = mysqli_fetch_assoc($comen)) { ?>
        <div class="div-comment">
            <img src="https://avatars.mds.yandex.net/i?id=bcea6555058b008f4f3cee8f9c44cf6a-5334041-images-thumbs&n=13" alt=".">
            <div class="comment-data">
                <h2><?= $kom['name'] ?></h2>
                <h4><?= $kom['email'] ?></h4>
                <p><?= $kom['message'] ?></p>
                <h4><?= $kom['date'] ?></h4>
                <input class="send-button" name="to-comments" type="button" onclick="location='/back-akadem/editcomment.php?param=<?php echo $kom['id']?>'" value="Редактировать">
            </div>
        </div>
    <?php } ?>

    <?php require "footer.php"?>


</body>
</html>