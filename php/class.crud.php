<?php
/**
 * Created by PhpStorm.
 * User: Guillermo David
 * Date: 12/07/2015
 * Time: 05:52 PM
 */

class crud
{
    private $db;

    function __construct($DB_con)
    {
        $this->db = $DB_con;
    }

    public function create($name, $surname, $password,$email)
    {
        try
        {
            $stmt = $this->db->prepare("insert into user(name, surname, password, email) values(:name,:surname,:password,:email)");
            $stmt->bindparam(":name", $name);
            $stmt->bindparam(":surname", $surname);
            $stmt->bindparam(":password", $password);
            $stmt->bindparam(":email", $email);
            $stmt->execute();
            return true;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }
}

?>