<?php
session_start();

if (!isset($_SESSION["role"])) {
    header("Location: index.php");
    exit();
}

require_once "../src/Controller/Repository.php";
require_once "../src/View/header.php";
require_once "../src/View/navbar.php";

function afficherListeDesSections()
{
    $repository = new Repository("section");
    $sections = $repository->findAll();

    foreach ($sections as $section) {
        echo "<tr>
                <td>{$section->getId()}</td>
                <td>{$section->getDesignation()}</td>
                <td>{$section->getDescription()}</td>
                <td>
                    <a href='./liste_des_etudiants.php?filter={$section->getDesignation()}' class='btn btn-info btn-sm'>Voir Liste</a>";

        if ($_SESSION["role"] === "admin") {
            echo "   
                    <a href='./detail_section.php?filter={$section->getId()}' class='btn btn-primary btn-sm'>Modifier</a>
                    <a href='./crud_sections/supprimer_section.php?filter={$section->getId()}' class='btn btn-danger btn-sm'>Supprimer</a>";
        }

        echo "</td>
            </tr>";
    }
}

function afficherFormulaireCreationSection()
{
    if ($_SESSION["role"] === "admin") {
        echo "
            <form method='POST' action='./crud_sections/create_section.php' class='mt-4 mb-4 p-4 border rounded bg-light'>
                <h4 class='mb-3'>Créer une Section</h4>
                <div class='mb-3'>
                    <label for='designation' class='form-label'>Designation</label>
                    <input type='text' class='form-control' id='designation' name='designation' placeholder='Enter section designation' required>
                </div>
                <div class='mb-3'>
                    <label for='description' class='form-label'>Description</label>
                    <textarea class='form-control' id='description' name='description' placeholder='Enter section description' rows='3'></textarea>
                </div>
                <button type='submit' class='btn btn-success w-100'>Créer Section</button>
            </form>";
    }
}
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
            <?php afficherListeDesSections(); ?>
        </tbody>
    </table>

    <?php afficherFormulaireCreationSection(); ?>
</div>

<?php
require_once "../src/View/footer.php";
?>