<?php
    class Game {
        private $id;
        private $name;
        private $station;
        private $format;

        public function getID() {
            return $this->id;
        }

        public function setID(int $id){
            $this->id = $id;
        }

        public function getName() {
            return $this->name;
        }

        public function setName(string $name) {
            $this->name = $name;
        }

        public function getStation() {
            return $this->station;
        }

        public function setStation(string $station) {
            $this->station = $station;
        }

        public function getFormat() {
            return $this->format;
        }

        public function setFormat(string $format) {
            $this->format = $format;
        }
    }
?>