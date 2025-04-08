<?php
// Assurez-vous qu'il n'y a pas d'espace ou de retour à la ligne avant cette balise <?php

// Inclusion des fichiers nécessaires
require_once '../models/filiere.php';
require_once '../connexion.php';
require_once '../session.php';

$filiere = new Filiere();

if (isset($_POST['add-filiere'])) {
    $codefiliere = htmlspecialchars($_POST['codefiliere']);
    $nomfiliere = htmlspecialchars($_POST['nomfiliere']);

    $verif = $filiere->createfiliere($conn, $nomfiliere, $codefiliere);

    if ($verif) {
        $_SESSION['addfiliere'] = true;
    } else {
        $_SESSION['addfiliere'] = false;
    }

    // Redirection après traitement
    header('location:../all-filieres.php');
    exit();
}

if (isset($_POST['modif'])) {
    $nomfiliere = htmlspecialchars($_POST['nomfiliere']);
    $codefiliere = htmlspecialchars($_POST['codefiliere']);
    $idfiliere = htmlspecialchars($_POST['idfiliere']);

    if ($filiere->updatefiliere($conn, $nomfiliere, $idfiliere, $codefiliere)) {
        $_SESSION['modiffiliere'] = true;
        header("location:../all-filieres.php?filiere=$idfiliere");
        exit();
    } else {
        $_SESSION['modiffiliere'] = false;
        header("location:../all-filieres.php?filiere=$idfiliere");
        exit();
    }
}

if (isset($_POST['supp'])) {
    $idfiliere = htmlspecialchars($_POST['idfiliere']);

    if ($filiere->delete($conn, $idfiliere)) {
        $_SESSION['suppfiliere'] = true;
    } else {
        $_SESSION['suppfiliere'] = false;
    }

    // Redirection après suppression
    header("location:../all-filieres.php?filiere=$idfiliere");
    exit();
}

// Affichage de message après redirection (si nécessaire)
if (isset($_SESSION['message_type'])) {
    echo $_SESSION['message_type'];  // Affichage après redirection ou après toutes les opérations
    unset($_SESSION['message']);  // Supprimer après affichage
}
?>
