<?php 

class Admin{
    public function __construct(){

        $this->require_classes();
        
        require_once CF2_FILE . '/includes/Admin/Menu.php';
        new Menu();
        
    }

    public function require_classes(){
        require_once CF2_FILE . '/includes/Admin/Menu.php';
    }
}