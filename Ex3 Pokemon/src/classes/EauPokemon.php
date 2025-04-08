<?php

class EauPokemon extends Pokemon{
    public function __construct(
        private $name,
        private $url,
        private $hp,
        private $attackPokemon
    ) {
        parent::__construct($name, $url, $hp, $attackPokemon);
    }

    public function attack($pokemon){
        $damage = $this->getDamage();

        if($pokemon instanceof FeuPokemon){
            $damage = $damage * 2;
        }else if($pokemon instanceof EauPokemon || $pokemon instanceof PlantePokemon){
            $damage = intval($damage * 0.5);
        }

        $pokemon->setHp($pokemon->getHp() - $damage);
        return $damage;
    }
}

?>