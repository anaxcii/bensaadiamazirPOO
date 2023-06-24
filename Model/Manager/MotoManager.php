<?php
class MotoManager extends DbManager {
    public function getAll($typeFilter = null) {
        $query = $this->bdd->prepare("SELECT * FROM moto" . ($typeFilter ? " WHERE type = :type" : ""));
        if ($typeFilter) {
            $query->bindParam(":type", $typeFilter);
        }
        $query->execute();
        $res = $query->fetchAll();

        $motos = [];

        foreach ($res as $moto) {
            $motos[] = new Moto($moto["id"], $moto["model"], $moto["type"], $moto["image"]);
        }

        return $motos;
    }

    public function getOne($id) {
        $query = $this->bdd->prepare("SELECT * FROM moto WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        $result = $query->fetch();

        $moto = null;

        if ($result) {
            $moto = new Moto($result["id"], $result["model"], $result["type"], $result["image"]);
        }

        return $moto;
    }

    public function delete($moto) {
        $id = $moto->getId();
        $query = $this->bdd->prepare("DELETE FROM moto WHERE id = :id");

        $query->bindParam(":id", $id);
        $query->execute();
    }

    public function add($moto) {
        $model = $moto->getModel();
        $type = $moto->getType();
        $image = $moto->getImage();

        $query = $this->bdd->prepare("INSERT INTO moto (model, type, image) VALUES (:model, :type, :image)");
        $query->bindParam(":model", $model);
        $query->bindParam(":type", $type);
        $query->bindParam(":image", $image);

        $query->execute();
    }
}

?>