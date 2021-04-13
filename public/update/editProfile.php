<?php
    include_once '../../resources/util.inc.php';
    include_once '../../resources/database.inc.php';
    session_start();

    $user;

    if(isset($_SESSION['userID'])){
        $util = new Util();
        $conn = new DBconn();

        $user = $util -> getSingleUser($conn, $_SESSION['userID']);


        if(isset($_POST['submit'])){
            $conn->Update('UPDATE users SET 
                    userName = :userName, 
                    userProfilePic = :userProfilePic, 
                    userEmail = :userEmail,
                    userContactNum = :userContactNum 
                    WHERE userID = :userID;',[
                'userName' => $_POST['name'],
                'userProfilePic'=>$_POST['profilePic'],
                'userEmail'=>$_POST['email'],
                'userContactNum' => $_POST['contactNum'],
                'userID' => $_SESSION['userID']
            ]);
            $util->redirect('../profile.php?uid='.$_SESSION['userID']);
        }
    }


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/css/editProfile.css">
    <link rel="stylesheet" href="../styles/css/header.css">
    <title>Edit Profile</title>
</head>
<body>
    <?php include_once '../../resources/templates/header.php';?>
    <form action="editProfile.php" method="POST">
        <h1>Edit Profile</h1>
        <label for="profilePic">Profile Picture (Link)</label>
        <input required value="<?php print $user[0]['userProfilePic']; ?>" autocomplete="off" name="profilePic" type="text">
        <label for="name">Full name</label>
        <input required value="<?php print $user[0]['userName']; ?>" autocomplete="off" name="name" type="text">
        <label for="email">E-mail</label>
        <input required value="<?php print $user[0]['userEmail']; ?>" autocomplete="off" name="email" type="email">
        <label for="contactnum">Contact Number</label>
        <input required value="<?php print $user[0]['userContactNum']; ?>" autocomplete="off" name="contactNum" type="text">
        <button type="submit" name="submit" value="submit">Submit</button>
    </form> 
    <script src="../js/header.js"></script>
</body>
</html>