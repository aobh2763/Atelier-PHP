<?php
session_start();

if(!isset($_SESSION["role"])){
    header("Location: index.php");
}

require_once "../src/Controller/Repository.php";

function afficherListeDesSections(){
    $repository = new Repository("section");
    $sections = $repository->findAll();
    foreach ($sections as $section) {
        echo 
        "<tr>
            <td>{$section->getId()}</td>
            <td>{$section->getDesignation()}</td>
            <td>{$section->getDescription()}</td>
            <td>
            <a href='./liste_des_etudiants.php?filter={$section->getDesignation()}' class='btn btn-primary btn-sm'>Voir Liste</a>
            </td>
        </tr>";
    }
}

require_once "../src/View/header.php";
require_once "../src/View/navbar.php";
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Liste des Sections</h2>
    <table id="table" class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Designation</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php afficherListeDesSections() ?>
        </tbody>
    </table>
</div>

<?php
require_once "../src/View/footer.php";
?>