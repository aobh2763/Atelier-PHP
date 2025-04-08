<?php

class PlantePokemon extends Pokemon{
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

        if($pokemon instanceof EauPokemon){
            $damage = min(
                $this->attackPokemon->getMax(),
                $damage * 2
            );
        }else if($pokemon instanceof PlantePokemon || $pokemon instanceof FeuPokemon){
            $damage = max(
                $this->attackPokemon->getMin(),
                $damage * 0.5
            );
        }

        $pokemon->setHp($pokemon->getHp() - $damage);
        return $damage;
    }
}

?>