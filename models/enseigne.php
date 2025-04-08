<?php

class Enseigne { 



    public function Add($conn,$iduser,$idmatiere){
        $req = $conn -> prepare("INSERT INTO enseigne VALUES(?,?)");
        $req -> bindParam(1,$iduser);
        $req -> bindParam(2,$idmatiere);
        $req -> execute();
    }

    public function getMatiereByTeacher($conn,$iduser){
        $req = $conn -> prepare("SELECT * FROM enseigne WHERE iduser = ?");
        $req -> bindParam(1,$iduser);
        $req -> execute();
        return $req -> fetchAll();
    }

    public function getNumberofMatiere($conn,$idfiliere){
        $req = $conn -> prepare("SELECT * FROM contient WHERE idfiliere = :idfiliere");
        $req -> bindParam(':idfiliere', $idfiliere);
        $req -> execute();
        return $req -> rowCount();
    }


}