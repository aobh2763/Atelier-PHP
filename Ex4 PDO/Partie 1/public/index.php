<?php
include_once "../src/classes/Student.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 4: Partie 1</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
</head>
<body class="bg-light">
    <div class="container my-5">
        <h1 class="text-center mb-4">Student List</h1>
        <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Birthday</th>
                        <th>More Info</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 1;
                    while ($student = Student::getStudentById($id)) {
                        echo 
                        "<tr>
                            <td>{$student->getId()}</td>
                            <td>{$student->getName()}</td>
                            <td>{$student->getBirthday()}</td>
                            <td>
                                <a href='detailEtudiant.php?id={$student->getId()}' class='btn btn-info btn-sm'>Details</a>
                            </td>
                        </tr>";
                        $id++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>  
    <script src="//cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
</body>
</html>