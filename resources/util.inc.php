<?php

    class Util{
        
        public function redirect($url, $statusCode = 303){
            header('Location: ' . $url, true, $statusCode);
            die();
        }

        // https://stackoverflow.com/questions/1846202/php-how-to-generate-a-random-unique-alphanumeric-string-for-use-in-a-secret-l
        public function generateUID(){
            // PHP 7 standard library provides the random_bytes($length) function that generate cryptographically secure pseudo-random bytes.
            $bytes = random_bytes(20);
            return bin2hex($bytes);
        }

        public function thereIsAnEmptyInput($arrOfData){
            foreach ($arrOfData as $item){
                if(empty($item)){
                    return true;
                }
            }
            return false;
        }

        public function passwordsDoNotMatch($pw1,$pw2){
            return $pw1 !== $pw2;    
        }

        public function emailAlreadyExists($conn, $email){
            $res = $conn->Select("SELECT `userEmail` FROM `users` WHERE `userEmail` = :email;",[
                'email'=>$email
            ]);
            return (count($res) > 0 ? $res[0]['userEmail'] : '') === $email;
        }

        public function verifyUser($conn, $email, $pw){
            # retrieve data
            $res = $conn->Select('SELECT `userID`, `userName`, `userPassword`, `userProfileLink` FROM `users` WHERE `userEmail` = :email;',[
                'email'=>$email,
            ]);

            if(count($res) > 0 && password_verify($pw,$res[0]['userPassword'])){
                session_start();
                $_SESSION['userID'] = $res[0]['userID'];
                $_SESSION['userName'] = $res[0]['userName'];
                $_SESSION['userProfilePic'] = $res[0]['userProfileLink'] === null ? 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png' : $res[0]['userProfileLink'] ;
                return true;
            }
            else{
                return false;
            }
        }
    }