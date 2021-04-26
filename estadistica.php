<?php
class estadistica{
    
    
   public $id;
   public $modalitat;
   public $nivell;
   public $data;
   public $intents;
    
    
    public function __construct($id, $modalitat, $nivell, $data, $intents) {
       
        $this->id = $id;
        $this->modalitat = $modalitat;
        $this->nivell = $nivell;
        $this->data = $data;
        $this->intents = $intents;
    }
    
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

