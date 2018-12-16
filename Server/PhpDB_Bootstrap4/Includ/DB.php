<?php
/**
 * 
 */
class DB
{
    public $servername = "localhost";
    public $dbname="test";
    public $username = "root";
    public $password = "";

 


    public function Check_Input($data) {
        
            if (empty($data)) {
                $data = "";
            } else {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
            }
     

        return $data;
      }


    public function Exec($sql)
    {
        
    try {
        $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname",
        $this->username, 
        $this->password);
    
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conn->exec($sql);
     echo "Database created successfully";

        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }



        $conn = null;


    }



}

?>