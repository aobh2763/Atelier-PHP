<?php
require_once '../src/Controller/Repository.php';

function create_utilisateur($username, $password, $email, $role) {
    $repository = new Repository("utilisateur");
    
    try{
        $repository->create(
            array(
                "username"=>$username,
                "password"=>$password,
                "email"=>$email,
                "role"=>$role,
            )
        );
    } catch (Exception $e) {
        header("Location: index.php?error=1");
    }
}

create_utilisateur($_POST["username"], $_POST["password"], $_POST["email"], $_POST["role"]);
header("Location: index.php");
?>