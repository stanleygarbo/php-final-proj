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
        include '../resources/util.inc.php';
        include '../resources/templates/header.php';

        $util = new Util;

        if (!isset($_SESSION['userID'])):
            header('HTTP/1.0 401 Unauthorized');
            $util -> redirect('./account.php');
        endif;
    ?>
    
    <main>
        <form action="">
            <input type="text" placeholder="Title">
            <textarea placeholder="What's happening?" name="body" id="body" cols="30" rows="10"></textarea>
            <section>
                <div>
                    <input type="text" placeholder="Language 🇵🇭">
                    <input type="text" placeholder="Location/City 🌆">
                </div>
                <button type="submit">Share Now ✈️</button>
            </section>
        </form>
    </main>
    <script src="./js/header.js"></script>
</body>
</html>