<?php

class ERecensione implements JsonSerializable{
    private $id;
    private $Valutazione;
    private $Messaggio;
    private $IDMittente;
    private $IDDestinatario;

    public function __construct($id=null,$Valutazione,$Messaggio,$IDMittente,$IDDestinatario){
        $this->id=$id;
        $this->Valutazione=$Valutazione;
        $this->Messaggio=$Messaggio;
        $this->IDMittente=$IDMittente;
        $this->IDDestinatario=$IDDestinatario;

    }
	/**
	 * @return mixed
	 */
	public function getIDDestinatario() {
		return $this->IDDestinatario;
	}
	
	/**
	 * @param mixed $IDDestinatario 
	 * @return self
	 */
	public function setIDDestinatario($IDDestinatario): self {
		$this->IDDestinatario = $IDDestinatario;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getIDMittente() {
		return $this->IDMittente;
	}
	
	/**
	 * @param mixed $IDMittente 
	 * @return self
	 */
	public function setIDMittente($IDMittente): self {
		$this->IDMittente = $IDMittente;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMessaggio() {
		return $this->Messaggio;
	}

	/**
	 * @param mixed $Messaggio 
	 * @return self
	 */
	public function setMessaggio($Messaggio): self {
		$this->Messaggio = $Messaggio;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getValutazione() {
		return $this->Valutazione;
	}

	/**
	 * @param mixed $Valutazione 
	 * @return self
	 */
	public function setValutazione($Valutazione): self {
		$this->Valutazione = $Valutazione;
		return $this;
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
    public function jsonSerialize()
    {
        return
            [
                'id'   => $this->getId(),
                'Valutazione' => $this->getValutazione(),
                'Messaggio'   => $this->getMessaggio(),
                'IDMittente'   => $this->getIDMittente(),
                'IDDestinatario' => $this->getIDDestinatario(),
            ];
    }
}

?>