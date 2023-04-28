<?php
    class Competition {
        private $id;
        private $name;
        private $description;
        private $city;
        private $format;
        private $cash_prize;

        public function get_iD() {
            return $this->id;
        }

        public function set_iD(int $id){
            $this->id = $id;
        }

        public function get_name() {
            return $this->name;
        }

        public function set_name(string $name) {
            $this->name = $name;
        }

        public function get_description() {
            return $this->description;
        }

        public function set_description(string $description) {
            $this->description = $description;
        }

        public function get_city() {
            return $this->city;
        }

        public function set_city(string $city) {
            $this->city = $city;
        }

        public function get_format() {
            return $this->format;
        }

        public function set_format(string $format) {
            $this->format = $format;
        }

        public function get_cash_prize() {
            return $this->cash_prize;
        }

        public function set_cash_prize(int $cash_prize){
            $this->cash_prize = $cash_prize;
        }
    }
?>