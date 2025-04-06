<?php
require 'Etudiant.php';

$aymen = new Etudiant("Aymen");
$skander = new Etudiant ("Skander");

$aymen->setNotes(array(11, 13, 18, 7, 10, 13, 2, 5, 1));

$skander->addNote(15);
$skander->addNote(9);
$skander->addNote(8);
$skander->addNote(16);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage de Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div class="row m-5">
        <div class="col-6 border rounded p-2">
            <?php
                $aymen->afficherNotes();
            ?>
        </div>
        <div class="col-6 border rounded p-2">
            <?php
                $skander->afficherNotes();
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>