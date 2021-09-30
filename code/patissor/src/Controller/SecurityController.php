<?php
//cette page sera pour le login 

function index(){
    include __DIR__ . '/../../templates/navbar.html.php';
    include __DIR__ . '/../../templates/security/index.html.php';
}

function check(){
    //on recupere les names du formulaire de connexion et on les affecte a une variable
    $login = $_POST['email-login'];
    $password = $_POST['password-login'];

    include __DIR__ . '/../Entity/User.php';

    //On recupere en  base de données , l'utilisateur qui est proprietaire de l'adresse email saisie
    // le retrieveByField est equivaut a   SELECT *FORM user WHERE email = $login   en sql
    // le FETCH_ONE est equivaut a     "limit 1"     en sql
    $user = User::retrieveByField('email',$login,SimpleOrm::FETCH_ONE);

    // verifier si le user existe ou pas 
    //si le contenu de la variable ne renvoie rien , cela signifie que l'utilisateur n'existe pas  
    if($user === null){
        echo '<div>utilisateur innexistant</div>';
        die();
    }
    //verifier le mot de passe
    //si le mot de passe saisi est strictement different du mot de passe enregistré en BDD
    if(!password_verify($password, $user->password)){
        echo '<div>le mot de passe est incorrect</div>';
        die();
    }
    //Et si tout s'est bien passé lors des controles , on demarre une nouvelle session pour le user 
    session_start();
    $_SESSION['current-user'] = $user;

    //on demande au back-end d'ordonner au front-end d'effectuer une redirection
    header('LOCATION: /profile');
}

?>