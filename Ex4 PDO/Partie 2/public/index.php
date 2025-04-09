<?php
require_once "../src/View/header.php";
?>

<form method="POST" action="home.php" class="container mt-5 p-4 border rounded shadow-sm" style="max-width: 400px;">
    <div class="mb-3">
        <label for="username" class="form-label">Nom</label>
        <input type="text" name="username" id="username" class="form-control" placeholder="Entrez votre nom">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Entrez votre mot de passe">
    </div>
    <button type="submit" class="btn btn-primary w-100">Log in</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>