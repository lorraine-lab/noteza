<?php
class Note {

    public function lastId($conn){
        $req = $conn -> prepare("SELECT * FROM note");
        $req -> execute();
        $raw = $req -> fetchAll();
        $der = end($raw);
        return $der['idnote'];
    }

    public function getStudents($conn,$idteacher,$idmatiere){
        $sql = "SELECT DISTINCT 
            etu.iduser AS id_etudiant,
            etu.nom AS nom_etudiant,
            etu.prenom AS prenom_etudiant,
            matricule,f.nomfiliere
        FROM matiere m
        JOIN contient c ON m.idmatiere = c.idmatiere
        JOIN filiere f ON c.idfiliere = f.idfiliere
        JOIN user etu ON etu.idfiliere = f.idfiliere
        WHERE m.idmatiere = :idmatiere
        AND m.iduser = :idenseignant
        AND etu.role = 'student';
        ";
        $req = $conn -> prepare($sql);
        $req -> bindParam(':idmatiere', $idmatiere);
        $req -> bindParam(':idenseignant', $idteacher);
        $req -> execute();
        return $req -> fetchAll();

    }

    public function allNoteByStudent($conn,$iduser){
        $req = $conn -> prepare("SELECT * FROM note where iduser = :iduser");
        $req -> bindParam(':iduser', $iduser);
        $req -> execute();
        return $req->fetchAll();
    }
    public function studentExist($conn,$iduser){
        $req = $conn -> prepare("SELECT * FROM note where iduser = :iduser");
        $req -> bindParam(':iduser', $iduser);
        $req -> execute();
        return $req->rowCount();
    }

    public function createNote($conn,$note,$idetudiant,$type_examen,$idmatiere) {
        $id = $this->lastId($conn);
        $id+=1;
        
            $req = $conn -> prepare ("INSERT INTO note(idnote,note, iduser,type_examen,idmatiere) VALUES (:idnote,:note,:idetudiant,:type_examen,:idmatiere)");
            $req -> bindParam(":idnote", $id);
            $req -> bindParam(':note',$note);
            $req -> bindParam(':idetudiant', $idetudiant);
            $req -> bindParam(':idmatiere', $idmatiere);
            $req -> bindParam(':type_examen', $type_examen);
            return $req ->execute();
       
    }
    public function updatenote($conn,$note,$idetudiant) {
        $req = $conn ->prepare("UPDATE note SET note = :note WHERE idetudiant = :idetudiant");
        $req -> bindParam(":note", $note);
        $req -> bindParam(":idetudiant", $idetudiant);
        return $req -> execute();

    }


    public function deletenote($conn,$id) {
        $req = $conn -> prepare("DELETE * FROM note WHERE idnote = :idnote");
        $req -> bindParam(':idnote', $id);
        return $req -> execute();
    }

    public function ifNoteExist($conn,$idmatiere,$iduser,$type){
        $req = $conn -> prepare ("SELECT * FROM note WHERE iduser=:iduser AND idmatiere =:idmatiere AND type_examen=:type_examen");
        $req -> bindParam(":idmatiere", $idmatiere);
        $req -> bindParam(':iduser',$iduser);
        $req -> bindParam(':type_examen', $type);
        $req ->execute();
        return  $req ->fetchAll();
    }
}
?>