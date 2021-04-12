<?php

    include_once '../../resources/util.inc.php';
    include_once '../../resources/database.inc.php';

    if(isset($_POST['submitBtn'])){

        $conn = new DBconn();

        $inputData = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'contactNum' => $_POST['contactnum'],
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

        $conn->Insert("INSERT INTO `users`( `userID` , `userName`, `userContactNum`, `userEmail`, `userPassword` ) values ( :userID, :userName, :userContactNum, :userEmail, :userPassword );", [
            'userID' => $randomGeneratedString,
            'userName' => $inputData['name'],
            'userContactNum' => $inputData['contactNum'],
            'userEmail' => $inputData['email'],
            'userPassword' => $hashedPassword
        ]);

        session_start();
        $_SESSION['userID'] = $randomGeneratedString;
        $_SESSION['userName'] = $inputData['name'];
        $_SESSION['userEmail'] = $inputData['email'];
        $_SESSION['userContactNum'] = $inputData['contactNum'];
        $_SESSION['userProfilePic'] = 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png';

        $util->redirect('../publish.php');
    }
