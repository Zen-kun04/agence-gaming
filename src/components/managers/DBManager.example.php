<!-- <?php
    class DBManager {
        private $mysql;

        public function __construct() {
            try {
                $this->mysql = new PDO(
                    'mysql:host=localhost;dbname=database;charset=utf8',
                    'mysql_username',
                    'mysql_password'
                );
            }catch(PDOException $e){
                die("Error: " .  $e->getMessage());
            }
        }

        public function getConnection() {
            return $this->mysql;
        }
    }
?> -->