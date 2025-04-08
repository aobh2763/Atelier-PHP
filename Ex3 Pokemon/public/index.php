<?php
include "../src/autoloader.php";
?>

<?php
    $p1 = new EauPokemon("Pikachu", "https://archives.bulbagarden.net/media/upload/thumb/4/4a/0025Pikachu.png/800px-0025Pikachu.png", 200, new AttackPokemon(10, +20, 30, 0.5));
    $p2 = new PlantePokemon("Bulbasaur", "https://archives.bulbagarden.net/media/upload/thumb/f/fb/0001Bulbasaur.png/640px-0001Bulbasaur.png", 250, new AttackPokemon(5, 15, 25, 0.3));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Battle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4 border border-dark-subtle rounded">
        <?php
            Pokemon::simulerCombat($p1, $p2);
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>