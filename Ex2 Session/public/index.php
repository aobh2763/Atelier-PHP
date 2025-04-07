<?php
    include_once "../src/classes/session.php";
    $session = Session::getInstance();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 2: Session</title>
</head>
<body>
    <?php 
        if(!($session->get("NbVisits"))){
            $session->set("NbVisits",1);
            echo "Bonjour c'est votre premiere visite!";
        }else{
            $session->set("NbVisits", $session->get("NbVisits")+1);
            echo "Merci pour votre fidélité, c'est votre {$session->get('NbVisits')} éme visite.";
        }
    ?>

    <form action="reinitialiser_session.php">
        <button type="submit">Reinitialiser Session</button>
    </form>
</body>
</html>