<?php include("View/parts/header.php");
?>
<h1>Moto : <?php echo($moto->getModel());?></h1>
<a href="index.php?controller=moto&action=list">Retour sur le listing</a><br>
<img src="<?php echo(is_null($moto->getImage()) ? 'public/img/no-picture.png':
    'public/img/'.$moto->getImage())?>" alt="image de <?php echo($moto->getImage());?>">

<ul>
    <li><u>Type :</u> <?php echo($moto->getType());  ?></li>

</ul>

<?php include("View/parts/footer.php");
?>