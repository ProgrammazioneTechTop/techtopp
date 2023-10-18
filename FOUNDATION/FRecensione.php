<?php

class FRecensione extends FDatabase{
    private static $table = "recensione";

    private static $class = "FRecensione";
    //valori da modificare in base ai campi della tabella recensioni nel database
    private static $values = "(:id, :Valutazione, :Messaggio,  :IDMittente, :IDDestinatario)";

   
    public static function getClass(): string
    {
        return self::$class;
    }

  
    public static function getTable(): string
    {
        return self::$table;
    }

    public static function getValues(): string
    {
        return self::$values;
    }
    //metodo che permette l'inserimento di una nuova recensione nel db
    //da modificare in base agli attributi della recensione
    public static function bind($stmt, ERecensione $recensione){
        $stmt->bindValue(':id',$recensione->getId(), PDO::PARAM_INT);  
        $stmt->bindValue(':Valutazione',$recensione->getValutazione(), PDO::PARAM_INT);
        $stmt->bindValue(':Messaggio',$recensione->getMessaggio(), PDO::PARAM_STR);
        $stmt->bindValue(':IDMittente',$recensione->getIDMittente(), PDO::PARAM_INT);
        $stmt->bindValue(':IDDestinatario',$recensione->getIDDestinatario(), PDO::PARAM_INT); //idRecensione venditore
    }
    //store di una recensione
    public static function insert($rec) {
        $db = parent::getInstance();
        $id = $db->insertDB(self::class,$rec);
        $rec->setId($id);
    }
    //verifica l'esistenza di una determinata recensione nel db
    public static function exist($field, $id) {
        $ris = false;
        $db = parent::getInstance();
        $result = $db->existDB(self::$class,$field, $id);
        if($result!=null)
            $ris = true;
        return $ris;
    }
    //elimina una determinata recensione nel db in base all'ID
    public static function delete($field, $id) {
        $db = parent::getInstance();
        $result = $db->deleteDB(self::$class,$field, $id);
        if($result)
            return true;
        else
            return false;
    }
    //cerca una determinata recensione dal db
    public static function search($parametri=array(), $ordinamento='', $limite=''){
        $db = parent::getInstance();
        $result = $db->searchDB(self::$class, $parametri, $ordinamento, $limite);
        return $result;
    }
    //update di una determinata recensione nel db, permette di aggiornare alcuni campi di una recensione (ci serve veramente??)
    public static function update($field, $newvalue, $primkey, $val){
        $db = parent::getInstance();
        $result = $db->updateDB(self::getClass(), $field, $newvalue, $primkey, $val);
        if ($result) return true;
        else return false;
    }
    //stampa di tutte le recensioni presenti nel database
    public static function loadAll() {
        $rec = null;
        $db = FDatabase::getInstance();
        list ($result, $rows_number)=$db->getAllRev();
        if(($result != null) && ($rows_number == 1)) {
            $rec = new ERecensione($result['id'], $result['Valutazione'], $result['Messaggio'], $result['IDMittente'],$result['IDDestinatario']);
            $rec->setId($result['id']);
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $rec = array();
                for($i = 0; $i < count($result); $i++){
                    $rec[] = new ERecensione($result[$i]['id'], $result[$i]['Valutazione'],  $result[$i]['Messaggio'],$result[$i]['IDMittente'],$result[$i]['IDDestinatario']);
                    $rec[$i]->setId($result[$i]['id']);
                }
            }
        }
        return $rec;
    }
    public static function loadByField($parametri = array(), $ordinamento = '', $limite = ''){
        $recensione = null;
        $db = parent::getInstance();
        $result = $db->searchDB(static::getClass(), $parametri, $ordinamento, $limite);
        if (sizeof($parametri) > 0) {
            $rows_number = $db->getRowNum(static::getClass(), $parametri);

        } else {
            $rows_number = $db->getRowNum(static::getClass());
        }
        if(($result != null) && ($rows_number == 1)) {
            $recensione = new ERecensione($result['id'], $result['Valutazione'], $result['Messaggio'], $result['IDMittente'],$result['IDDestinatario']);
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $recensione = array();
                for($i = 0; $i < count($result); $i++){
                    $recensione[] = new ERecensione($result[$i]['id'], $result[$i]['Valutazione'],  $result[$i]['Messaggio'],$result[$i]['IDMittente'],$result[$i]['IDDestinatario']);
                }
            }
        }
        return $recensione;
    }


}

?>
