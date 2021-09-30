<?php 

function index(){

    include __DIR__ . '/../Entity/Purchase.php'; 
    $purchases = Purchase::all(); 

    include __DIR__ . '/../../templates/navbar.html.php';
    include __DIR__ . '/../../templates/admin_purchase/index.html.php'; 

}
