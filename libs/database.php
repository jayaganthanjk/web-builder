<?php
class Database extends PDO{

    public function __construct() {
        $dbname=dbname;
        $dsn = 'mysql:dbname='.$dbname.';host=127.0.0.1';
        $user = 'root';
        $password = '';
        
       try{
        parent::__construct($dsn, $user, $password) ;
        }
        catch(Exception $e){
            header('Location:inception.php');
        }
     }
}
?>