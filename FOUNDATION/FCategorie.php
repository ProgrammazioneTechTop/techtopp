<?php 

class FCategorie extends FDatabase{
    private static $table = 'categorie';

    private static $class = 'FCategorie';

    private static $values = '(:id_categ, :categoria)';

    public function __construct(){
    }

    /**
     * @return string
     */
    public static function getTable(): string
    {
        return self::$table;
    }

    /**
     * @return string
     */
    public static function getClass(): string
    {
        return self::$class;
    }

    /**
     * @return string
     */
    public static function getValues(): string
    {
        return self::$values;
    }

    /**
     * @param PDOStatement $stmt
     * @param ECategorie $categorie
     */
    public static function bind($stmt, ECategorie $categorie){
        $stmt->bindValue(':id_categ',NULL, PDO::PARAM_INT);
        $stmt->bindValue(':categoria', $categorie->getCategoria(), PDO::PARAM_STR);
        
    }

    public static function loadByField($parametri = array(), $ordinamento = '', $limite = ''){
        $categoria = null;
        $db = parent::getInstance();
        $result = $db->searchDB(self::class, $parametri, $ordinamento, $limite);
        if (sizeof($parametri) > 0) {
            $rows_number = $db->getRowNum(self::class, $parametri);
        } else {
            $rows_number = $db->getRowNum(self::class);
        }
        if(($result != null) && ($rows_number == 1)) {
            $categoria = new ECategorie($result['categoria']);
            $categoria->setId($result['id_categ']);
        }
        else {
            if(($result != null) && ($rows_number > 1)){
                $categoria = array();
                for($i = 0; $i < sizeof($result); $i++){
                    $categoria[] = new ECategorie($result[$i]['categoria']);
                    $categoria[$i]->setId($result[$i]['id_categ']);
                }
            }
        }
        return $categoria;
    }

    public static function insert($object){
        $db = parent::getInstance();
        $id = $db->insertDb(self::$class, $object);
        $object->setId($id);
    }

    public static function update($field, $newvalue, $pk, $val){
        $db = parent::getInstance();
        $result = $db->updateDB(self::getClass(), $field, $newvalue, $pk, $val);
        if ($result) return true;
        else return false;
    }

    public static function delete($field, $id){
        $db = parent::getInstance();
        $result = $db->deleteDB(self::getClass(), $field, $id);
        if ($result) return true;
        else return false;
    }

    public static function exist($field, $id){
        $db = parent::getInstance();
        $result = $db->existDB(self::getClass(), $field, $id);
        if ($result != null) return true;
        else return false;
    }

    public static function search($parametri=array(), $ordinamento='', $limite=''){
        $db = parent::getInstance();
        $result = $db->searchDb(self::$class, $parametri, $ordinamento, $limite);
        return $result;
    }
}

?>
