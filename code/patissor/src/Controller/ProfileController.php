<?php

function index() {
    session_start();
    if (!isset($_SESSION['current-user']))
    {
        die();
    }

    $currentUser = $_SESSION['current-user'];

    include __DIR__ . '/../../templates/navbar.html.php';
    include __DIR__ . '/../../templates/profile/index.html.php';
}