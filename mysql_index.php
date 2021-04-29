<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script>
            window.onload = function () {
                showDataBase("ninguno");
            };


            function showDataBase(str) {
                if (str === "") {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState === 4 && this.status === 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "ajax_bbdd.php?q=" + str, true);
                    xmlhttp.send();
                }
            }
        </script>


    </head>
    <body>
        <p>Volver al Menu Anterior: <a href="index.php">Volver</a></p>

        <?php
        include_once 'DatabasePDO.php';
        include_once 'DatabaseProc.php';
        include_once 'DatabaseOOP.php';
        include_once 'EstadistiquesRow.php';
        $db = null;
        try {
            echo "<h1>PHP MySQL</h1>";
            // echo "<h2>Inserció</h2>";
            $db = new DatabaseOOP("localhost:3306", "root", "1234", "m07uf3");
            $db->connect();
            $a = $db->getTypes();
            echo "Filtrar por modalidad:  ";
            echo "<select onchange='showDataBase(this.value)'>";
            echo "<option value='ninguno'>Todos</option>";
            for ($i = 0; $i < count($a); $i++) {
                echo "<option value='" . $a[$i][0] . "'>" . $a[$i][0] . "</option>";
            }
            echo "</select>";
            ?>
            <form action="./mysql_index.php" method="post">
                <table>
                    <tr>
                        <td>Delete:</td>
                        <td><input type="number" placeholder="id" name="id"></td>
                        <td><input type="submit" value="Ejecutar" formaction="./deleteFunction.php"></td>
                    </tr>
                    <tr>
                        <td>FindById:</td>
                        <td><input type="number" placeholder="id" name="id2"></td>
                        <td><input type="submit" value="Ejecutar" formaction="./findFunction.php"></td>
                    </tr>
                    <tr>
                        <td>Update:</td>
                        <td><input type="number" placeholder="id" name="id3"></td>
                        <td>
                            <select name="moda">
                                <option value="HUMA">HUMA</option>
                                <option value="MAQUINA">MAQUINA</option>
                            </select>
                        </td>
                        <td><input type="number" placeholder="Nivell" name="nivell" max="3" min="1"></td>
                        <td><input type="date" placeholder="Data" name="date"></td>
                        <td><input type="number" placeholder="Intents" name="intents" min="1"></td>
                        <td><input type="submit" value="Ejecutar" formaction="./updateFunction.php"></td>
                    </tr>
                </table>
            </form>


            <?php
            echo "<h2>Estadístiques</h2>";
            //echo DatabaseProc::TABLE_START;
            //$stmt = $db->selectAll();
            echo "<div id='txtHint'></div>";
            //$db->showAll($stmt);

            /*  foreach (new EstadistiquesRow(new RecursiveArrayIterator($stmt->fetchAll())) as $key => $row) {
              echo $row;
              } */
        } catch (Exception $error) {
            echo "connection failed: " . $error->getMessage();
        }
        DatabaseProc::TABLE_END
        ?>

    </body>
</html>
