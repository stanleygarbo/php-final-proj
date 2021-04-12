<?php

    class Util{
        
        public function redirect($url, $statusCode = 303){
            header('Location: ' . $url, true, $statusCode);
            die();
        }

        public function generateUID(){
            $uniqueID = uniqid();
            return $uniqueID;
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
            $res = $conn->Select('SELECT `userID`, `userName`, `userEmail`, `userContactNum`, `userPassword`, `userProfilePic` FROM `users` WHERE `userEmail` = :email;',[
                'email'=>$email,
            ]);

            if(count($res) > 0 && password_verify($pw,$res[0]['userPassword'])){
                session_start();
                $_SESSION['userID'] = $res[0]['userID'];
                $_SESSION['userName'] = $res[0]['userName'];
                $_SESSION['userEmail'] = $res[0]['userEmail'];
                $_SESSION['userContactNum'] = $res[0]['userContactNum'];
                $_SESSION['userProfilePic'] = $res[0]['userProfilePic'];
                return true;
            }
            else{
                return false;
            }
        }

        public function sanitize ($str){
            return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
        }

        public function getUserInfo($conn, $uid){
            // gets the info of the user from the users and jobs table wherein the user id is equal to uid 
            $res = $conn -> Select("SELECT * FROM users U INNER JOIN jobs J ON U.userID = J.userID WHERE J.userID = :uid;",[
                'uid' => $uid
            ]);

            return $res;
        }
    }