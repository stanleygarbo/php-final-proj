<?php 
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
?>

<header class="header" id="header">
    <nav class="header__nav">
        <div class="header__nav__logo">
            Blue Jobs 💼
        </div>
        <ul class="header__nav__ul">
            <li class="header__nav__ul__li">
                <a href="/" id="homeLink" class="header__nav__ul__li__a">Home🏠</a>
            </li>
            <li class="header__nav__ul__li">
                <a href="/hot.php" id="hotLink" class="header__nav__ul__li__a">What's Hot🔥</a>
            </li>
            <li class="header__nav__ul__li">
                <a href="/getnotified.php" id="getNotifiedLink" class="header__nav__ul__li__a">Get Notified⚡</a>
            </li>
            <li class="header__nav__ul__li">
                <a href="/about.php" id="aboutLink" class="header__nav__ul__li__a">About Us🚀</a>
            </li>
        </ul>
        <?php if(!isset($_SESSION['userID'])): ?>
            <a class="header__nav__publish" href="/publish.php">
                Post Job ✈️
            </a>
        <?php else: ?>
            <div aria-label="dropdown" class="header__nav__dropdown" id="dropdown" >
                <div class="header__nav__dropdown__name"><?php print $_SESSION['userName'];?></div>
                <img class="header__nav__dropdown__img" src="<?php print $_SESSION['userProfilePic']; ?>" alt="profile pic">
                <div class="header__nav__dropdown__chevron">
                    &#x25BC;
                </div>

                <div class="header__nav__dropdown__container" id="dropdownEl">
                    <a href="../profile.php?uid=<?php print $_SESSION['userID'];?>" class="header__nav__dropdown__container__link">
                        <svg aria-label="Profile" class="header__nav__dropdown__container__link__icon " height="16" viewBox="0 0 32 32" width="16"><path d="M16 0C7.2 0 0 7.1 0 16c0 4.8 2.1 9.1 5.5 12l.3.3C8.5 30.6 12.1 32 16 32s7.5-1.4 10.2-3.7l.3-.3c3.4-3 5.5-7.2 5.5-12 0-8.9-7.2-16-16-16zm0 29c-2.8 0-5.3-.9-7.5-2.4.5-.9.9-1.3 1.4-1.8.7-.5 1.5-.8 2.4-.8h7.2c.9 0 1.7.3 2.4.8.5.4.9.8 1.4 1.8-2 1.5-4.5 2.4-7.3 2.4zm9.7-4.4c-.5-.9-1.1-1.5-1.9-2.1-1.2-.9-2.7-1.4-4.2-1.4h-7.2c-1.5 0-3 .5-4.2 1.4-.8.6-1.4 1.2-1.9 2.1C4.2 22.3 3 19.3 3 16 3 8.8 8.8 3 16 3s13 5.8 13 13c0 3.3-1.2 6.3-3.3 8.6zM16 5.7c-3.9 0-7 3.1-7 7s3.1 7 7 7 7-3.1 7-7-3.1-7-7-7zm0 11c-2.2 0-4-1.8-4-4s1.8-4 4-4 4 1.8 4 4-1.8 4-4 4z"></path></svg>
                        Profile
                    </a>
                    <a href="../publish.php" class="header__nav__dropdown__container__link">
                    <svg aria-label="New Post" class="header__nav__dropdown__container__link__icon " height="24" viewBox="0 0 44 44" width="24"><path d="M33.7 44.12H8.5a8.41 8.41 0 01-8.5-8.5v-25.2a8.41 8.41 0 018.5-8.5H23a1.5 1.5 0 010 3H8.5a5.45 5.45 0 00-5.5 5.5v25.2a5.45 5.45 0 005.5 5.5h25.2a5.45 5.45 0 005.5-5.5v-14.5a1.5 1.5 0 013 0v14.5a8.41 8.41 0 01-8.5 8.5z"></path><path d="M17.5 34.82h-6.7a1.5 1.5 0 01-1.5-1.5v-6.7a1.5 1.5 0 01.44-1.06L34.1 1.26a4.45 4.45 0 016.22 0l2.5 2.5a4.45 4.45 0 010 6.22l-24.3 24.4a1.5 1.5 0 01-1.02.44zm-5.2-3h4.58l23.86-24a1.45 1.45 0 000-2l-2.5-2.5a1.45 1.45 0 00-2 0l-24 23.86z"></path><path d="M38.2 14.02a1.51 1.51 0 01-1.1-.44l-6.56-6.56a1.5 1.5 0 012.12-2.12l6.6 6.6a1.49 1.49 0 010 2.12 1.51 1.51 0 01-1.06.4z"></path></svg>
                        Add Post
                    </a>
                    <a href="./auth/logout.inc.php" style="border-top:1px solid #bbbbbb;" class="header__nav__dropdown__container__link">
                        Logout
                    </a>
                </div>

            </div>
        <?php endif;?>
    </nav>
</header>
