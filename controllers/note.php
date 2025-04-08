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

    if (isset($_POST['enregister'])) {
        // $iduser = $_POST['iduser'];
        $idmatiere = $_POST['idmatiere'];
        $notes = $_POST['note'];
        $type = $_POST['type_examen'];
        $etudiants = $_POST['iduser'];
        $idteacher = $_POST['idteacher'];

        for ($i = 0; $i < count($etudiants); $i++) {
            $iduser = $etudiants[$i];
            $note_value = $notes[$i];
            if ($note->ifNoteExist($conn,$idmatiere,$iduser,$type)) {
                $_SESSION['insertok'] = "noteExist";
                header("location:../add_note.php?iduser=$idteacher&idmatiere=$idmatiere");
            }else {
                $note->createNote($conn, $note_value, $iduser, $type, $idmatiere);
                $_SESSION['insertok'] = "true";
                header("location:../add_note.php?iduser=$idteacher&idmatiere=$idmatiere");
            }
            
        }
    
        
    }