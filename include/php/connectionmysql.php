<?php
/**
* Connection to Mysql database
* 
* @author Архипенко Виталий Олегович <arhipenko.vitaliu@gmail.com>
* @version 1.0
*/
class ConnectionMysql
{
    private $host;
    private $dbName;
    private $user;
    private $password;
     
    private $dbh;

    /**
    * Construct 
    * 
    * @param string $host Host name
    * @param string $dbName Database name
    * @param string $user User name
    * @param string $password Password
    */
    function __construct($host = 'localhost', $dbName = 'data_tasks', $user= 'client_php', $password= 'LdaA69BxH5BnXFpT')
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->user = $user;
        $this->password = $password;
    }

    /**
    * Connect to Mysql database
    *
    * The method creates a PDO instance, representing a connection to the database.
    * 
    * @return object
    */
    function connectMysql()
    {
        try 
        {
            $this->dbh = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->password);
        } 
        catch (PDOException $e) 
        {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return $this->dbh;
    }
}
?>