<?php
class EUtente implements JsonSerializable{


    private $Nome;
    private $Cognome;
    private $id;
    private $Password;
    private $Stato; //verifica il ban
    private $Email;
	private $Admin; //utente può essere admin (più di un admin)

    public function __construct($Nome=null, $Cognome=null, $id, $Password=null, $Stato=0, $Email=null,$Admin=null){
        $this->Nome=$Nome;
        $this->Cognome=$Cognome;
        $this->id=$id;
        $this->Password=$Password;
        $this->Stato=$Stato;
        $this->Email=$Email;
	    $this->Admin=$Admin;
     }




    /**
	 * @return mixed
	 */
	public function getNome() {
		return $this->Nome;
	}
	
	/**
	 * @param mixed $Nome 
	 * @return self
	 */
	public function setNome($Nome):void
	{
		$this->Nome = $Nome;
	}
    /**
	 * @return mixed
	 */
	public function getCognome() {
		return $this->Cognome;
	}
	
	/**
	 * @param mixed $Cognome 
	 * @return self
	 */
	public function setCognome($Cognome):void
	{
		$this->Cognome = $Cognome;
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
	public function setId($id): void {
		$this->id = $id;
	}
    /**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->Password;
	}
	
	/**
	 * @param mixed $Password 
	 * @return self
	 */
	public function setPassword($Password): void {
		$this->Password = $Password;
	}
	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->Email;
	}
	
	/**
	 * @param mixed $Email 
	 * @return self
	 */
	public function setEmail($Email): void{
		$this->Email = $Email;
	}
	/**
	 * @return mixed
	 */
	public function getStato() {
		return $this->Stato;
	}
	
	/**
	 * @param mixed $Stato 
	 * @return self
	 */
	public function setStato($Stato): void {
		$this->Stato = $Stato;
	}

	/**
	 * @return mixed 
	 */
	public function getAdmin() {
		return $this->Admin;
	}
	
	/**
	 * @param mixed $Admin 
	 * @return self
	 */
	public function setAdmin( $Admin): void {
		$this->Admin = $Admin;
	}
	 public function jsonSerialize()
    {
        return
            [
                'Nome'   => $this->getNome(),
                'Cognome' => $this->getCognome(),
                'id'   => $this->getId(),
                'Password'   => $this->getPassword(),
                'Stato'   => $this->getStato(),
                'Email'   => $this->getEmail()
            ];

    }
}

?>
