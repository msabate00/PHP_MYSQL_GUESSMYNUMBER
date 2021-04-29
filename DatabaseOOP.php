<?php
include_once 'DatabaseConnection.php';

/**
 * Implementació de la clase DatabaseConnection segons el model OOP,
 * Object Oriented Programming.
 *
 * @author Pep
 */
class DatabaseOOP extends DatabaseConnection {
    const TABLE_START = "<table style='border: solid 1px black;'><tr style='background: grey;'><th>Id</th><th>Modalitat</th><th>Nivell</th><th>Data</th><th>Intents</th></tr>";
    const TABLE_END = "</table>";
    
     public function __construct($servername, $username, $password, $database) {
        parent::__construct($servername, $username, $password);
        $this->database = $database;
    }
    //put your code here
    public function connect(): void {
        
        try {
          
            $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->database);
            // set the PDO error mode to exception
           
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

    public function insert($modalitat, $nivell, $intents): int {
       $sql = "INSERT INTO estadistiques (modalitat, nivell, intents) VALUES ('".$modalitat . "','". $nivell ."','". $intents . "')";
        //$sql = "delete from estadistiques";

        if ($this->connection->query($sql) === TRUE) {
            $sql = "SELECT max(id) FROM estadistiques";
            return mysqli_fetch_all($this->connection->query($sql))[0][0];
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }

    public function selectAll() {
        
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques";
        $result = $this->connection->query($sql);
        
        if ($result == TRUE) {
            return $result -> fetch_all();
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }
    function showAll($stmt){
        for($i = 0; $i<count($stmt); $i++){
            echo "<tr>";
            for($j = 0; $j <count($stmt[$i]); $j++){
                echo "<td style='width:150px;border:1px solid blue;background:silver;'>" . $stmt[$i][$j] . "</td>";
                
            }
            echo "</tr>";
            
            
            
        }
        
    }
    
    
    function getTypes(){
        $sql = "SELECT DISTINCT modalitat from estadistiques";
        $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        return $result->fetch_all();
        
        
        
    }
    
    
    
    public function delete($id) {
        $sql = "DELETE FROM estadistiques WHERE id=".$id;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        
    }

    public function findById($id) {
        $sql = "SELECT * FROM estadistiques WHERE id =" . $id;
        $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        
        if($result == TRUE){
           $r = $result->fetch_all();
           return $r[0];
        }else{
            echo $sql;
             var_dump($result);
        }
        
       
        return $result;
        
    }

     public function update(\estadistica $estadistica) {
        
        $sql = "UPDATE estadistiques SET modalitat ='".$estadistica->modalitat."',nivell='".$estadistica->nivell."', data_partida='".$estadistica->data."',intents='".$estadistica->intents."' WHERE id=". $estadistica->id;
        if ($this->connection != null) {
            $result = $this->connection->query($sql, MYSQLI_USE_RESULT);
        }
        
    }

}
