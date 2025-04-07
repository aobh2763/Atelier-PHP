<?php

class AttackPokemon{
    public function __construct(
        private $attackMinimal,
        private $attackMaximal,
        private $specialAttack,
        private $probabilitySpecialAttack
    ){}

    // Getters
    public function getMin(){
        return $this->attackMinimal;
    }
    public function getMax(){
        return $this->attackMaximal;
    }
    public function getSpecial(){
        return $this->specialAttack;
    }
    public function getProbability(){
        return $this->probabilitySpecialAttack;
    }

    // Setters
    public function setMin($val){
        $this->attackMinimal = $val;
    }
    public function setMax($val){
        $this->attackMaximal = $val;
    }
    public function setSpecial($val){
        $this->specialAttack = $val;
    }
    public function setProbability($val){
        $this->probabilitySpecialAttack = $val;
    }

    public function __toString(){
        return "AttackPokemon{<br>
            attackMinimal: $this->attackMinimal,<br>
            attackMaximal: $this->attackMaximal,<br>
            specialAttack: $this->specialAttack,<br>
            probabilitySpecialAttack: $this->probabilitySpecialAttack<br>
        }";
    }
}

?>