<?php 
    include '../resources/database.inc.php';

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
                    Job Postings 🔥
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
