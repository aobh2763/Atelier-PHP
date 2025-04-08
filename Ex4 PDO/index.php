<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire d'étudiants</title>
</head>
<body>
    <?php

    $repEtu = new Repository("etudiant");

    $id1 = $repEtu->create(array("aymen", "2000-12-01", "image.png", "GL"));
    $id2 = $repEtu->create(array("skander", "1998-12-01", "image.png", "RT"));

    echo "$repEtu->findById()";
    ?>
</body>
</html>