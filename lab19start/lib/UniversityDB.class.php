<?php
/*
   Handles database access for the Universities  table. 

 */
class UniversityDB 
{  
    
    private $connection  = null;
    
    private static $baseSQL = "SELECT * FROM universities";
    private static $constraint = 'order by Name LIMIT 20';
    
    public function __construct($connection) {
        $this->connection  = $connection;
    }      

    public function findById($id)
    {
        $sql = self::$baseSQL .  'WHERE UniversityID=?';
        $statement = DatabaseHelper::runQuery($this->connection , $sql, Array($id));
        return $statement->fetch();
        
    }
    public function getAll()
    {
        $sql = self::$baseSQL . self::$constraint;
        $statement = DatabaseHelper::runQuery($this->connection , $sql, null);
        return $statement->fetchAll();        
    }    

}

?>