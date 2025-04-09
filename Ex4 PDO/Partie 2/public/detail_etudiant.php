<?php
session_start();

if(!isset($_SESSION["role"])){
    header("Location: index.php");
}

if(!isset($_GET["filter"])){
    header("Location: liste_des_etudiants.php");
}

require_once "../src/Controller/Repository.php";

function afficherDetails($id){
    $repository = new Repository("etudiant");
    $etudiant = $repository->findById($id);

    echo 
        "<form action='./crud_etudiants/update_etudiant.php' method='POST' class='mt-4 w-50 mx-auto'>
            <div class='card shadow-sm'>
                <img src='{$etudiant->getImage()}' class='card-img-top img-fluid' alt='Student Image'>
                <div class='card-body'>
                    <h5 class='card-title'>Name:</h5>
                    <div class='mb-3'>
                        <input type='text' name='name' value='{$etudiant->getName()}' class='form-control' placeholder='Enter name'>
                    </div>
                    <p class='card-text'><strong>ID:</strong></p>
                    <div class='mb-3'>
                        <input type='text' name='id' value='{$etudiant->getId()}' class='form-control' readonly>
                    </div>
                    <p class='card-text'><strong>Birthday:</strong></p>
                    <div class='mb-3'>
                        <input type='date' name='birthday' value='{$etudiant->getBirthday()}' class='form-control'>
                    </div>
                    <p class='card-text'><strong>Section:</strong></p>
                    <div class='mb-3'>
                        <input type='text' name='section' value='{$etudiant->getSection()}' class='form-control' placeholder='Enter section'>
                    </div>
                </div>
                <div class='card-footer text-center'>
                    <button type='submit' class='btn btn-primary w-100'>Update</button>
                </div>
            </div>
        </form>";
}

require_once "../src/View/header.php";
require_once "../src/View/navbar.php";

afficherDetails($_GET["filter"]);

require_once "../src/View/footer.php";
?>