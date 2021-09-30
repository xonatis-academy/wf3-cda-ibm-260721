<?php 

function show(){

    include __DIR__ . '/../Entity/User.php';

    $user = User::retrieveByPK($_GET['id']);

    include __DIR__ . '/../../templates/navbar.html.php';
    include __DIR__ . '/../../templates/admin_user/show.html.php';

}
