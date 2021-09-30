<?php
function index(){
    include __DIR__ . '/../../templates/navbar.html.php';
    include __DIR__ .'/../../templates/registration/index.html.php';
}

function save(){
    
    //on definit les variables pour recuperer les donnees du POST dans le formulaire register

    $email = $_POST['user-email'];
    $password = $_POST['user-password'];
    $confirm = $_POST['user-confirm-password'];
    $lastname = $_POST['user-lastname'];
    $firstname = $_POST['user-firstname'];
    $number = $_POST['user-address-number'];
    $street = $_POST['user-address-street'];
    $zipcode = $_POST['user-address-zipcode'];
    $city = $_POST['user-address-city'];

  
    //si le mot de passe saisie est strictement identique a la confirmation de mot de passe 
    if ($password === $confirm){
        // alors on copie le modele user sur le quel on vas se baser pour creer un nouvel utilisateur
        include __DIR__ . '/../Entity/User.php';
        //creer un nouvel utilisateur
        $user = new User;

        //dans chaque champ defini auparavant dans l'entité, on vas attribuer une valeur
        //on dit qu'on hydrate les parametres avec les données qui seront envoyées pas l'utilisateur
        //on ne renseigne pas l'id , mysql vas s'en charger avec l'auto-incrémentation

        $user->email = $email;
        $user->lastname = $lastname;
        $user->firstname = $firstname;
        $user->address_number = $number;
        $user->address_street = $street;
        $user->address_zipcode = $zipcode; 
        $user->address_city = $city;
        $user->password = password_hash($password, PASSWORD_BCRYPT);
        $user->roles = 'ROLE_USER';

       //on enregistre la variable $user nouvellemtn hydratée de tous les parametres
       $user->save();

       header('LOCATION: /login');
    }
    else{
        include __DIR__ . '/../../templates/navbar.html.php';
        echo '<div>votre mot de passe et la confirmation doivent être identique</div>';
        include __DIR__ .'/../../templates/registration/index.html.php';
    }
}

?>