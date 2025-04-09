<?php
session_start();

require_once '../src/Controller/Repository.php';

function valid($username, $password) {
    $repository = new Repository("utilisateur");
    $utilisateurs = $repository->findAll();

    foreach($utilisateurs as $utilisateur){
        if($utilisateur->getUsername() === $username && $utilisateur->getPassword() == $password){
            $_SESSION["role"] = $utilisateur->getRole();
            return true;
        }
    }

    return false;
}

if(!valid($_POST["username"], $_POST["password"])){
    header("Location: index.php");
}

require_once "../src/View/header.php";
require_once "../src/View/navbar.php";
?>
        
<section class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body text-center">
            <h1 class="card-title text-primary">Hello, PHP LOVERS!</h1>
            <p class="card-text">Welcome to your administration Platform</p>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>