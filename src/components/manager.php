<?php
    class DBManager {
        /*
            Voyez le DBManager de cette manière:
            ====================================
            Le DBManager est une classe contenant des fonctions. Chaque fonction a une utilité et
            contient plusieurs bouts de code en relation avec notre base de données qui pourront
            nous servir pour par exemple obtenir/sélectionner une ou plusieurs données
            (getter) mais aussi d'en ajouter/modifier (setter).

            Ceci nous permettera de manipuler notre base de données autant de fois qu'on le voudra
            sans devoir écrire 20 lignes de code à chaque fois.


            Afin de pouvoir utiliser les fonctions contenues dans la classe DBManager, faudra créer
            une variable qui initialisera cette classe Par exemple:

            $manager = new DBManager();

            Et maintenant vous verez qu'on peux utiliser les fonctions du DBManager avec la variable
            récemment créée:

            $manager->getAllFromTable("Player");
        */
        private $mysql;
        public function __construct(){
            $this->mysql = new PDO(
            'mysql:host=localhost;dbname=gaming;charset=utf8',
            'root',
            'root'
        );
        }

        /*
        ============================
            Les getters vont ici
        ============================
        */


        public function getAllFromGame() {
            // Cette fonction nous permettera d'obtenir absolument toutes les données de la table Game.
            $mysql = $this->mysql;
            $prepare = $mysql->prepare("SELECT * FROM Game");
            $prepare->execute();
            return $prepare;
        }

        /*
        ============================
            Les setters vont ici
        ============================
        */

        public function setGame(string $name, string $station, string $format){
            // Cette fonction nous permettera d'ajouter des valeurs dans la table Game.
            $mysql = $this->mysql;
            $prepare = $mysql->prepare("INSERT INTO Game (name, station, format) VALUES (:name, :station, :format);");
            $prepare->bindValue(":name", $name);
            $prepare->bindValue(":station", $station);
            $prepare->bindValue(":format", $format);
            $prepare->execute();
        }
    }

    
?>