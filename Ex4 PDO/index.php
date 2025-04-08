<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire d'étudiants</title>
</head>
<body>
    <?php
    require_once "classes/Repository.php";
    require_once "student/Student.php";

    $s1 = Student::getStudentById(2);
    var_dump($s1);
    echo "<br><br>";

    $repEtu = new Repository("etudiant");

    $id1 = $repEtu->create(array(("name") => "aymen", ("birthday") => "2000-12-01", ("image") => "image.png", ("section") => "GL"));
    $id2 = $repEtu->create(array(("name") => "skander", ("birthday") => "1998-12-01", ("image") => "image.png", ("section") => "RT"));

    var_dump($repEtu->findById($id1));
    ?>
</body>
</html>