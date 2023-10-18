<?php

class FFotoProdotto extends FDatabase{
    private static $table = "fotoprodotti";

    private static $class = "FFotoProdotto";
    //da modificare in base ai campi da inserire nella tabella per la foto prodotto
    private static $values = "(:id, :nomeFoto, :size, :tipo, :foto,:idProdotto)";

    public static function getTable(): string
    {
        return self::$table;
    }

    public static function getClass(): string
    {
        return self::$class;
    }

    public static function getValues(): string
    {
        return self::$values;
    }

    public static function bind($stmt, EFotoProdotto $FotoProdotto, $nome_file){
        $path = $_FILES[$nome_file]['tmp_name'];
        
        $file = fopen($path, 'rb') or die ("Attenzione! Impossibile da aprire!");
        $stmt->bindValue(':id', NULL, PDO::PARAM_INT);
        $stmt->bindValue(':nomeFoto', $FotoProdotto->getNomeFoto(), PDO::PARAM_STR);
        $stmt->bindValue(':size', $FotoProdotto->getSize(), PDO::PARAM_STR);
        $stmt->bindValue(':tipo', $FotoProdotto->getTipo(), PDO::PARAM_STR);
        $stmt->bindValue(':foto', fread($file, filesize($path)), PDO::PARAM_LOB);
        $stmt->bindValue(':idProdotto',$FotoProdotto->getidProdotto(), PDO::PARAM_INT);
        unset($file);
        unlink($path);
    }
    //salva una foto nel database
    /*public static function storeMedia(EFoto $foto, $nomeFoto){
        $db = parent::getInstance();
        $id=$db->storeMediaDB(static::getClass(), $foto, $nomeFoto);
        $FotoProdotto->setIdFoto($id);
    }*/
    public static function insert($object, $nome_file){
        $db = parent::getInstance();
        $id = $db->storeMedia(self::$class, $object, $nome_file);
        $object->setId($id);}
    //verifica l'esistenza di una determinata foto nel database
    public static function exist($field, $id) {
        $db = parent::getInstance();
        $result = $db->existDB(static::getClass(), $field, $id);
        if ($result != null)
            return true;
        else
            return false;
    }
    //elimina una determinata foto dal database
    public static function delete($field, $id) {
        $db = parent::getInstance();
        $db->deleteDB(static::getClass(), $field, $id);
    }

// Metodo che carica una foto dal DB sulla base di un dato attributo
    public static function loadByField($parametri = array(),  $ordinamento='',  $limite='') {
        $fotoprodotti = null;
        $db = parent::getInstance();
        $result = $db->searchDB(static::getClass(), $parametri, $ordinamento, $limite);
        $rows_number = $db->getRowNum(static::getClass(), $parametri, $ordinamento, $limite);
        if (($result != null) && ($rows_number == 1)) {
            $fotoprodotti = new EFotoProdotto($result['id'], $result['nomeFoto'], $result['size'], $result['tipo'], base64_encode($result['foto']), $result['idProdotto']);
        }
        else {
            if (($result != null) && ($rows_number > 1)) {
                $fotoprodotti = array();
                for ($i = 0; $i < sizeof($result); $i++) {
                    $fotoprodotti[] = new EFotoProdotto($result[$i]['id'], $result[$i]['nomeFoto'], $result[$i]['size'], $result[$i]['tipo'], base64_encode($result[$i]['foto']),$result[$i]['idProdotto']);

                }
            }
        }
        return $fotoprodotti;
    }
    //cerca una determinata foto nel database
    public static function search($parametri = array(), string $ordinamento, string $limite) {
        $db = parent::getInstance();
        $result = $db->searchDB(self::getClass(), $parametri, $ordinamento, $limite);
        return $result;
    }
    // Metodo che restituisce il numero di tuple risultanti di una query
    public static function getRows($parametri=array(), string $ordinamento, string $limite) {
        $db = parent::getInstance();
        $result = $db->getRowNum(self::getClass(), $parametri, $ordinamento, $limite);
        return $result;
    }
    
    public static function update($field, $newvalue, $pk, $val){
        $db = parent::getInstance();
        $result = $db->updateDB(self::getClass(), $field, $newvalue, $pk, $val);
        if ($result) return true;
        else return false;
    }
}


?>
