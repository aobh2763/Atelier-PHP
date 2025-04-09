<?php
session_start();

if(!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin"){
    header("Location: index.php");
}

require_once "../../src/Controller/Repository.php";

if(isset($_GET["filter"])){
    $repository = new Repository("section");
    $repository->delete($_GET["filter"]);
}

header("Location: ../liste_des_sections.php");
?>