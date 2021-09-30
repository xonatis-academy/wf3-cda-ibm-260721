<?php

require_once __DIR__ . '/../../vendor/SimpleOrm.class.php';

class User extends SimpleOrm
{ 
    public $id;
    public $email;
    public $roles;
    public $password;
    public $lastname;
    public $firstname;
    public $address_number;
    public $address_street;
    public $address_zipcode;
    public $address_city;
}



?>