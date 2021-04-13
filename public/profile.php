<?php 
    session_start();
    include '../resources/util.inc.php';
    include '../resources/database.inc.php';
    $util = new Util;

    $userInfo;

    if(isset($_GET['uid'])){
        $conn = new DBconn();
        try{
            $userInfo = $util -> getUserInfoAndPosts($conn, $_GET['uid']);
        }
        catch(Exception $e){
            print $e;
        }
    }else{
        $util -> redirect('./404.php');
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
    <title>Electronic Chismis | <?php print $util->sanitize($_SESSION['userName']); ?>'s profile</title>
</head>
<body>
    <?php include '../resources/templates/header.php'; ?>
    <main>
        <?php if (count($userInfo) !== 0): ?>
            <section class="profile">
                <div class="profile__info">
                    <img class="profile__info__avatar" src="<?php print $util->sanitize($userInfo[0]['userProfilePic']); ?>" alt="profile pic">
                    <div class="profile__info__userName"><?php print $util->sanitize($userInfo[0]['userName']); ?></div>
                </div>
                <div class="profile__stats">
                    <div class="profile__stats__posted">
                        <div class="profile__stats__posted__title">
                            Email
                        </div>
                        <div class="profile__stats__posted__number">
                            <?php print $util->sanitize($userInfo[0]['userEmail']); ?>
                        </div>
                        <br/>
                        <div class="profile__stats__posted__title">
                            Contact Number
                        </div>
                        <div class="profile__stats__posted__number">
                            <?php print $util->sanitize($userInfo[0]['userContactNum']); ?>
                        </div>
                    </div>
                </div>
                <div class="profile__bio">
                    <?php print $util->sanitize($userInfo[0]['userDescription'] ? $userInfo[0]['userDescription'] : ''); ?>
                </div>
            </section>
            <section class="posts">
                <div class="posts__heading">
                    <h2>
                        <?php print $util->sanitize($userInfo[0]['userName']); ?>'s Listing 🔥
                    </h2>
                </div>
                <?php foreach($userInfo as $post): ?>
                <div class="posts__item">
                    <?php if(isset($_SESSION['userID']) && ($post['userID'] === $_SESSION['userID'])):?>
                    <a style="color:#ff3e3e;" href="./delete/deletePost.inc.php?id=<?php print $util->sanitize($post['jobID']); ?>">
                        Delete this Post
                    </a><br/><br/>
                    <?php endif;?>
                    <a href="profile.php?uid=<?php print $util->sanitize($post['userID']); ?>" class="posts__item__user">
                        <img width="50px" src="<?php print $util->sanitize($post['userProfilePic']); ?>" alt="profile">
                        <div class="posts__item__user__text">
                            <?php print $util->sanitize($post['userName']); ?>
                            <br/>
                            <?php print $util->sanitize($post['jobDatePosted']); ?>
                        </div>
                    </a>
                    <h2 class="posts__item__title"><?php print $post['jobTitle']?></h2>
                    <div class="posts__item__salary">
                        <h3 class="posts__item__title">&#8369; <?php print $post['jobSalaryFrom']?></h3>
                        to
                        <h3 class="posts__item__title">&#8369; <?php print $post['jobSalaryTo']?></h3>
                    </div>
                    <div class="posts__item__tags">
                        <div class="posts__item__tags__item">
                            <?php print $util->sanitize($post['jobLanguage']);?>
                        </div>
                        <div class="posts__item__tags__item">
                            <?php print $util->sanitize($post['jobLocation']);?>🌃
                        </div>
                    </div>
                    <p class="posts__item__body">
                        <span class="posts__item__body__title">
                            Description
                        </span>
                        <br/>
                        <?php print $util->sanitize($post['jobBody']);?>
                    </p>
                    <p class="posts__item__body">
                        <span class="posts__item__body__title">
                            Requirements
                        </span>
                        <br/>
                        <?php print $util->sanitize($post['jobRequirements']);?>
                    </p>
                    <div class="posts__item__contact">
                        <div class="posts__item__contact__email">
                            <?php print $util->sanitize($post['jobEmail']);?> 📧
                        </div>
                        <div class="posts__item__contact__number">
                            <?php print $util->sanitize($post['jobContactNum']);?> 📞
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </section>
        <?php else:?>
            <div class="message">
                <h2>
                    Nothing to see Here
                </h2>
            </div>
        <?php endif;?>
    </main>
    <script src="./js/header.js"></script>
</body>
</html>