<?php

include __DIR__ . '/../Entity/Cart.php'; 

function index(){

    include __DIR__ . '/../../templates/navbar.html.php';
   

    // s'il y a un panier existant (defini, dclaré et different de null ) dans les cookies
    if ( isset($_COOKIE['cart'])){

        // récupérer le panier ezxistant 
        $texte = $_COOKIE['cart']; 
        // On effectue un décodage (désérialisation) 
        $cart = json_decode($texte); 
    } else {

        $cart = new Cart(); 
        $cart->detailCakeQuantity = []; 
        $cart->totalPrice = 0; 
    }

    include __DIR__ . '/../../templates/cart/index.html.php'; 
    
}

function remove() {
    $cakeId = $_POST['cake-cart-id']; 

    // s'il y a un panier existant (defini, dclaré et different de null ) dans les cookies
    if ( isset($_COOKIE['cart'])){

        // récupérer le panier ezxistant 
        $texte = $_COOKIE['cart']; 
        // On effectue un décodage (désérialisation) 
        $cart = json_decode($texte); 

        // echo '<pre>';
        // print_r($cart->detailCakeQuantity); 

    } else {

        $cart = new Cart(); 
        $cart -> detailCakeQuantity = []; 
        $cart -> totalPrice = 0; 
    }

    for ($i = 0; $i < count($cart->detailCakeQuantity); ++$i) {
        $element = $cart->detailCakeQuantity[$i];
        // Si le produit actuel est le produit à ajouter
        if($element->cake->id === $cakeId){

            $element->quantity = $element->quantity -1; 

            if ($element->quantity <= 0) {
                unset($cart->detailCakeQuantity[$i]);
            }

            // On enregistre le panier 
            $texte = json_encode($cart); 
            setcookie('cart', $texte); 

            // Termine l'operation 
            header('LOCATION: /cart');
            return; 

        }
    }        
}


function add() {

    //On construit la variable 

    $cakeId = $_POST['cake-cart-id']; 

    // On va copier le ou les modeles necessaire

    include __DIR__ . '/../Entity/CakeDetail.php'; 

    // s'il y a un panier existant (defini, dclaré et different de null ) dans les cookies
    if ( isset($_COOKIE['cart'])){

        // récupérer le panier ezxistant 
        $texte = $_COOKIE['cart']; 
        // On effectue un décodage (désérialisation) 
        $cart = json_decode($texte); 

        // echo '<pre>';
        // print_r($cart->detailCakeQuantity); 

    } else {

        $cart = new Cart(); 
        $cart -> detailCakeQuantity = []; 
        $cart -> totalPrice = 0; 
    }

    foreach($cart->detailCakeQuantity as $element){

        // Si le produit actuel est le produit à ajouter
        if($element->cake->id === $cakeId){

            // On increment la quantité du produit actuel

            $element->quantity = $element->quantity + 1; 

            // Mise a jour du prix total du produit actuel 
            $element->totalPrice = $element->cake->price * $element->quantity; 

            // Mise à jour du prix total du panier 

            $cart->totalPrice = $cart->totalPrice + $element->cake->price; 

            // On enregistre le panier 
            $texte = json_encode($cart); 
            setcookie('cart', $texte); 

            // Termine l'operation 
            header('LOCATION: /cart');
            return; 

        }
    }

    // creer un nouveau detail dans le panier pour un produit ( qui ne se trouvais pas deja dans le panier ) avec une quantité de depart de 1

    $detail = new CakeDetail(); 

    // On copie un autre modele dont on a besoin 

    include __DIR__ . '/../Entity/Cake.php'; 

    $detail->cake = Cake::retrieveByPK($cakeId); 

    // On definit la quantité du nouveau produit ajouté a 1 

    $detail->quantity = 1; 
    // On hydrate le prix total basé sur le prix initial du produit. 
    $detail->totalPrice = $detail->cake->price; 

    // On conctitu un tableau avec le detail du panier plus le nouveau detail qui vient s'ajouter premier 

    array_push($cart->detailCakeQuantity, $detail); 

    
    // Mettre à jour le prix total du panier 
    $cart->totalPrice = $cart->totalPrice + $detail->cake->price; 

    // On enregistre le panier 
    $texte = json_encode($cart); 
    setcookie('cart', $texte); 

    // On termine l'instruction 
    header('LOCATION: /cart');
    return; 
}

function clear(){

    setcookie('cart', null); 
    header('LOCATION: /cart');
}

function validate() {

    // On va décoder le panier qui se trouve dans les cookies (désérialisation)
    $texte = $_COOKIE['cart'];
    $cart = json_decode($texte);

    // On va copier les entités qui nous sont nécessaires
    include __DIR__ . '/../Entity/Purchase.php';
    include __DIR__ . '/../Entity/PurchaseDetail.php';

    // On va créer un nouvelle commande (nouvel objet de la classe Purchase)
    $order = new Purchase();
    // On hydate les propriétés de ce nouvel objet 
    $order->created_at = date('Y-m-d H:m:s');
    $order->reference = random_int(10000, 99999);
    $order->total_price = $cart->totalPrice;

    // On copie le modèle Utilisateur
    include __DIR__ . '/../Entity/User.php';
    // On démarre la session
    session_start();
    // On récupère l'utilisateur
    $order->user_id = $_SESSION['current-user']->id;
    $order->save();

    // On va récupérer le détail du panier pour construire la commande
    foreach ($cart->detailCakeQuantity as $product)
    {
        $detail = new PurchaseDetail();
        $detail->commande_id = $order->id;
        $detail->cake_id = $product->cake->id;
        $detail->quantity = $product->quantity;
        $detail->total_price = $product->totalPrice;
        $detail->save();
    }

    include __DIR__ . '/../../templates/navbar.html.php';
    include __DIR__ . '/../../templates/cart/validate.html.php';

}

