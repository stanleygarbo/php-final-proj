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
            $util -> redirect('./account.php');
        endif;

        if(isset($_POST['submit'])){
            $randomID = $util -> generateUID();

            $today = date('Y-m-d H:i:s'); 

            try{
                $conn -> Insert(
                    'INSERT INTO jobs (jobID, userID, jobTitle,jobBody, jobRequirements, jobContactNum, jobLanguage, jobEmail, jobLocation, jobSalaryFrom, jobSalaryTo, jobDatePosted) 
                    VALUES (:jobID, :userID, :jobTitle, :jobBody, :jobRequirements, :jobContactNum, :jobLanguage, :jobEmail, :jobLocation, :jobSalaryFrom, :jobSalaryTo, :jobDatePosted);',
                    [
                        'jobID' => $randomID, 
                        'userID' => $_SESSION['userID'], 
                        'jobTitle' => $_POST['title'], 
                        'jobBody' => $_POST['body'], 
                        'jobRequirements' => $_POST['requirements'], 
                        'jobContactNum' => $_POST['contactnum'], 
                        'jobLanguage' => $_POST['language'], 
                        'jobEmail' => $_POST['email'],
                        'jobLocation' => $_POST['location'],
                        'jobSalaryFrom' => $_POST['salaryfrom'],
                        'jobSalaryTo' => $_POST['salaryto'],
                        'jobDatePosted' => $today,
                    ]
                );
            }catch(Exception $e){
                print $e;
            }

            $util -> redirect('./profile.php?uid='.$_SESSION['userID']);
        }

    ?>
    
    <main>
        <form action="publish.php" method="POST" >
            <input required type="text" name="title" placeholder="Title">
            <textarea required placeholder="Description?" name="body" id="body" cols="30" rows="10"></textarea>
            <section>
                <div class="input-group">
                    <textarea name="requirements" class="big-input" placeholder="Requirements"></textarea>
                    <div class="little-inputs">
                        <input required type="text" name="language" placeholder="Language 🇵🇭">
                        <input required type="text" name="location" placeholder="Location/City 🌆">
                        <input required type="email" name="email" value="<?php print $_SESSION['userEmail'];?>" placeholder="Email">
                        <input required type="text" name="contactnum" value="<?php print $_SESSION['userContactNum'];?>" placeholder="Contact No.">
                        <input required type="text" name="salaryfrom" placeholder="From &#8369;">
                        <input required type="text" name="salaryto" placeholder="to &#8369;">
                    </div>
                </div>
                <button name="submit" value="submit" type="submit">Publish now ✈️</button>
            </section>
        </form>
    </main>
    <script src="./js/header.js"></script>
</body>
</html>