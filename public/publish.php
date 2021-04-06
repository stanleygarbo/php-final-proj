<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/css/header.css">
    <link rel="stylesheet" href="./styles/css/publish.css">
    <title>Publish</title>
</head>
<body>
    
    <?php
        include_once '../resources/util.inc.php';
        include_once '../resources/database.inc.php';
        include_once '../resources/templates/header.php';

        $conn = new DBconn();

        $util = new Util;

        if (!isset($_SESSION['userID'])):
            header('HTTP/1.0 401 Unauthorized');
            $util -> redirect('./account.php');
        endif;

        if(isset($_GET['submit'])){
            print <<<EOF
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
            EOF;

            print $util -> sanitize($_GET['title'] . $_GET['body']);

            $conn -> Insert(
                'INSERT INTO posts (id, title, body, requirements, skills, contact, email, city) 
                VALUES (:id, :title, :body, :requirements, :skills, :contact, :email, :city);',
                [
                    'id' => '', 
                    'title' => '', 
                    'body' => '', 
                    'requirements' => '', 
                    'skills' => '', 
                    'contact' => '', 
                    'email' => '',
                    'city' => '',
                ]
            );
        }

    ?>
    
    <main>
        <form action="publish.php" method="GET" >
            <input type="text" name="title" placeholder="Title">
            <textarea placeholder="What's happening?" name="body" id="body" cols="30" rows="10"></textarea>
            <section>
                <div>
                    <input type="text" placeholder="Language 🇵🇭">
                    <input type="text" placeholder="Location/City 🌆">
                </div>
                <button name="submit" value="submit" type="submit">Share Now ✈️</button>
            </section>
        </form>
    </main>
    <script src="./js/header.js"></script>
</body>
</html>