<?php
 

$path = null;
if (isset($_SERVER['PATH_INFO'])) {
    $path = $_SERVER['PATH_INFO'];
}

// http://localhost/admin/cake/add
// PATH_INFO -> /admin/cake/add

// http://localhost
// PATH_INFO -> not set

if($path === '/catalog'){
    include __DIR__.'/../src/controller/CatalogController.php';
    index();
}
//cart c'est panier(shopping) en anglais
else if($path === '/cart'){
    include __DIR__ .'/../src/controller/CartController.php';
    index();
}
else if($path === '/cart/add'){
    include __DIR__ .'/../src/controller/CartController.php';
    add();
}
else if($path === '/cart/remove'){
    include __DIR__ .'/../src/controller/CartController.php';
    remove();
}
else if($path === '/cart/clear'){
    include __DIR__ .'/../src/controller/CartController.php';
    clear();
}
else if($path === '/cart/validate'){
    include __DIR__ .'/../src/controller/CartController.php';
    validate();
}
else if($path === '/register'){
    include __DIR__ .'/../src/controller/RegistrationController.php';
    index();
}
else if($path === '/register/save'){
    include __DIR__ .'/../src/controller/RegistrationController.php';
    save();
}
else if($path === '/login'){

    include __DIR__ . '/../src/controller/SecurityController.php';
    index();
}
else if($path === '/login/check'){
    include __DIR__ . '/../src/controller/SecurityController.php';
    check();
}
else if($path === '/admin/cake'){
    include __DIR__ .'/../src/controller/AdminCakeController.php'; 
    index();  
}
else if($path === '/admin/purchase'){
    include __DIR__ .'/../src/controller/AdminPurchaseController.php'; 
    index();  
}
else if($path === '/admin/user'){
    include __DIR__ .'/../src/controller/AdminUserController.php'; 
    show();  
}
else if ($path === '/admin/cake/add'){
    include __DIR__ . '/../src/controller/AdminCakeController.php'; 
    add(); 
}
else if ($path === '/profile'){
    include __DIR__ .'/../src/controller/ProfileController.php';
    index();
}
else{
    include __DIR__ .'/../src/controller/NotFoundController.php';
    index();
}

