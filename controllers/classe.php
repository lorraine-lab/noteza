<?php

    // insertion du fichier contenant la classe Etudiant
    require_once '../models/user.php';


    require_once '../models/filiere.php';

    // insertion du fichier de connexion à la base de données
    require_once '../connexion.php';

    // insertion du fichier de session
    require_once '../session.php';

    $user = new User();
    $filiere = new Filiere();


    if (isset($_POST['addclass'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $code = htmlspecialchars($_POST['code']);
        $erreur = false;
        if ($filiere -> createfiliere($conn,$nom,$code,)) {
            $erreur = true;
        }

        header('location:../listclasse.php');
    }