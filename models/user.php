<?php

    // namespace Models;
    class User {

        public function createUser($conn,$idfiliere,$nom,$prenom,$matricule,$mail,$num,$password,$role){

            if ($this->ifMailExist($conn,$mail) > 0) {
                return false;
            }else {

                if ($idfiliere == 0 ) {
                    $idfiliere = null;
                }

                $id = $this->lastId($conn);
                $id +=1;
                $req = $conn -> prepare ("INSERT INTO user(`iduser`,`idfiliere`,`nom`,`prenom`,`matricule`,`mail`,`numero`,`password`,`role`) VALUES (:iduser,:idfiliere,:nom,:prenom,:matricule,:mail,:num,:password,:role)");
                $req -> bindParam(':iduser', $id);
                $req -> bindParam(':idfiliere', $idfiliere);
                $req -> bindParam(':nom', $nom);
                $req -> bindParam(':prenom', $prenom);
                $req -> bindParam(':matricule', $matricule);
                $req -> bindParam(':mail', $mail);
                $req -> bindParam(':num', $num);
                $req -> bindParam(':password', $password);
                $req -> bindParam(':role', $role);
                return $req -> execute();
            }

           
        }


        public function suppTeacher($conn,$iduser){
            $reqs = $conn -> prepare('DELETE FROM user WHERE iduser = :id');
            $reqs -> bindParam(':id', $iduser);
            return $reqs -> execute();
        }
        public function lastId($conn){
            $req = $conn -> prepare("SELECT * FROM user");
            $req -> execute();
            $raw = $req -> fetchAll();
            $der = end($raw);
            return $der['iduser'];
        }


        public function getRole($conn,$id){
            $req = $conn -> prepare ("SELECT role FROM user WHERE iduser = :id ");
            $req -> bindParam(':id', $id);
            $req -> execute();
            $raw = $req -> fetch();
            return $raw['role'];
        }


        public function getIdByMail($conn,$mail){
            $req = $conn -> prepare ("SELECT iduser FROM user WHERE mail = :mail ");
            $req -> bindParam(':mail', $mail);
            $req -> execute();
            $raw = $req -> fetch();
            return $raw['mail'];
        }

        public function getName($conn,$id){
            $req = $conn -> prepare ("SELECT nom FROM user WHERE iduser = ? ");
            $req -> execute ([$id]);
            $raw = $req -> fetch();
            return $raw['nom'];
        }


        public function getOne($conn,$id){
            $req = $conn->prepare("SELECT * FROM user WHERE iduser = :iduser");
            $req->bindParam(':iduser', $id);
            $req->execute();
            return $req->fetch();
        }



        public function getNumberOfStudent($conn){
            $req = $conn -> prepare("SELECT * FROM user WHERE role = 'student'");
            $req -> execute();
            return $req -> rowCount();
        }


        public function getNumberOfTeacher($conn){
            $req = $conn -> prepare("SELECT * FROM user WHERE role = 'teacher'");
            $req -> execute();
            return $req -> rowCount();
        }

        public function getNumberOfAdmin($conn){
            $req = $conn -> prepare("SELECT * FROM user WHERE role = 'admin'");
            $req -> execute();
            return $req -> rowCount();
        }


        public function ifMatriculeExist($conn,$matricule){
            $req = $conn -> prepare ("SELECT * FROM user WHERE matricule= '$matricule'");
            $req -> execute();
            return $req -> rowCount();
        }

        public function ifMailExist($conn,$mail){
            $req = $conn -> query ("SELECT * FROM user WHERE mail= '$mail'");
            $req -> execute();
            return $req -> rowCount();
        }

        public function ifMailExistForUpdate($conn,$mail,$id){
            $req = $conn -> query ("SELECT * FROM user WHERE mail = '$mail' AND iduser != $id");
            $req -> execute();
            return $req -> rowCount();
        }

        
        public function ifEntreeExist($conn,$entree,$type){
            $req = $conn -> prepare ("SELECT * FROM user WHERE '$type' = '$entree'");
            $req -> execute();
            return $req -> rowCount();
        }

        public function ifUsernameExist($conn,$username){
            $req = $conn -> prepare ("SELECT * FROM user WHERE username= '$username'");
            $req -> execute();
            return $req -> rowCount();
        }

        public function connexionUsername($conn,$username, $mdp){
            $req = $conn -> prepare ("SELECT * FROM user WHERE username= '$username' AND password = '$mdp'");
            $req -> execute();
            return $req -> rowCount();
        }


        public function connexionMail($conn,$username, $mdp){
            $req = $conn -> prepare ("SELECT * FROM user WHERE mail= '$username' AND password = '$mdp'");
            $req -> execute();
            if ( $req -> rowCount() > 0) {
                return $req -> fetch();
             }else {
                 return $req -> rowCount();
             }
        }


        public function connexionMatricule($conn,$username, $mdp){
            $req = $conn -> prepare ("SELECT * FROM user WHERE matricule= '$username' AND password = '$mdp'");
            $req -> execute();
            if ( $req -> rowCount() > 0) {
               return $req -> fetch();
            }else {
                return $req -> rowCount();
            }
        }

        public function connexion ($conn,$entree, $mot_passe, $type){
          if ($this -> ifEntreeExist($conn,$entree,$type)) {
            $req = $conn -> prepare ("SELECT  * FROM user WHERE '$type' = '$entree' AND password = '$mot_passe'");
            $req->execute ();
            return $req -> fetch();
          }
          return 0;

        }
        public function AllStudents($conn){
            $role = "student";
            $req = $conn -> prepare("SELECT * FROM user WHERE role =  :role");
            $req -> bindParam(":role", $role);
            $req -> execute();
            return $req -> fetchAll();
        }


        public function AllEnseignants($conn){
            $role = "teacher";
            $req = $conn -> prepare("SELECT * FROM user WHERE role =:role");
            $req -> bindParam(":role", $role);
            $req -> execute();
            return $req -> fetchAll();
        }


        public function AllAdmins($conn){
            $role = "admin";
            $req = $conn -> prepare("SELECT * FROM user WHERE role =:role");
            $req -> bindParam(":role", $role);
            $req -> execute();
            return $req -> fetchAll();
        }
        
        public function update($conn,$id, $nom, $prenom,$mail,$num,$password) {
           if ($this->ifMailExist($conn,$mail)) {
            return false;
           } else {
            $req = $conn->prepare('UPDATE user SET nom=:nom, prenom=:prenom, mail=:mail, num=:num, password=:password WHERE id=:id' );
            $req->bindParam(':id', $id);
            $req->bindParam(':nom',$nom);
            $req->bindParam(':prenom', $prenom);
            $req->bindParam(':mail', $mail);
            $req->bindParam(':num', $num);
            $req->bindParam(':password', $password);
            return true;
           }    
        }


        public function updateUser($conn,$id, $nom, $prenom,$num,$idfiliere) {
            $req = $conn->prepare('UPDATE user SET nom=:nom, idfiliere =:filiere, prenom=:prenom, numero=:num WHERE iduser=:id' );
            $req->bindParam(':id', $id);
            $req->bindParam(':nom',$nom);
            $req->bindParam(':prenom', $prenom);
            $req->bindParam(':filiere', $idfiliere);
            $req->bindParam(':num', $num);
            return $req->execute();
        }
    
        
        public function delete($conn,$id) {
           $req = $conn -> prepare("SELECT * FROM note WHERE idetudiant = :idetudiant");
           $req -> bindParam(":idetudiant", $id);
           if ($req -> rowCount() == 0) {
            $reqs = $conn -> prepare('DELETE FROM user WHERE iduser = :id');
            $reqs -> bindParam(':id', $id);
            return $reqs -> execute();
           } else {
            return false;
           }
           
        }

    }        
?>   