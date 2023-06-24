<?php include("View/parts/header.php");
?>

<h1>Liste des motos</h1>
<a href="index.php?controller=moto&action=add">
    <button class="btn btn-success">Ajouter une moto</button>
</a>

<form action="index.php" method="GET">
    <input type="hidden" name="controller" value="moto">
    <input type="hidden" name="action" value="list">
    <label for="type">Trier par type :</label>
    <select name="type" id="type">
        <option value="">Tous les types</option>
        <option value="Enduro">Enduro</option>
        <option value="Custom">Custom</option>
        <option value="Sportive">Sportive</option>
        <option value="Roadster">Roadster</option>
    </select>
    <button type="submit">Filtrer</button>
</form>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Modèle</th>
        <th scope="col">Type</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($motos as $moto): ?>
        <tr>
            <th scope="row"><?php echo $moto->getId(); ?></th>
            <td><?php echo htmlspecialchars($moto->getModel()); ?></td>
            <td><?php echo $moto->getType(); ?></td>
            <td>
                <img style="max-height: 100px" class="img-thumbnail" src="<?php echo (is_null($moto->getImage()) ? 'public/img/no-picture.png' : 'public/img/' . $moto->getImage()) ?>" alt="image de <?php echo $moto->getImage(); ?>">
            </td>
            <td>
                <a href="index.php?controller=moto&action=detail&id=<?php echo $moto->getId(); ?>">Voir la <?php echo $moto->getModel(); ?> </a><br>
                <a href="index.php?controller=moto&action=delete&id=<?php echo $moto->getId(); ?>">Supprimer la <?php echo $moto->getModel(); ?> </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include("View/parts/footer.php");
?>
