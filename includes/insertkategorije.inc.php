<?php

if (isset($_POST["submit"])) {

    $kategorije = $_POST["kategorije"];    

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputCategory($kategorije) !== false) {
        header("location: ../index.php?error=emtyinput");
        exit();
    }
    if (categoryExists($conn, $kategorije) !== false) {
        header("location: ../index.php?error=kategorijapostoji");
        exit();
    }

    addCategory($conn, $kategorije);
}
else{
    header("location: ../index.php");
    exit();
}