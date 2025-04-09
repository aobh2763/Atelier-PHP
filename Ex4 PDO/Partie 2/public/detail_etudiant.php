<?php
session_start();

if (!isset($_SESSION["role"])) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET["filter"])) {
    header("Location: liste_des_etudiants.php");
    exit();
}

require_once "../src/Controller/Repository.php";
require_once "../src/View/header.php";
require_once "../src/View/navbar.php";

function renderAdminView($etudiant)
{
    echo "
    <form action='./crud_etudiants/udpate_etudiant.php' method='POST' class='mt-4 mb-4 w-50 mx-auto'>
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
                <p class='card-text'><strong>Image URL:</strong></p>
                <div class='mb-3'>
                    <input type='text' name='image' value='{$etudiant->getImage()}' class='form-control' placeholder='Enter image URL'>
                </div>
            </div>
            <div class='card-footer text-center'>
                <button type='submit' class='btn btn-primary w-100'>Update</button>
            </div>
        </div>
    </form>";
}

function renderUserView($etudiant)
{
    echo "
    <div class='card shadow-sm mt-4 mb-4 w-50 mx-auto'>
        <img src='{$etudiant->getImage()}' class='card-img-top img-fluid' alt='Student Image'>
        <div class='card-body'>
            <h5 class='card-title'>Name:</h5>
            <p class='card-text'>{$etudiant->getName()}</p>
            <p class='card-text'><strong>ID:</strong> {$etudiant->getId()}</p>
            <p class='card-text'><strong>Birthday:</strong> {$etudiant->getBirthday()}</p>
            <p class='card-text'><strong>Section:</strong> {$etudiant->getSection()}</p>
        </div>
    </div>";
}

function afficherDetails($id)
{
    $repository = new Repository("etudiant");
    $etudiant = $repository->findById($id);

    if ($_SESSION["role"] === "admin") {
        renderAdminView($etudiant);
    } else {
        renderUserView($etudiant);
    }
}

afficherDetails($_GET["filter"]);

require_once "../src/View/footer.php";
?>