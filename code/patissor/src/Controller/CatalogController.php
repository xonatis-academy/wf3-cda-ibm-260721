<?php

function index(){
    include __DIR__ . '/../../templates/navbar.html.php';
    
    include __DIR__ . '/../Entity/Cake.php'; 

    $allCakes = Cake::all(); 

    include __DIR__ . '/../../templates/catalog/index.html.php'; 
}

?>
