<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/article.css">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Document</title>
</head>
<body>

    <div class="page">
        <h1 style="text-align: center">Статьи</h1>

        <div class="articles">
            <?php
            for($i = 0; $i < 3; $i++):
                ?>
                <div class="article">
                    <img src="https://avatars.mds.yandex.net/i?id=9d9e2fa8c7fb9fdde453513a48801339-4893408-images-thumbs&n=13" alt="">
                    <h1>Статья <?php echo $i+1?></h1>
                    <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн.</p>
                    <input name="to-comments" type="button" onclick="location='/back-akadem/comments.php?param=<?php echo $i?>'" value="Просмотреть комментарии">
                </div>
            <?php endfor; ?>
        </div>
        <?php require "footer.php"?>
    </div>

</body>
</html>
