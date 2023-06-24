<?php include("../parts/header.php");
?>
<?php
// Détruire la session en cours
session_start();
session_destroy();
?>
    <h1>Vous avez été déconnecté</h1>
<button class="btn btn-success" onclick="window.history.back()">Retour</button>
<?php include("../parts/footer.php");
?>