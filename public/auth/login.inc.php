<?php

    include_once '../../resources/util.inc.php';
    include_once '../../resources/database.inc.php';

    if(isset($_POST['submitBtn'])){
        $conn = new DBconn();

        $inputData = [
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];

        $util = new Util();

        if($util->thereIsAnEmptyInput( $inputData )){
            $util->redirect('../login.php?emptyinput=true');
            exit();
        }

        if($util->verifyUser($conn,$inputData['email'],$inputData['password'])){
            $util->redirect('../publish.php');
            exit();
        }
        else{
            $util->redirect('../account.php?invalidlogin=true');
            exit();
        }
    }