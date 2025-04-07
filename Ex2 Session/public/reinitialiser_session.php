<?php
    include_once "../src/classes/session.php";

    $session = Session::getInstance();
    $session->clear();
    
    header("Location: index.php");
?>
