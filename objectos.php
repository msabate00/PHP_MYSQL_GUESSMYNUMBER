<?php
session_start();
include_once 'DatabasePDO.php';
include_once 'DatabaseProc.php';
include_once 'DatabaseOOP.php';
include_once 'EstadistiquesRow.php';
class Maquina{
    
    private $random = 0;
    private $mist = array();
    
    private $intentos;
    
    private $rango;
    public $mode;
    private $primer;
    

     function __construct($max, $mode) {
        $this->rango = $max;
        $this->mode = $mode;
        $this->intentos = 0;
        $this->primer = true;
        if($mode == "jugador"){
            $this->generarRandom($this->rango);   
        }else{
            $this->mist[0] = 0;
        }
        
    }
    
    private function generarRandom($max){
        $this->random = rand(1, $max);
    }
    
    public function getRandom(){
        return $this->random;
    }
    public function paso($dado){
        $this->intentos++;
     $s;
        if($this->mode == "jugador"){
            if($this->random < $dado){
               $s = "El numero es menor!";
               $this->mostrarForm();
           }elseif ($this->random> $dado){
               $s = "El numero es mayor!";
                $this->mostrarForm();
           }else{
               $s = "¡HAS ENCERTADO!";
               
               $this->guardar();
                
               
                
                
               
               $this->mostrarVolver();
           }
        }else{
            $this->puntoMedio($dado);
        }
        //$_SESSION['maquina'] = serialize($this);
        echo $s;
    }
    
    public function mostrarForm(){
                echo  '<form action="./juego.php" method="get">';
                echo '<p>Selecciona un numero(1-'.$this->rango.')</p>';
                echo '<label>Numero: </label>';
                echo '<input type="number" id="num" name="num" placeholder="1-'.$this->rango.'">';
                echo ' <input type="submit" value="Probar">';
                echo '</form>';
          //      $_SESSION['maquina'] = serialize($this);
    }
    public function mostrarFormInicial(){
                $this->primer = false;
                echo  '<form action="./juego.php" method="get">';
                echo '<p>Selecciona un numero(1-'.$this->rango.')</p>';
                echo '<label>Numero: </label>';
                echo '<input type="number" id="num" name="num" placeholder="1-'.$this->rango.'">';
                echo ' <input type="submit" value="Probar">';
                echo '</form>';
         //       $_SESSION['maquina'] = serialize($this);
    }
    public function mostrarVolver(){
       // $_SESSION['maquina'] = serialize($this);
        echo '<br><a href="index.php">Volver</a><br>';
    }
    
    public function puntoMedio(){
        $this->intentos++;
        if($this->mist[0] == 0){
            $this->mist[0] = $this->rango/2;
            $this->mist[1] = $this->rango;
            $this->mist[2] = 0;
        }elseif($_GET['num'] == "mayor"){
           
             $this->mist[2] = $this->mist[0];
             $arr = array();
            $arr[] =$this->mist[0];
            $arr[] =$this->mist[1];
            $this->mist[0] = round(array_sum($arr)/count($arr));
        }else{
                $this->mist[1] = $this->mist[0];
                $arr = array();
                $arr[] =$this->mist[0];
                $arr[] =$this->mist[2];
                $this->mist[0] = round(array_sum($arr)/count($arr));
        }
        $this->mostrarFormMaquina();
         
    }
    
    public function mostrarFormMaquina(){
        if($this->mist[0] == 0){
            $this->mist[0] = $this->rango/2;
            
        }
        
        
        
         echo '<p>El numero que has pensado es:'. $this->mist[0].' </p>';
                echo  '<form action="./juego.php" method="get">';
                echo '<input type="radio" id="male" name="num" value="mayor">';
                echo '<label for="maquina">Mayor</label><br>';
                echo '<input type="radio" id="female" name="num" value="menor">';
                echo '<label for="jugador">Menor</label><br>';
                echo ' <input type="submit" value="Probar">';
                echo '</form>';
                echo '</form>';
                echo  '<form action="./acertadoMaquina.php" method="post">';
                echo ' <input type="submit" value="Acertado">';
                echo '</form>';
        
         //$_SESSION['maquina'] = serialize($this);
    }
    
    public function getPrimer(){
       // $_SESSION['maquina'] = serialize($this);
        return $this->primer;
        
    }
    public function setPrimer(){
        $this->primer = false;
       // $_SESSION['maquina'] = serialize($this);
    }
    
    public function guardar(){
         $db = new DatabaseOOP("localhost:3306", "root", "1234", "m07uf3");
         $db->connect();
         
         
         if($this->mode == "jugador"){
             
              if($this->rango == 10){
                        $db->insert(ModalitatEnum::HUMA, 1 , $this->intentos);

              }elseif ($this->rango == 50){
                        $db->insert(ModalitatEnum::HUMA, 2 , $this->intentos);

              } elseif ($this->rango == 100){
                        $db->insert(ModalitatEnum::HUMA, 3 , $this->intentos);
              }
         }else{
            if($this->rango == 10){
                        $db->insert(ModalitatEnum::MAQUINA, 1 , $this->intentos);

              }elseif ($this->rango == 50){
                        $db->insert(ModalitatEnum::MAQUINA, 2 , $this->intentos);

              } elseif ($this->rango == 100){
                        $db->insert(ModalitatEnum::MAQUINA, 3 , $this->intentos);
              }
             
             
         }
         
         
        
        
    }
    
}