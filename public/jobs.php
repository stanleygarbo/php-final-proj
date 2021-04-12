<?php 
    include '../resources/database.inc.php';
    include '../resources/util.inc.php';

    $conn = new DBconn();
    $util = new Util();

    $jobs = $util -> getJobs($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/css/hot.css">
    <link rel="stylesheet" href="./styles/css/posts.css">
    <link rel="stylesheet" href="./styles/css/header.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <title>What's hot in E chismis</title>
</head>
<body>
    <?php include '../resources/templates/header.php'; ?>
    <main>
        <form class="search">
            <h1 class="search__title">Search for your wanted job</h1>
            <input type="text" class="search__input" placeholder="Search for jobs 🔎 ">
            <div class="search__text">
                Set Filters
            </div>
            <div class="search__filters">
                <input type="text" class="search__filters__input" placeholder="Language 🇵🇭">
                <input type="text" class="search__filters__input" placeholder="Location/City 🌆">
            </div>
        </form>
        <section class="posts">
                <div class="posts__heading">
                    <h2>
                        Job List 🔥
                    </h2>
                </div>
                <?php foreach($jobs as $post): ?>
                <div class="posts__item">
                    <?php if($post['userID'] === $_SESSION['userID']):?>
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
    </main>
    <script src="./js/header.js"></script>
</body>
</html>
