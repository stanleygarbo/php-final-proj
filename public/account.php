<?php 
    include '../resources/util.inc.php';
    $util = new Util();

    session_start();

    if (isset($_SESSION['userID'])){
        $util->redirect('/');
    } 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/css/account.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <title>Electronic chismis | login</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <section class="container" id="formSection">
        <aside class="container__aside">
            <div class="container__aside__arrow" @click="goBackClickhandler" aria-label="back button" role="button">
                &#8592;
            </div>
            <div class="container__aside__text">
                Travaho 💼
                <p>
                    Travaho - Hoping to increase employment rates
                </p>
            </div>
        </aside>
        <main class="container__main">
            <form method="POST" id="form" class="container__main__form"
                :action="(showLoginForm && !register) ? './auth/login.inc.php' : './auth/register.inc.php'"
            >
                <h1 class="container__main__form__h1">{{ showLoginForm ? 'Login Form📄' : 'Register📄' }}</h1>
                <div class="container__main__form__toggles">
                    <button 
                        value="login"
                        type="button" 
                        class="container__main__form__toggles__button" 
                        @click="toggleClickHandler"
                        :class="{container__main__form__toggles__button__active: (showLoginForm && !register)}"
                    >
                        Login
                    </button>
                    <button
                        value="register"
                        type="button" 
                        class="container__main__form__toggles__button" 
                        @click="toggleClickHandler"
                        :class="{container__main__form__toggles__button__active: (!showLoginForm && register)}"
                    >
                        Register
                    </button>
                </div>
                <div v-if="thereIsAnEmptyInput" class="error">
                    You need to Fill in all the fields
                </div>
                <div v-if="invalidLogin" class="error">
                    Invalid login
                </div>
                <label v-if="!showLoginForm || register" class="container__main__form__label" for="name">📛 Full Name</label>
                <input v-if="!showLoginForm || register" class="container__main__form__input" name="name" required autocomplete="off" type="text">
                <label class="container__main__form__label" for="email">📧 E-mail</label>
                <input class="container__main__form__input" name="email" required autocomplete="off" type="email">
                <label v-if="!showLoginForm || register" class="container__main__form__label" for="contactnum">📞 Contact number</label>
                <input v-if="!showLoginForm || register" class="container__main__form__input" name="contactnum" required autocomplete="off" type="text">
                <div v-if="emailAlreadyExists" class="error">
                    Email already exists
                </div>
                <label class="container__main__form__label" for="password">🔑 Password</label>
                <input class="container__main__form__input" required name="password" autocomplete="off" type="password">
                <label v-if="!showLoginForm || register" class="container__main__form__label" for="passwordConfirm">🔑 Confirm Password</label>
                <input v-if="!showLoginForm || register" class="container__main__form__input" required name="passwordConfirm" autocomplete="off" type="password">
                <div v-if="passwordsDoNotMatch" class="error">
                    Passwords don't match, you donut!
                </div>
                <button name="submitBtn" value="submit" class="container__main__form__submit" type="submit">
                    {{ showLoginForm ? 'Login' : 'Register' }}
                </button>
            </form>
        </main>
    </section>
    <script defer src="./js/account.js"></script>
</body>
</html>