<?php 

function index(){

    include __DIR__ . '/../Entity/Cake.php'; 
    $cakes = Cake::all(); 

    include __DIR__ . '/../../templates/navbar.html.php';
    include __DIR__ . '/../../templates/admin_cake/index.html.php'; 

}

function add(){

    $name = $_POST['cake-name']; 
    $description = $_POST['cake-description']; 
    $price = $_POST['cake-price']; 

    include __DIR__ . '/../Entity/Cake.php'; 

    $quaique = new Cake(); 

    $quaique->name = $name; 
    $quaique->description = $description; 
    $quaique->price = $price; 

    $quaique->save(); 

    header('LOCATION: /admin/cake');
}