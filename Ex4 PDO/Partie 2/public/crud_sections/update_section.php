<?php
session_start();

if(!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin"){
    header("Location: index.php");
}

require_once "../../src/Controller/Repository.php";

if(isset($_POST["id"]) && isset($_POST["designation"]) && isset($_POST["description"])){
    $repository = new Repository("section");
    $repository->update(array(
        "id"=>$_POST["id"],
        "designation"=>$_POST["designation"],
        "description"=>$_POST["description"]
    ));
}

header("Location: ../liste_des_sections.php");
?>