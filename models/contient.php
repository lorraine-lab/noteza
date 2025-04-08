<?php

class Contient { 



    public function Add($conn,$idfiliere,$idmatiere){
        $req = $conn -> prepare("INSERT INTO contient VALUES(?,?)");
        $req -> bindParam(1,$idfiliere);
        $req -> bindParam(2,$idmatiere);
        $req -> execute();
    }

    public function getMatiereByFiliere($conn,$idfiliere){
        $req = $conn -> prepare("SELECT * FROM contient WHERE idfiliere = ?");
        $req -> bindParam(1,$idfiliere);
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