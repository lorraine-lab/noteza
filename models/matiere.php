<?php
class Matiere {

    public function ifMatiereExist($conn,$nomMatiere){
        $req = $conn-> prepare("SELECT * FROM matiere WHERE nommatiere = :nommatiere ");
        $req -> bindParam(':nommatiere', $nomMatiere);
        $req -> execute();
        return $req ->rowCount();
    }


    public function ifMatiereExistForUpdate($conn,$nomMatiere,$id){
        $req = $conn-> prepare("SELECT * FROM matiere WHERE nommatiere = :nommatiere AND idmatiere != :id");
        $req -> bindParam(':id', $id);
        $req -> bindParam(':nommatiere', $nomMatiere);
        $req -> execute();
        return $req ->rowCount();
    }


    public function getOne($conn, $idmatiere){
        $req = $conn-> prepare("SELECT * FROM matiere WHERE idmatiere = :idmatiere ");
        $req -> bindParam(':idmatiere', $idmatiere);
        $req -> execute();
        return $req ->fetch();
    }

    

    public function creatematiere($conn,$nommatiere,$nbrecreditmatiere,$iduser): bool{
        if ($this->ifMatiereExist($conn,$nommatiere)) {
            return false;
        }else {
           $id = $this -> lastId($conn);
            $id+=1;

            $req = $conn -> prepare ("INSERT INTO matiere(idmatiere,nommatiere,nbrecreditmatiere,iduser) VALUES (:idmatiere,:nom,:nbrecredit,:iduser)");
                $req -> bindParam(':idmatiere', $id);
                $req -> bindParam(':iduser',$iduser);
                $req -> bindParam(':nom',$nommatiere);
                $req -> bindParam(':nbrecredit', $nbrecreditmatiere);
                return $req -> execute();
        }
    }
    public function lastId($conn){
        $req = $conn -> prepare("SELECT * FROM matiere");
        $req -> execute();
        $raw = $req -> fetchAll();
        $der = end($raw);
        return $der['idmatiere'];
    }



    public function getNamematiere($conn,$id){
        $req = $conn -> prepare ("SELECT * FROM matiere WHERE idmatiere = ? ");
        $req -> execute ([$id]);
        $raw = $req -> fetch();
        return $raw['nommatiere'];
    }
    
    public function getcodematiere($conn,$id){
        $req = $conn -> prepare ("SELECT `codematiere` FROM matiere WHERE code = ? ");
        $req -> execute ([$id]);
        return $req -> fetch();
    }
    public function getnbrecreditmatiere($conn,$id){
        $req = $conn -> prepare ("SELECT `nbrecreditmatiere` FROM matiere WHERE nbrecrdit = ? ");
        $req -> execute ([$id]);
        return $req -> fetch();
    }
    public function updatematiere($conn,$nomMatiere,$id,$nombre) {
        if ($this->ifMatiereExistForUpdate($conn,$nomMatiere,$id) > 0 ) {
            return false;
        }else {
            $req = $conn ->prepare("UPDATE matiere SET nommatiere = :matiere, nbrecreditmatiere = :nombre WHERE idmatiere = :id");
            $req -> bindParam(":matiere", $nomMatiere);
            $req -> bindParam(":nombre", $nombre);
            $req -> bindParam(":id", $id);
            return $req -> execute();
        }
    }


    public function getNumberOfMatiere($conn){
        $req = $conn -> prepare("SELECT * FROM matiere");
        $req -> execute();
        return $req -> rowCount();
    }

    public function delete($conn,$id) {
        $req = $conn -> prepare("SELECT * FROM enseigne WHERE idmatiere = :idmatiere");
        $req -> bindParam(":idmatiere", $id);
        $req -> execute();
        $requete = $conn -> prepare("SELECT * FROM note WHERE idmatiere = :idmatiere");
        $requete -> bindParam(":idmatiere", $id);
        $requete -> execute();
           if ($req -> rowCount() == 0 && $requete -> rowCount() == 0) {
            $reqss = $conn -> prepare('DELETE FROM contient WHERE idmatiere = :id');
            $reqss -> bindParam(':id',$id);
            $reqss -> execute();
           
            $reqs = $conn -> prepare('DELETE FROM matiere WHERE idmatiere = :id');
            $reqs -> bindParam(':id',$id);
            return $reqs -> execute();
           } else {
            return false;
    } 
    }
    public function getstudentbymatiere($conn,$idteacher) {
        $sql = "SELECT u.iduser, u.nomuser, u.prenomuser, u.matriculeuser, f.nomfiliere
                FROM user u
                JOIN contient c ON u.idfiliere = c.idfiliere
                JOIN enseigne e ON c.idmatiere = e.idmatiere
                JOIN filière f ON u.idfiliere = f.idfiliere
                WHERE e.iduser = :idteacher -- Remplacer le ? par l'ID de l'enseignant
                AND u.rôle = 'student'";
                $req = $conn -> prapare($sql);
                $req -> bindParam(':idteacher', $idteacher);
                return $req-> execute();

    }
    public function getallmatierebyteacher($conn,$id) {
        $req = $conn ->prepare("SELECT * FROM matiere WHERE iduser = :iduser");
        $req -> bindParam(':iduser', $id);
        $req -> execute();
        return $req->fetchAll();
    }

   
}
?>