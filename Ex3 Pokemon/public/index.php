<?php
include "../src/autoloader.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 3: Pokemon</title>
</head>
<body>
<?php 
$attackPokemon = new AttackPokemon(1,1,1,100);
$feuPokemon = new PlantePokemon(1,1,1, $attackPokemon);
$eauPokemon = new PlantePokemon(1,1,1, $attackPokemon);

$feuPokemon->whoAmI();
echo "<br>";
$eauPokemon->whoAmI();
echo "<br>";

for($i = 0;$i<3;$i++){
    $eauPokemon->attack($feuPokemon);

    echo "Attack:<br>";
    $feuPokemon->whoAmI();
    echo "<br>";
    $eauPokemon->whoAmI();
    echo "<br>";
}
?>
</body>
</html>