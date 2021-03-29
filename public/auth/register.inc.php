<?php

    include_once '../../resources/util.inc.php';
    include_once '../../resources/database.inc.php';

    if(isset($_POST['submitBtn'])){

        $conn = new DBconn();

        $inputData = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'passwordConfirm' => $_POST['passwordConfirm']
        ];

        $util = new Util();

        if($util->thereIsAnEmptyInput( $inputData )):
            $util->redirect('../account.php?register=true&emptyinput=true');
            exit();
        endif;
        
        if($util->passwordsDoNotMatch($inputData['password'],$inputData['passwordConfirm'])):
            $util->redirect('../account.php?register=true&passwordsdontmatch=true');
            exit();
        endif;

        if($util->emailAlreadyExists($conn,$inputData['email'])):
            $util->redirect('../account.php?register=true&emailexists=true');
            exit();
        endif;

        $randomGeneratedString = $util->generateUID();
        $hashedPassword = password_hash($inputData['password'], PASSWORD_DEFAULT);

        $conn->Insert("INSERT INTO `users`( `userID` , `userName`, `userEmail`, `userPassword` ) values ( :userID, :userName , :userEmail, :userPassword );", [
            'userID' => $randomGeneratedString,
            'userName' => $inputData['name'],
            'userEmail' => $inputData['email'],
            'userPassword' => $hashedPassword
        ]);

        session_start();
        $_SESSION['userID'] = $randomGeneratedString;
        $_SESSION['userName'] = $inputData['name'];

        $util->redirect('../public/publish.php');

    }
