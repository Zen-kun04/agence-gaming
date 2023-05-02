<?php
    
        class AuthDBManager {
            private $mysql;

            public function __construct() {
                try {
                    $this->mysql = new PDO(
                        'mysql:
                        host=localhost;
                        dbname=Auth;
                        charset=utf8;',
                        'root',
                        'root'
                    );
                } catch (PDOException $th) {
                    echo("Auth DB Error: " . $th->getMessage());
                }
            }

            public function getConnection() {
                return $this->mysql;
            }
        }
    
?>