<?php
    class LoginManager extends AuthDBManager{
        public function hashRawPassword(Login $login) {
            return md5($login->getRawPassword());
        }

        public function isValidPassword(Login $login) {
            $prepare = $this->getConnection()->prepare("SELECT hash FROM users WHERE username = ?");
            $prepare->execute([
                $login->getUsername()
            ]);
            if($prepare->rowCount() <= 0){
                return false;
            }
            return $prepare->fetch()["hash"] === $this->hashRawPassword($login);
        }

        public function isValidHash(Login $login) {
            $prepare = $this->getConnection()->prepare("SELECT hash FROM users WHERE username = ? AND hash = ?");
            $prepare->execute([
                $login->getUsername(),
                $login->getRawPassword()
            ]);
            return $prepare->rowCount() > 0;
        }

        public function checkAuthenticatedRequest(){
            if(!empty($_COOKIE["username"]) && !empty($_COOKIE["password"])){
                // echo("Cookies: " . json_encode($_COOKIE));
                $login = new Login();
                $login->setUsername($_COOKIE["username"]);
                $login->setRawPassword($_COOKIE["password"]);
                return $this->isValidHash($login);
            }
            return false;
        }
    }
?>