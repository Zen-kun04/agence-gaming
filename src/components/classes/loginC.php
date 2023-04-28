<?php
    class Login {
        private $username;
        private $raw_password;

        public function getUsername() {
            return $this->username;
        }

        public function setUsername(string $username) {
            $this->username = $username;
        }

        public function getRawPassword() {
            return $this->raw_password;
        }

        public function setRawPassword(string $raw_password) {
            $this->raw_password = $raw_password;
        }
    }
?>