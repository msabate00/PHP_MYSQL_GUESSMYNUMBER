<?php

include_once 'DatabaseConnection.php';

/*
 * Implementació de la clase DatabaseConnection segons el model PDO, 
 * PHP Data Object.
 * @author Pep
 */

class DatabasePDO extends DatabaseConnection {

    const TABLE_START = "<table style='border: solid 1px black;'><tr style='background: grey;'><th>Id</th><th>Modalitat</th><th>Nivell</th><th>Data</th><th>Intents</th></tr>";
    const TABLE_END = "</table>";

    private $database;

    public function __construct($servername, $username, $password, $database) {
        parent::__construct($servername, $username, $password);
        $this->database = $database;
    }

    function connect(): void {
        try {
            $this->connection = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

    function insert($modalitat, $nivell, $intents): int {
        try {
            // prepare sql and bind parameters
            $stmt = $this->connection->prepare("INSERT INTO estadistiques (modalitat, nivell, intents) VALUES (:modalitat, :nivell, :intents)");
            $stmt->bindParam(':modalitat', $modalitat);
            $stmt->bindParam(':nivell', $nivell);
            $stmt->bindParam(':intents', $intents);
            $stmt->execute();
            return $this->connection->lastInsertId();
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }

    function selectAll() {
        $stmt = $this->connection->prepare("SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques");
        $stmt->execute();
        // set the resulting array to associative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }
    
    function showAll($stmt){
         foreach (new EstadistiquesRow(new RecursiveArrayIterator($stmt->fetchAll())) as $key => $row) {
                echo $row;
            }
        
    }
    
    public function delete($id) {
        $stmt = $this->connection->prepare("DELETE FROM estadistiques WHERE id = :id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        
    }

    public function findById($id) {
        $stmt = $this->connection->prepare("SELECT * FROM estadistiques WHERE id = :id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        return $stmt;
    }

    public function update(\estadistica $estadistica) {
        //UPDATE t1 SET col1 = col1 + 1, col2 = col1;
        $stmt = $this->connection->prepare("UPDATE estadistiques SET modalitat ='".$estadistica->modalitat."',nivell='".$estadistica->nivell."', data_partida='".$estadistica->data."',intents='".$estadistica->intents."' WHERE id=". $estadistica->id);
        $stmt->execute();
    }

}

/*
    function createTable($table_sql) {
        try {
            $this->connection->exec($table_sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
     */

    /*
    function insert($modalitat, $nivell, $intents) {
        $sql = "INSERT INTO estadistiques (modalitat, nivell, intents) VALUES ('$modalitat', $nivell, $intents)";
        try {
            $this->connection->exec($sql);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
     */