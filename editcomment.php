<?php
    require 'db.php';
    $err = "";
    if(isset($_POST['send'])) {
        if(trim($_POST['message']) == ""){
            $err = "Сообщение не может быть пустым!";
        }
        else {
            $comments = R::load('comments', $_GET['param']);
            $comments->message = $_POST['message'];
            $comments->date = date('Y-m-d H:i:s');
            R::store($comments);
            $redirect = $comments['post'];
            header("location: comments.php?param=$redirect");
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование комментария</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <h1>Редактировать комментарий</h1>

    <?php
    $post = $_GET['param'];
    $comen = mysqli_query($con, "SELECT * FROM `comments` WHERE id='$post'");
    $kom = mysqli_fetch_assoc($comen)
    ?>

    <form method="post" class="div-form">
        <h3>Name:</h3>
        <label>
            <input type="text" name="name" placeholder="<?php echo $kom['name']?>" style="height: 30px; font-weight: bold" disabled>
        </label>
        <h3>Email:</h3>
        <label>
            <input type="text" name="email" placeholder="<?php echo $kom['email']?>" style="height: 30px; font-weight: bold" disabled>
        </label>
        <h3>Message:</h3>
        <label>
            <textarea name="message" placeholder="Message" style="height: 150px"><?php echo $kom['message']?></textarea>
        </label>
        <div style="width: 90%; padding-left: 5%; padding-right: 5%;; margin-top: 3%; margin-bottom: 3%">
            <button class="send-button" type="submit" name="send">Измеинть</button>
        </div>
        <?= '<div style="color: red; text-align: center">'.$err.'</div>' ?>
    </form>
    <?php require "footer.php"?>
</body>
</html>