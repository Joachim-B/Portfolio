<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'portfolio';

    $db2 = mysqli_connect($server,$username,$password,$dbname);
    if(isset($_POST['submit'])) {

        $checkApostrophe = "'";

        $nom = str_replace($checkApostrophe,"\'",$_POST['nom']) ;
        $prenom = str_replace($checkApostrophe,"\'",$_POST['prenom']) ;
        $email = str_replace($checkApostrophe,"\'",$_POST['email']) ;
        $message = str_replace($checkApostrophe,"\'",$_POST['message']) ;

        $checkGuillemet = '"';
        $nom = str_replace($checkGuillemet,'\"',$nom) ;
        $prenom = str_replace($checkGuillemet,'\"',$prenom) ;
        $email = str_replace($checkGuillemet,'\"',$email) ;
        $message = str_replace($checkGuillemet,'\"',$message) ;

        $i = "INSERT INTO `messages` (`id`, `nom`, `prenom`, `mail`, `message`) VALUES (NULL, '$nom', '$prenom', '$email', '$message')";


        $run = $db2->query($i);
    }

    header('location:./');
?>