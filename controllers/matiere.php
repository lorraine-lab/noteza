<?php


    // insertion du fichier contenant la classe Etudiant
    require_once '../models/matiere.php';

    require_once '../models/contient.php';


    require_once '../models/enseigne.php';

    // insertion du fichier de connexion à la base de données
    require_once '../connexion.php';

    // insertion du fichier de session
    require_once '../session.php';

    $matiere = new Matiere();
    $contient = new Contient();
    $enseigne = new Enseigne();


    if (isset($_POST['choixfiliere'])) {
        $idfiliere = ( $_POST["filiere"]);
        $nom = htmlspecialchars($_POST['nom']);
        $credit = htmlspecialchars($_POST['credit']);
        $iduser = htmlspecialchars($_POST['iduser']);
        if ($matiere->creatematiere($conn,$nom,$credit,$iduser)) {
            $idmatiere = $matiere -> lastId($conn);
            foreach ($idfiliere as $key ) {
                $contient -> Add($conn,$key,$idmatiere);
                echo $key;
            }
            

            $_SESSION['addmatiere'] = true;
            // header('location:../all-filieres.php');
        }else {
            $_SESSION['addmatiere'] = false;
            header('location:../all-filieres.php');
        }
        
        
    }

    if (isset($_POST['modif'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $credit = htmlspecialchars($_POST['credit']);
        $id = htmlspecialchars($_POST['id']);
        $idfiliere = htmlspecialchars($_POST['idfiliere']);
        if ($matiere -> updatematiere($conn,$nom,$id,$credit)) {
            $_SESSION['modifmatiere'] = true;
            header("location:../all-matiere.php?filiere=$idfiliere");
        }else {
            $_SESSION['modifmatiere'] = false;
            header("location:../all-matiere.php?filiere=$idfiliere");
        }

    } 

    if (isset($_POST['supp'])) {
        $id = htmlspecialchars($_POST['id']);
        $idfiliere = htmlspecialchars($_POST['idfiliere']);
        if ($req = $matiere -> delete($conn, $id)) {
            $_SESSION['suppmatiere'] = true;
            header("location:../all-matiere.php?filiere=$idfiliere");
        }else{
            $_SESSION['suppmatiere'] = false;
            header("location:../all-matiere.php?filiere=$idfiliere");
        }



    }