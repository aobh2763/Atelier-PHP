<?php
require_once "../src/View/header.php";
?>
<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="col-md-5">
            <form method="POST" action="home.php" class="p-4 border rounded shadow-sm">
                <h3 class="text-center mb-4">Log In</h3>
                <div class="mb-3">
                    <label for="username" class="form-label">Nom</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Entrez votre nom" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Log in</button>
            </form>
        </div>

        <div class="col-md-5">
            <form method="POST" action="signup.php" class="p-4 border rounded shadow-sm">
                <h3 class="text-center mb-4">Sign Up</h3>
                <div class="mb-3">
                    <label for="signup-username" class="form-label">Nom</label>
                    <input type="text" name="username" id="signup-username" class="form-control" placeholder="Entrez votre nom" required>
                </div>
                <div class="mb-3">
                    <label for="signup-password" class="form-label">Mot de passe</label>
                    <input type="password" name="password" id="signup-password" class="form-control" placeholder="Entrez votre mot de passe" required>
                </div>
                <div class="mb-3">
                    <label for="signup-email" class="form-label">Email</label>
                    <input type="email" name="email" id="signup-email" class="form-control" placeholder="Entrez votre email" required>
                </div>
                <div class="mb-3">
                    <label for="signup-role" class="form-label">Rôle</label>
                    <select class="form-select" name="role" id="signup-role">
                        <option selected value="user">Utilisateur</option>
                        <option value="admin">Administrateur</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100">Sign up</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>