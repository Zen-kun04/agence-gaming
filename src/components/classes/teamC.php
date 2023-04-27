<?php
    class Team
    {
        private $id;
        private $name;
        private $description;
    
    
        public function getId()
        {
            return $this->id;
        }
        public function setId(int $argumentId)
        {
            $this->id = $argumentId;
        }
    
    
        public function getName()
        {
            return $this->name;
        }
        public function setName(string $argumentName)
        {
            $this->name = $argumentName;
        }
    
    
        public function getDescription()
        {
            return $this->description;
        }
        public function setDescription(string $argumentDescription)
        {
            $this->description = $argumentDescription;
        }
    
    };
?>