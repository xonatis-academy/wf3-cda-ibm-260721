<?php

require_once __DIR__ . '/../../vendor/SimpleOrm.class.php'; 

class PurchaseDetail extends SimpleOrm{

    public $id; 
    public $commande_id;
    public $cake_id;
    public $quantity; 
    public $total_price;   
}

