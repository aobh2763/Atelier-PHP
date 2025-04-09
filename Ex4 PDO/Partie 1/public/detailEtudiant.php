<?php
include_once "../src/classes/Student.php";

if (!isset($_GET["id"])) {
    header("Location: ./index.php");
    exit;
}

$studentId = intval($_GET["id"]);
$student = Student::getStudentById($studentId);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <?php if ($student){ ?>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h1 class="card-title"><?= htmlspecialchars($student->getName()) ?></h1>
                </div>
                <div class="card-body">
                    <p class="card-text"><strong>Birthday:</strong> <?= htmlspecialchars($student->getBirthday()) ?></p>
                    <a href="index.php" class="btn btn-secondary">Back</a>
                </div>
            </div>
        <?php }else{ ?>
            <div class="alert alert-danger">Student not found.</div>
        <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
