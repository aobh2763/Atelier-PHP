<?php
session_start();

if (!isset($_SESSION["role"])) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET["filter"])) {
    header("Location: liste_des_sections.php");
    exit();
}

require_once "../src/Controller/Repository.php";
require_once "../src/View/header.php";
require_once "../src/View/navbar.php";

function renderAdminView($section)
{
    echo "
    <form action='./crud_sections/update_section.php' method='POST' class='mt-4 w-50 mx-auto'>
        <div class='card shadow-sm'>
            <div class='card-body'>
                <h5 class='card-title'>Section Details:</h5>
                <p class='card-text'><strong>ID:</strong></p>
                <div class='mb-3'>
                    <input type='text' name='id' value='{$section->getId()}' class='form-control' readonly>
                </div>
                <p class='card-text'><strong>Designation:</strong></p>
                <div class='mb-3'>
                    <input type='text' name='designation' value='{$section->getDesignation()}' class='form-control' placeholder='Enter designation'>
                </div>
                <p class='card-text'><strong>Description:</strong></p>
                <div class='mb-3'>
                    <textarea name='description' class='form-control' placeholder='Enter description'>{$section->getDescription()}</textarea>
                </div>
            </div>
            <div class='card-footer text-center'>
                <button type='submit' class='btn btn-primary w-100'>Update</button>
            </div>
        </div>
    </form>";
}

function renderUserView($section)
{
    echo "
    <div class='card shadow-sm mt-4 w-50 mx-auto'>
        <div class='card-body'>
            <h5 class='card-title'>Section Details:</h5>
            <p class='card-text'><strong>ID:</strong> {$section->getId()}</p>
            <p class='card-text'><strong>Designation:</strong> {$section->getDesignation()}</p>
            <p class='card-text'><strong>Description:</strong> {$section->getDescription()}</p>
        </div>
    </div>";
}

function afficherDetails($id)
{
    $repository = new Repository("section");
    $section = $repository->findById($id);

    if ($_SESSION["role"] === "admin") {
        renderAdminView($section);
    } else {
        renderUserView($section);
    }
}

afficherDetails($_GET["filter"]);

require_once "../src/View/footer.php";
?>