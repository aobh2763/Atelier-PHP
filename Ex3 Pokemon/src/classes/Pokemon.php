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
        return $damage;
    }

    public function __toString(){
        return
        '<table class="border table mb-0">
                <thead>
                    <tr>
                        <th scope="col" class="table-active">' . $this->getName() . '<img src="' . $this->getUrl() . '" width="200"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Points : ' . $this->getHp() . '</td>
                    </tr>
                    <tr>
                        <td>Min Attack Points : ' . ($this->getAttackPokemon())->getMin() . '</td>
                    </tr>
                    <tr>
                        <td>Max Attack Points : ' . ($this->getAttackPokemon())->getMax() . '</td>
                    </tr>
                    <tr>
                        <td>Special Attack : ' . ($this->getAttackPokemon())->getSpecial() . '</td>
                    </tr>
                    <tr>
                        <td>Probability Special Attack : ' . ($this->getAttackPokemon())->getProbability() . '</td>
                    </tr>
                </tbody>
            </table>';
    }

    public function whoAmI(){
        echo $this;
    }

    public static function simulerCombat(Pokemon $p1, Pokemon $p2) {
        echo "<div class=\"container text-bg-info border border-primary rounded mt-2 mb-2 p-2\">Les combattants</div>";
        echo '<div class="m-1 row border">
            <div class="col p-2">' . $p1 . '</div>
            <div class="col p-2">' . $p2 . '</div>
            </div>';

        $rounds = 0;

        while (!$p1->isDead() && !$p2->isDead()) {
            $rounds++;

            $dmg1 = $p1->attack($p2);
            $dmg2 = $p2->attack($p1);

            echo '<div class="container bg-danger-subtle border border-danger rounded mt-2 mb-2 p-2">
                    Round ' . $rounds . '
                    <div class="container bg-success-subtle border border-success rounded mt-2 mb-2 p-2">
                        <div class="row">
                            <div class="col-6">' . $dmg1 . '</div>
                            <div class="col-6">' . $dmg2 . '</div>
                        </div>
                    </div>
                </div>';

            echo '<div class="m-1 row border">
                <div class="col p-2">' . $p1 . '</div>
                <div class="col p-2">' . $p2 . '</div>
                </div>';
        }

        if ($p1->isDead() && $p2->isDead()) {
            echo "It's a tie!";
        } elseif ($p1->isDead()) {
            echo "{$p2->getName()} wins!";
        } else {
            echo "{$p1->getName()} wins!";
        }
        echo "<br>End of the battle<br>";
    }
}

?>