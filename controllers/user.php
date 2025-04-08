<?php

    // insertion du fichier contenant la classe Etudiant
    require_once '../models/user.php';



    require_once '../models/note.php';

    // insertion du fichier de connexion à la base de données
    require_once '../connexion.php';

    // insertion du fichier de session
    require_once '../session.php';

    $user = new User();
    $note = new Note();

    // Gestion de la connexion
    if (isset($_POST["Connexion"])) {
       
        function estEmailValide($entree) {
            return filter_var($entree, FILTER_VALIDATE_EMAIL) !== false;
        }
    
        function commenceParArobase($chaine) {
            // Vérifie si la chaîne n'est pas vide et commence par '@'
            return !empty($chaine) && $chaine[0] === '@';
        }

        $entree = htmlspecialchars($_POST["entree"]);
        $mdp = htmlspecialchars($_POST["mdp"]);

        if (estEmailValide($entree)) {
            $validate = $user -> connexionMail($conn,$entree,$mdp);
           if ($validate) {
               echo  $id = $validate['iduser'];
               echo $role = $user -> getRole($conn,$id);
            if ($user -> getRole($conn,$id) == 'student') {
                header('location:../home.php');
            }if ($user -> getRole($conn,$id) == 'admin') {
                $_SESSION['role'] = $user -> getRole($conn,$id);
                header('location:../admin-dashbord.php');
            }if ($user -> getRole($conn,$id) == 'teacher') {
                $_SESSION['role'] = $user -> getRole($conn,$id);
                $_SESSION['idteacher'] = $user -> getIdByMail($conn,$entree);
                header("location:../dashbordteacher.php?iduser=$id");
            }
            
           }else {
            $_SESSION['form_data'] = $_POST;
            header('location:../index.php');
           }
        } 
        if (commenceParArobase($entree)) {
            if ($user -> connexionUsername($conn,$entree,$mdp)) {
                header('location:../home.php');
               }
        }
        
        if (!estEmailValide($entree) && !commenceParArobase($entree)) {
            if ($user -> connexionMatricule($conn,$entree,$mdp)) {
                header('location:../home.php');
               }
        }   
    }


    if (isset($_POST['add-student'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $matricule = htmlspecialchars($_POST['matricule']);
        $numero = htmlspecialchars($_POST['numero']);
        $idfiliere = htmlspecialchars($_POST['filiere']);
        $mail = htmlspecialchars($_POST['mail']);
        $role = htmlspecialchars($_POST['role']);
        $password = htmlspecialchars($_POST['password']);
       
       $verif =  $user -> createUser($conn,$idfiliere,$nom,$prenom,$matricule,$mail,$numero,$password,$role);

       if ($verif) {
        $_SESSION['addStudent'] = true;
        header('location:../all-students.php');
       }else {
            $_SESSION['addStudent'] = false;
            header('location:../all-students.php');
       }

        if (isset($_SESSION['message_type'])){
            echo $_SESSION['message_type'];
            $_SESSION['message'];
            unset($_SESSION['message']);
            //supprimer le message apres affichage
            
        }
    }


    if (isset($_POST['add-teacher'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $matricule = htmlspecialchars($_POST['matricule']);
        $numero = htmlspecialchars($_POST['numero']);
        $idfiliere=htmlspecialchars($_POST['filiere']);
        $mail = htmlspecialchars($_POST['mail']);
        $role = htmlspecialchars($_POST['role']);
        $password = htmlspecialchars($_POST['password']);

        $verif =  $user -> createUser($conn,$idfiliere,$nom,$prenom,$matricule,$mail,$numero,$password,$role);

       if ($verif) {
        $_SESSION['addTeacher'] = true;
        header('location:../all-teacher.php');
       }else {
            $_SESSION['addTeacher'] = false;
            header('location:../all-teacher.php');
        }
        if (isset($_SESSION['message_type'])){
            echo $_SESSION['message_type'];
            $_SESSION['message'];
            unset($_SESSION['message']);
            //supprimer le message apres affichage
            
        }
    }

    if (isset($_POST['modif-student'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $matriule = htmlspecialchars($_POST['matricule']);
        $num = htmlspecialchars($_POST['num']);
        $id = htmlspecialchars($_POST['id']);
        $idfiliere = htmlspecialchars($_POST['filiere']);
        $role = htmlspecialchars($_POST['role']);
        if ($student -> updatestudent($conn,$nom,$prenom,$matricule,$num,$id,$filiere,$role)) {
            $_SESSION['modifstutent'] = true;
            header("location:../all-student.php");
        }else {
            $_SESSION['modifstudent'] = false;
            header("location:../all-student.php");
        }

    } 

    if (isset($_POST['supp-student'])) {
        $iduser = htmlspecialchars($_POST['iduser']);
        
        if ($req = $user -> delete($conn, $iduser)) {
          echo "ok"; $_SESSION['suppstudent'] = true;
             header("location:../all-students.php");
        }else{
          echo "pas bon";  $_SESSION['suppstudent'] = false;
            header("location:../all-students.php");
        }

    }

    if (isset($_POST['suppTechear'])) {
        $iduser = $_POST['iduser'];
        if($user ->suppTeacher($conn,$iduser)){
            $_SESSION['suppsteacher'] = true;
            header("location:../all-teacher.php");
        }else{
            $_SESSION['suppsteacher'] = false;
            header("location:../all-teacher.php");
        }
    }
    
    
    if(isset($_POST['modif'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $numero = htmlspecialchars($_POST['numero']);
        $filiere = htmlspecialchars($_POST['filiere']);
        $iduser = $_POST['iduser'];

        if($_POST['role'] == "student"){
            if($user ->updateUser($conn,$iduser, $nom, $prenom,$numero,$filiere)){
                $_SESSION['updatestudent'] = true;
                header("location:../all-students.php");
            }else{
                $_SESSION['updatestudent'] = false;
                header("location:../all-students.php");
            }
        }

        if($_POST['role'] == "teacher"){
            $filiere = null;
            if($user ->updateUser($conn,$iduser, $nom, $prenom,$numero,$filiere)){
                $_SESSION['updateteacher'] = true;
                header("location:../all-teacher.php");
            }else{
                $_SESSION['updateteacher'] = false;
                header("location:../all-teacher.php");
            }
        }



        
      
    
    }



    if (isset($_POST['modif-teacher'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $num = htmlspecialchars($_POST['num']);
        $id = htmlspecialchars($_POST['id']);
        $role = htmlspecialchars($_POST['role']);
        if ($teacher -> updateteacher($conn,$nom,$prenom,$num,$id,$role)) {
            $_SESSION['modifteacher'] = true;
            header("location:../all-teacher.php");
        }else {
            $_SESSION['modifteacher'] = false;
            header("location:../all-teacher.php");
        }

    } 

    if (isset($_POST['supp-teacher'])) {
        $id = htmlspecialchars($_POST['id']);
        $iduser = htmlspecialchars($_POST['iduser']);
        if ($req = $matiere -> delete($conn, $id)) {
            $_SESSION['suppteacher'] = true;
            header("location:../all-teacher.php");
        }else{
            $_SESSION['suppteacher'] = false;
            header("location:../all-teacher.php");
        }

    }
      
    


 ?>   









