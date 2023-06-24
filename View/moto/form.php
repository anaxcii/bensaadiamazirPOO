<?php include("View/parts/header.php");
?>
<h1>Ajouter une moto</h1>
<a href="index.php?controller=moto&action=list">Retour sur le listing</a><br>

<form method="post" enctype="multipart/form-data">
    <div class="col-md-12 mt-2">
        <label for="model">
            Model
        </label>
        <input class="form-control
        <?php
        if(array_key_exists("model", $errors)){echo('is-invalid');}?>"
               value="<?php if(array_key_exists("model", $_POST)){echo($_POST["model"]);}?>"
               type="text" name="model" id="model">

        <div class="invalid-feedback">
            <?php
            if(array_key_exists("model", $errors)){
                echo($errors["model"]);
            }
            ?>
        </div>
    </div>

    <div class="col-md-12 mt-2">
        <label for="energy">Type</label>
        <select class="form-select
<?php
        if(array_key_exists("energy", $errors)){echo('is-invalid');}?>" id="type" name="type">
            <?php
            foreach (MotoController::$types as $type) {
                echo('<option value="'.$type.'">'.$type.'</option>');
            }
            ?>
        </select>

        <div class="invalid-feedback">
            <?php
            if(array_key_exists("type", $errors)){
                echo($errors["type"]);
            }
            ?>
        </div>
    </div>

    <div class="col-md-12 mt-2">
        <label for="image">
            Photo de la moto
        </label>

        <input class="form-control
          <?php if(array_key_exists("image", $errors)){echo('is-invalid');}?>"" id="image" type="file" name="image">

        <div class="invalid-feedback">
            <?php
            if(array_key_exists("image", $errors)){
                echo($errors["image"]);
            }
            ?>

        </div>
    </div>

    <input class="btn btn-success mt-2" type="submit">
</form>

<?php include("View/parts/footer.php");
?>