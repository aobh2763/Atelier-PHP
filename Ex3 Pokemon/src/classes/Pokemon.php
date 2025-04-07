<?php

class Pokemon{
    public function __construct(
        private $name,
        private $url,
        private $hp,
        private $attackPokemon
    ) {}

    // Getters
    public function getName(){
        return $this->name;
    }
    public function getUrl(){
        return $this->url;
    }
    public function getHp(){
        return $this->hp;
    }
    public function getAttackPokemon(){
        return $this->attackPokemon;
    }

    // Setters
    public function setName($val){
        return $this->name = $val;
    }
    public function setUrl($val){
        return $this->url = $val;
    }
    public function setHp($val){
        return $this->hp = $val;
    }
    public function setAttackPokemon($val){
        return $this->attackPokemon = $val;
    }

    public function isDead(){
        return $this->hp <= 0;
    }

    protected function performSpecialAttack(){
        return rand(1, 100) <= $this->attackPokemon->getProbability();
    }

    protected function getDamage(){
        $damage = rand($this->attackPokemon->getMin(), $this->attackPokemon->getMax());

        if($this->performSpecialAttack()){
            $damage = min(
                $this->attackPokemon->getMax(), 
                $damage * $this->attackPokemon->getSpecial()
            );
        }

        return $damage;
    }

    public function attack($pokemon){
        $damage = $this->getDamage();
        $pokemon->setHp($pokemon->getHp() - $damage);
    }

    public function __toString(){
        return "Pokemon{<br>
            name: $this->name,<br>
            url: $this->url,<br>
            hp: $this->hp,<br>
            attackPokemon: $this->attackPokemon,<br>
        }";
    }

    public function whoAmI(){
        echo $this;
    }
}

?>