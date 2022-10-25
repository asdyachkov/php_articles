<?php
    require 'libs/rb.php';
    R::setup('mysql:host=localhost;dbname=back_akadem', 'root', '');
    $con = mysqli_connect('localhost', 'root', '', 'back_akadem');
?>