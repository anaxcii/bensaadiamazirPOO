<?php

class UserController
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function connect()
    {
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] == 'POST') {
            if (empty($_POST["username"])) {
                $errors["username"] = 'Veuillez saisir un nom d\'utilisateur';
            }

            if (empty($_POST["password"])) {
                $errors["password"] = 'Veuillez saisir un mot de passe';
            }

            if (count($errors) == 0) {
                $res = $this->userManager->connect($_POST["username"]);
                if (!$res || !password_verify($_POST["password"], $res["password"])) {
                    $errors["password"] = 'Identifiants ou mot de passe incorrects';
                } else {
                    // CONNEXION RÉUSSIE
                    // Le hash correspond
                    // J'ajoute la session et je redirige l'utilisateur
                    session_start();
                    $_SESSION["username"] = $res["username"];
                    header('Location: index.php');
                    die();
                }
            }
        }

        require 'View/user/login.php';
    }
}

