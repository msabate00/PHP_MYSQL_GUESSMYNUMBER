<?php
include_once 'DatabaseConnection.php';

/**
 * Implementació de la clase DatabaseConnection segons el model Procedimental.
 *
 * @author Pep
 */
class DatabaseProc extends DatabaseConnection {
     const TABLE_START = "<table style='border: solid 1px black;'><tr style='background: grey;'><th>Id</th><th>Modalitat</th><th>Nivell</th><th>Data</th><th>Intents</th></tr>";
    const TABLE_END = "</table>";
    
    
    public function __construct($servername, $username, $password, $database) {
        parent::__construct($servername, $username, $password);
        $this->database = $database;
    }
//put your code here
    public function connect(): void {
       
        try {
            $this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
            // set the PDO error mode to exception
           
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
        
       
    }

    public function insert($modalitat, $nivell, $intents): int {
        $sql = "INSERT INTO estadistiques (modalitat, nivell, intents) VALUES ('".$modalitat . "','". $nivell ."','". $intents . "')";
        if (mysqli_query($this->connection, $sql)) {
              $sql = "SELECT max(id) FROM estadistiques";
             return mysqli_fetch_all(mysqli_query($this->connection, $sql))[0][0];
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }

    public function selectAll() {
        $sql = "SELECT id, modalitat, nivell, data_partida, intents FROM estadistiques";
        if ($resu = mysqli_query($this->connection, $sql)) {
            
            return mysqli_fetch_all($resu);
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }
    
    public function delete($id) {
        $sql = "DELETE FROM estadistiques WHERE id=".$id;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
        }
    }

    public function findById($id) {
        $sql = "SELECT * FROM estadistiques WHERE id =" . $id;
        $result = mysqli_query($this->connection, $sql);
        
        return $result;
    }

     public function update(\estadistica $estadistica) {
        
        $sql = "UPDATE estadistiques SET modalitat ='".$estadistica->modalitat."',nivell='".$estadistica->nivell."', data_partida='".$estadistica->data."',intents='".$estadistica->intents."' WHERE id=". $estadistica->id;
        if ($this->connection != null) {
            $result = mysqli_query($this->connection, $sql);
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

}
