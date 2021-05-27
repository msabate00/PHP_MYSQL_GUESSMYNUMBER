<!DOCTYPE html>
<!--
CREATE TABLE `estadistiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modalitat` varchar(32) NOT NULL,
  `nivell` int(2) DEFAULT 1,
  `data_partida` datetime DEFAULT current_timestamp(),
  `intents` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
   
        <form action="./tratado.php" method="post">
                <p>Selecciona momdalidad:</p>
                <input type="radio" id="male" name="modalidad" value="maquina">
                <label for="maquina">La Maquina Tiene que Adivinar el Numero</label><br>
                <input type="radio" id="female" name="modalidad" value="jugador">
                <label for="jugador">El Jugador Tiene que Adivinar el Numero</label><br>
                <br>
                <input type="radio" id="male" name="nivel" value="10" required>
                <label for="uno">NIVEL 1</label><br>
                <input type="radio" id="female" name="nivel" value="50" required>
                <label for="dos">NIVEL 2</label><br>
                <input type="radio" id="female" name="nivel" value= "100" required>
                <label for="tres">NIVEL 3</label><br><br><br>
                <input type="submit" value="Submit">
         </form> 
        
        <form action="./mysql_index.php" method="post">
            <input type="submit" value="Mostrar Estadisticas" />
         <!--   <table>
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
            </table>-->
        </form> 
        <br><br>
        <form action="credits.php">
    <input type="submit" value="Credits" />
</form>
               
        
        
        
        
    </body>
</html>
