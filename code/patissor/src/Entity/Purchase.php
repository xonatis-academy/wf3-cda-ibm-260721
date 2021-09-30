<?php

require_once __DIR__ . '/../../vendor/SimpleOrm.class.php'; 

class Purchase extends SimpleOrm {

    public $id; 
    public $created_at; 
    public $reference; 
    public $total_price; 
    public $user_id; 

}