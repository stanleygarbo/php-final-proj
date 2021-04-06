<?php 
    session_start();
    include '../resources/util.inc.php';
    include '../resources/database.inc.php';
    $util = new Util;

    $userName;
    $userID;
    $userPic;
    if(isset($_GET['uid'])){

    }else{
        $util -> redirect('./account.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/css/header.css">
    <link rel="stylesheet" href="./styles/css/posts.css">
    <link rel="stylesheet" href="./styles/css/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <title>Electronic Chismis | <?php print $_SESSION['userName']; ?>'s profile</title>
</head>
<body>
    <?php include '../resources/templates/header.php'; ?>
    <main>
        <section class="profile">
            <div class="profile__info">
                <img class="profile__info__avatar" src="<?php print $_SESSION['userProfilePic']; ?>" alt="profile pic">
                <div class="profile__info__userName"><?php print $_SESSION['userName']; ?></div>
            </div>
            <div class="profile__stats">
                <div class="profile__stats__posted">
                    <div class="profile__stats__posted__title">
                        Posted
                    </div>
                    <div class="profile__stats__posted__number">
                        15
                    </div>
                </div>
            </div>
            <div class="profile__bio">
                <?php print 'Experiment, Fail, Learn, Repeat'; ?>
            </div>
            <!-- <div class="profile__socials">
                <?php print 'Twitter | Instagram | Facebook'; ?>
            </div> -->
        </section>
        <section class="posts">
            <div class="posts__heading">
                <h2>
                    User's posts 🔥
                </h2>
            </div>
            <?php for($i = 0; $i <=15; $i++): ?>
            <div class="posts__item">
                <h2 class="posts__item__title">Sample Chismis</h2>
                <div class="posts__item__tags">
                    <div class="posts__item__tags__item">
                        Waray
                    </div>
                    <div class="posts__item__tags__item">
                        Ormoc🌃
                    </div>
                </div>
                <p class="posts__item__body">
                    In laboris veniam mollit eiusmod amet culpa eu do enim veniam.
                    Minim laboris tempor nisi nisi eu officia nisi sit incididunt pariatur.
                    Officia laboris incididunt elit cupidatat non proident.
                    Deserunt cillum mollit fugiat eiusmod.
                    Qui est qui fugiat duis aute.
                    Id sunt velit magna proident ex occaecat do ad mollit tempor deserunt incididunt officia irure.
                    Ad eu consectetur velit enim aute adipisicing aute deserunt laboris culpa do mollit.
                </p>
            </div>
            <?php endfor;?>
        </section>
    </main>
    <script src="./js/header.js"></script>
</body>
</html>