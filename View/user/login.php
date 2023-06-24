<?php
include("View/parts/header.php");
?>

<form method="post" action="index.php?controller=user&action=connect" class="p-5">
    <div class="form-group">
        <label for="username">Utilisateur</label>
        <input id="username" name="username" class="form-control">
    </div>

    <div class="form-group mt-2">
        <label for="password">Mot de passe</label>
        <input id="password" name="password" class="form-control" type="password">
    </div>
    <?php
    // Affichage des erreurs
    if (count($errors) != 0) {
        echo ('<h4>Erreurs lors de la dernière soumission du formulaire :</h4>');
        foreach ($errors as $error) {
            echo ('<div class="text-danger">' . $error . '</div>');
        }
    }
    ?>

    <input type="submit" class="btn btn-success mt-3">
</form>
<?php include("View/parts/footer.php");
?>