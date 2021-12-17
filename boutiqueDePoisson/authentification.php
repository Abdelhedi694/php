<?php

//création salt pour ensuite le combiner au md5 du mot de passe entré
$salt = "sdoihvfsivglmskmjkvsdv5554541c3d5s41c6q54csc4s5c4s65c31s5654cd3cscjb";
$selCrypte = md5($salt);



$utilisateurs = [

    [
        "username" => "thierrybg",
        "password" => "902bd594c99293f8100fd4a109ad92cc"  //ancien mot de passe : cocacola
    ],
    [
        "username" => "hedidonc",
        "password" => "0fbbe18b024fbdc112c324a13a036d58"   //ancien mot de passe : lothbrock
    ],
    [
        "username" => "denzel",
        "password" => "4ea80f6f139b0bc670fbb74b001b36ca"   //ancien mot de passe sniperelite
    ],

    

];


$utilisateurInconnu = "user not found";
$mdpErrone = "mot de passe érroné";
$champsVides= "veuillez renseigner tous les champs";
$messageErreur = "";
$modeFormulaire = true;
$secret = "<br><p>Le secret : </p><br><h1>les ovnis existent</h1>";
$formulaire = "<form method='post'>
<div>
<input type='text' name='username' placeholder='Nom Utilisateur'>
</div><div>
<input type='text' name='password' placeholder='Mot de Passe'>
</div><div>
<button class='btn btn-warning'>Se connecter</button>
</div>
</form>";

if ((isset($_POST["username"]) && isset($_POST["password"])) && (!empty($_POST["username"]) && !empty($_POST["password"]))) {
    $isUserTrouve=false;
    $motDePasseBoucle;
    
    foreach ($utilisateurs as $utilisateur) {
        if ($_POST["username"] == $utilisateur["username"]) {
            $isUserTrouve=true;
            $motDePasseBoucle = $utilisateur["password"];
        }

    } 

            if ($isUserTrouve) {
            
                if (md5($_POST["password"].$selCrypte) == $motDePasseBoucle) {
                    $modeFormulaire = false;
                
                } else {
                    $messageErreur = $mdpErrone;
                }
            }else{
                $messageErreur = $utilisateurInconnu;
            }    

    }else {
   $messageErreur = $champsVides;
};
?>