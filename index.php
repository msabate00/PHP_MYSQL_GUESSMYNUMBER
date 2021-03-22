<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
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
    </body>
</html>
