<!DOCTYPE html>
<html>
    <head>
        <style>
            #ta {
                width: 100%;
                border-collapse: collapse;
            }

            #ta, #ta td, #ta #th {
                border: 1px solid black;
                padding: 5px;
            }

            th {text-align: left;}
        </style>
    </head>
    <body>

        <?php
        $q = $_GET['q'];

        $con = mysqli_connect("localhost:3306", "root", "1234", "m07uf3");
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

       if($q != "ninguno"){
           $sql = "SELECT * FROM estadistiques WHERE modalitat = '" . $q . "'";
       }else{
           $sql = "SELECT * FROM estadistiques";
       }
        
        $result = mysqli_query($con, $sql);

        echo "<table id='ta'>
<tr>
<th>Id</th>
<th>Modalitat</th>
<th>Nivell</th>
<th>Data_Partida</th>
<th>Intents</th>
</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['modalitat'] . "</td>";
            echo "<td>" . $row['nivell'] . "</td>";
            echo "<td>" . $row['data_partida'] . "</td>";
            echo "<td>" . $row['intents'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_close($con);
        ?>
    </body>
</html>
