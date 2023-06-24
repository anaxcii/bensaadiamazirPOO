<?php
class Moto{
    private $id;
    private $model;
    private $type;
    private $image;

    /**
     * moto constructor.
     * @param $id
     * @param $model
     * @param $type
     * @param $image
     */
    public function __construct($id, $model, $type, $image)
    {
        $this->id = $id;
        $this->model = $model;
        $this->type = $type;
        $this->image = $image;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return htmlentities($this->model);
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return htmlspecialchars($this->type);
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void
    {
        $this->image = $image;
    }

}
?>