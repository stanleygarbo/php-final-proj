<?php
    include_once '../../resources/util.inc.php';
    include_once '../../resources/database.inc.php';
    session_start();
    $util = new Util();

    if(isset($_GET['id'])){
        $postID = $_GET['id'];
        $conn = new DBconn();
        
        $conn->Remove('DELETE FROM jobs WHERE jobID = :jobID;',[
            'jobID' => $postID
        ]);
        
        $util->redirect('../profile.php?uid='.$_SESSION['userID']);
    }
    else{
        $util->redirect('./404.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Post Deleted sucessfully
</body>
</html>