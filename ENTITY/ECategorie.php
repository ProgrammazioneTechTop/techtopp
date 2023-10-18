<?php


class ECategorie implements JsonSerializable
{
    private $id_categ;
    private $categoria;

    /**
     * @param $categoria
     */
    public function __construct($categoria){
        $this->categoria = $categoria;
    }
    /**
     * @return mixed
     */
    public function getCategoria(){
        return $this->categoria;
    }

    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria): void{
        $this->categoria = $categoria;
    }

    /**
     * Get the value of id_categ
     */ 
    public function getId()
    {
        return $this->id_categ;
    }

    /**
     * Set the value of id_categ
     *
     * @return  self
     */ 
    public function setId($id_categ)
    {
        $this->id_categ= $id_categ;

        return $this;
    }
    public function JsonSerialize()
    {
        return[
            'id_categ' => $this->getId(),
            'categoria' => $this->getCategoria()
        ];
    }
}
