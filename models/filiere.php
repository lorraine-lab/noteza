<?php

class Filiere {

    public function iffiliereExist($conn,$nomfiliere,$codefiliere){
        $req = $conn-> prepare("SELECT * FROM filiere WHERE nomfiliere = :nomfiliere OR codefiliere = :codefiliere");
        $req -> bindParam(':nomfiliere', $nomfiliere);
        $req -> bindParam(':codefiliere', $codefiliere);
        $req -> execute();
        return $req ->rowCount();
    }


    public function AllFiliere($conn){
        $req = $conn -> prepare("SELECT * FROM filiere");
        $req -> execute();
        return $req -> fetchAll();
    }

    
        public function getOne($conn,$id){
            $req = $conn -> prepare("SELECT * FROM filiere WHERE idfiliere = :id");
            $req -> bindParam(':id', $id);
            $req -> execute();
            return $req -> fetch();
        }



    public function getNumberOfFiliere($conn){
        $req = $conn -> prepare("SELECT * FROM filiere");
        $req -> execute();
        return $req -> rowCount();
    }



    public function getName($conn,$id){
        $req = $conn -> prepare ("SELECT * FROM filiere WHERE idfiliere = ? ");
        $req -> execute ([$id]);
        $raw = $req -> fetch();
        return $raw['nomfiliere'];
        
    }

    public function lastId($conn){
        $req = $conn -> prepare("SELECT * FROM filiere");
        $req -> execute();
        $raw = $req -> fetchAll();
        $der = end($raw);
        return $der['idfiliere'];
    }

    public function createfiliere($conn,$nomfiliere,$codefiliere){
        if ($this->iffiliereExist($conn,$nomfiliere,$codefiliere)) {
            return false;
        }else {

            $id = $this -> lastId($conn);
            $id+=1;
            $req = $conn -> prepare ("INSERT INTO filiere(idfiliere,nomfiliere,codefiliere) VALUES (:id,:nom,:code)");
                $req -> bindParam(':id',$id);
                 $req -> bindParam(':nom',$nomfiliere);
                 $req -> bindParam(':code', $codefiliere);
                 return $req -> execute();
        }            
    }

    public function delete($conn,$id) {
        $req = $conn -> prepare("SELECT * FROM user WHERE idfiliere = :idfiliere");
        $req -> bindParam(":idfiliere", $id);
        $req -> execute();
       
           if ($req -> rowCount() == 0) {
            $reqss = $conn -> prepare('DELETE FROM contient WHERE idfiliere = :id');
            $reqss -> bindParam(':id',$id);
            $reqss -> execute();
           
            $reqs = $conn -> prepare('DELETE FROM filiere WHERE idfiliere = :id');
            $reqs -> bindParam(':id',$id);
            return $reqs -> execute();
           } else {
            return false;
    } 
    }

    public function iffiliereExistForUpdate($conn,$nom,$id,$code){
        $req = $conn-> prepare("SELECT * FROM filiere WHERE nomfiliere = :nomfiliere AND codefiliere = :codefiliere AND idfiliere != :id");
        $req -> bindParam(':id', $id);
        $req -> bindParam(':nomfiliere', $nom);
        $req -> bindParam(':codefiliere', $code);
        $req -> execute();
        return $req ->rowCount();
    }


    public function updatefiliere($conn,$nom,$id,$code) {
        if ($this->iffiliereExistForUpdate($conn,$nom,$id,$code) > 0 ) {
            return false;
        }else {
            $req = $conn ->prepare("UPDATE filiere SET nomfiliere = :filiere, codefiliere = :code WHERE idfiliere = :id");
            $req -> bindParam(":filiere", $nom);
            $req -> bindParam(":code", $code);
            $req -> bindParam(":id", $id);
            return $req -> execute();
        }
    }
    


}
?>