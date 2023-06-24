<?php
class MotoController {
    private $motoManager;

    public static $types = [
        'Enduro',
        'Custom',
        'Sportive',
        'Roadster'
    ];

    public static $allowedFile = [
        "image/jpeg",
        "image/png"
    ];

    public function __construct() {
        $this->motoManager = new MotoManager();
    }

    public function list() {
        $typeFilter = isset($_GET['type']) ? $_GET['type'] : null;
        $motos = $this->motoManager->getAll($typeFilter);

        require 'View/moto/list.php';
    }

    public function detail($id) {
        $moto = $this->motoManager->getOne($id);

        if (is_null($moto)) {
            header("Location: index.php?controller=default&action=not-found");
            die();
        }

        require 'View/moto/detail.php';
    }

    public function delete($id) {
        $moto = $this->motoManager->getOne($id);

        if (is_null($moto)) {
            header("Location: index.php?controller=default&action=not-found");
            die();
        }

        $this->motoManager->delete($moto);
        header("Location: index.php?controller=moto&action=list");
    }

    public function ajout() {
        $errors = [];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Je vérifie qu'un modèle est saisi
            if (empty($_POST["model"])) {
                $errors["model"] = 'Veuillez saisir un modèle';
            }
            // Je vérifie que le modèle ne fait pas plus de 250 caractères
            if (strlen($_POST["model"]) > 250) {
                $errors["model"] = 'Veuillez choisir un modèle';
            }
            // Je vérifie qu'un type est saisi
            // Je vérifie que le type saisi est dans la liste
            if (!in_array($_POST["type"], self::$types)) {
                $errors["type"] = "Veuillez choisir un type disponible";
            }

            if (count($errors) == 0) {
                $moto = new Moto(null, $_POST["model"], $_POST["type"], null);

                if ($_FILES["image"]["error"] != 4) {
                    if (!in_array($_FILES["image"]['type'], self::$allowedFile)) {
                        $errors["image"] = "Nous acceptons seulement les fichiers JPEG / PNG";
                    }

                    if ($_FILES["image"]['error'] != 0) {
                        $errors["image"] = "Une erreur s'est produite pendant l'upload";
                    }

                    if ($_FILES["image"]["size"] > 2000000) {
                        $errors["image"] = "L'image est trop lourde, elle doit faire moins de 2Mo";
                    }

                    if (count($errors) == 0) {
                        $filename = uniqid() . '.' . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                        move_uploaded_file($_FILES["image"]["tmp_name"], 'public/img/' . $filename);
                        $moto->setImage($filename);
                    }
                }

                if (count($errors) == 0) {
                    $this->motoManager->add($moto);
                    header("Location: index.php?controller=moto&action=list");
                    die();
                }
            }
        }

        require 'View/moto/form.php';
    }
}

?>
