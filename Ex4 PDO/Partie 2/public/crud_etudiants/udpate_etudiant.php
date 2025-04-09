<?php
session_start();

if(!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin"){
    header("Location: index.php");
}

require_once "../../src/Controller/Repository.php";

if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["birthday"]) && isset($_POST["section"])){
    $repository = new Repository("etudiant");
    $repository->update(array(
        "id"=>$_POST["id"],
        "name"=>$_POST["name"],
        "birthday"=>$_POST["birthday"],
        "section"=>$_POST["section"],
    ));
}

header("Location: ../liste_des_etudiants.php");
?>