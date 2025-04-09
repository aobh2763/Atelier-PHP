<?php
session_start();

if (!isset($_SESSION["role"])) {
    header("Location: index.php");
    exit();
}

require_once "../src/Controller/Repository.php";
require_once "../src/View/header.php";
require_once "../src/View/navbar.php";

function afficherListeDesEtudiants()
{
    $repository = new Repository("etudiant");
    $etudiants = $repository->findAll();

    foreach ($etudiants as $etudiant) {
        echo "<tr>
                <td>{$etudiant->getId()}</td>
                <td><img src='{$etudiant->getImage()}' alt='Student Image' class='img-thumbnail' style='width: 50px; height: 50px;'></td>
                <td>{$etudiant->getName()}</td>
                <td>{$etudiant->getBirthday()}</td>
                <td>{$etudiant->getSection()}</td>
                <td>
                    <div class='btn-group' role='group'>
                        <a href='detail_etudiant.php?filter={$etudiant->getId()}' class='btn btn-primary btn-sm'>Voir Plus</a>";

        if ($_SESSION["role"] === "admin") {
            echo "<a href='./crud_etudiants/supprimer_etudiant.php?filter={$etudiant->getId()}' class='btn btn-danger btn-sm'>Supprimer</a>";
        }

        echo "      </div>
                </td>
            </tr>";
    }
}

function renderCreateStudentForm()
{
    if ($_SESSION["role"] === "admin") {
        echo "
            <form method='POST' action='./crud_etudiants/create_etudiant.php' class='mt-4 mb-4 p-4 border rounded bg-light'>
                <h4 class='mb-3'>Créer un Étudiant</h4>
                <div class='mb-3'>
                    <label for='name' class='form-label'>Name</label>
                    <input type='text' class='form-control' id='name' name='name' placeholder='Enter student name' required>
                </div>
                <div class='mb-3'>
                    <label for='birthday' class='form-label'>Birthday</label>
                    <input type='date' class='form-control' id='birthday' name='birthday'>
                </div>
                <div class='mb-3'>
                    <label for='image' class='form-label'>Image</label>
                    <input type='url' class='form-control' id='image' name='image' placeholder='Enter image URL'>
                </div>
                <div class='mb-3'>
                    <label for='section' class='form-label'>Section</label>
                    <input type='text' class='form-control' id='section' name='section' placeholder='Enter section'>
                </div>
                <button type='submit' class='btn btn-success w-100'>Créer Etudiant</button>
            </form>
        ";
    }
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Liste des Étudiants</h2>

    <form method="GET" action="liste_des_etudiants.php" class="mb-4">
        <div class="input-group">
            <input type="text" name="filter" class="form-control" placeholder="Filter the list" />
            <button class="btn btn-primary" type="submit">Filter</button>
        </div>
    </form>

    <div class="table-responsive">
        <table id="table" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Birthday</th>
                    <th>Section</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php afficherListeDesEtudiants(); ?>
            </tbody>
        </table>
    </div>

    <?php renderCreateStudentForm(); ?>
</div>

<?php
require_once "../src/View/footer.php";
?>