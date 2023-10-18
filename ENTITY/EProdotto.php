<?php
/**
 * Summary of EProdotto
 */
class EProdotto implements JsonSerializable{
    private $id;
    /**
     * Summary of titolo
     * @var 
     */
    private $titolo;
    /**
     * Summary of Descrizione
     * @var 
     */
    private $Descrizione;
    /**
     * Summary of Prezzo
     * @var 
     */
    private $Prezzo;
    /**
     * Summary of IDUtente
     * @var 
     */
    private $IDUtente;

    private $IDUtenteC;
    private $ControlloAcquisto;

    private $id_categ;
    
    public function __construct($id, $titolo, $Descrizione, $Prezzo, $IDUtente,$IDUtenteC=null, $ControlloAcquisto,$id_categ){
        $this->id=$id;
        $this->titolo=$titolo;
        $this->Descrizione=$Descrizione;
        $this->Prezzo=$Prezzo;
        $this->IDUtente=$IDUtente;
        $this->IDUtenteC=$IDUtenteC;
        $this->ControlloAcquisto=$ControlloAcquisto;
        $this->id_categ=$id_categ;        
    }

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPrezzo() {
		return $this->Prezzo;
	}
	
	/**
	 * @param mixed $Prezzo 
	 * @return self
	 */
	public function setPrezzo($Prezzo): self {
		$this->Prezzo = $Prezzo;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDescrizione() {
		return $this->Descrizione;
	}

	/**
	 * @param mixed $Descrizione 
	 * @return self
	 */
	public function setDescrizione($Descrizione): self {
		$this->Descrizione = $Descrizione;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTitolo() {
		return $this->titolo;
	}

	/**
	 * @param mixed $titolo
	 * @return self
	 */
	public function setTitolo($titolo): self {
		$this->titolo = $titolo;
		return $this;
	}
	/**
	 * @return mixed
	 */
	public function getIDUtenteC() {
		return $this->IDUtenteC;
	}
	
	/**
	 * @param mixed $IDUtenteC 
	 * @return self
	 */
	public function setIDUtenteC($IDUtenteC): self {
		$this->IDUtenteC = $IDUtenteC;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function getControlloAcquisto() {
		return $this->ControlloAcquisto;
	}
	
	/**
	 * @param bool $ControlloAcquisto 
	 * @return self
	 */
	public function setControlloAcquisto($ControlloAcquisto): self {
		$this->ControlloAcquisto = $ControlloAcquisto;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getIdCateg() {
		return $this->id_categ;
	}
	
	/**
	 * @param mixed $id_categ 
	 * @return self
	 */
	public function setIdCateg($id_categ): self {
		$this->id_categ = $id_categ;
		return $this;
	}
	/**
	 * @return mixed
	 */
	public function getIDUtente() {
		return $this->IDUtente;
	}
	
	/**
	 * @param mixed $IDUtente 
	 * @return self
	 */
	public function setIDUtente($IDUtente): self {
		$this->IDUtente = $IDUtente;
		return $this;
	}

	public function jsonSerialize()
    {
        return
            [
                'titolo'   => $this->getTitolo(),
                'Prezzo'   => $this->getPrezzo(),
                'Descrizione'   => $this->getDescrizione(),
                'IDUtente'   => $this->getIDUtente(),
                'IDUtenteC'   => $this->getIDUtenteC(),
                'id_categ'   => $this->getIdCateg(),
                'ControlloAcquisto'   => $this->getControlloAcquisto(),
				'id'   => $this->getId(),
                
            ];

    }
}


?>
