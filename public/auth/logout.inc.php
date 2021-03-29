<?php
    include '../../resources/util.inc.php';
    session_start();
    unset($_SESSION["userID"]);
    unset($_SESSION["userName"]);


    $util = new Util();
    $util->redirect('../publish.php');