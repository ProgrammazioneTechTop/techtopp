<?php

/**
 * Summary of EFoto
 */
class EFotoUtente implements JsonSerializable
{
    /**
     * @var  id 
     */
    private  $id;
    /**
     * @var  nome Foto
     */
    private  $nomeFoto;
    /**
     * @var mixed dimensione Foto
     */
    private $size;
    /**
     * @var mixed MIME type Foto
     */
    private $tipo;
    /**
     * @var mixed Foto
     */
    private $foto;
    private $idUtente;

    //

    public function __construct( $id,  $nomeFoto,  $size, $tipo, $foto,$idUtente)
    {
        $this->id = $id;
        $this->nomeFoto = $nomeFoto;
        $this->size = $size;
        $this->tipo = $tipo;
        $this->foto = $foto;
        $this->idUtente = $idUtente;
    }

    public function getidUtente(){
        return $this->idUtente;}

    public function setidUtente($idUtente){
    $this->idUtente=$idUtente;
    }

    /**
     * @return  id 
    */
        public function getId()
    {
        return $this->id;
    }

    /**
     * @param  $id id 
     */
    public function setId($id): void
    {
        $this->idFoto = $id;
    }

    /**
     * @return  nome Foto
     */
    public function getNomeFoto()
    {
        return $this->nomeFoto;
    }

    /**
     * @param  $nomeFoto nome Foto
     */
    public function setNomeFoto($nomeFoto): void
    {
        $this->nomeFoto = $nomeFoto;
    }

    /**
     * @return mixed dimensione Foto
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size dimensione Foto
     */
    public function setSize($size): void
    {
        $this->size = $size;
    }

    /**
     * @return mixed MIME type Foto
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo MIME type Foto
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed Foto
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto Foto
     */
    public function setFoto($foto): void
    {
        $this->foto = $foto;
    }
    

    public function jsonSerialize ()
    {
        return
            [
                'id'   => $this->getId(),
                'nomeFoto' => $this->getNomeFoto(),
                'size' => $this->getSize(),
                'tipo'  =>  $this->getTipo(),
                'foto'  =>  $this->getFoto(),
                'idUtente'   => $this->getidUtente()
            ];
    }




}
