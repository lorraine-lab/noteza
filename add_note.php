<?php 
    require_once 'session.php';
    require_once 'connexion.php';
    require_once 'models/user.php';
    require_once 'models/filiere.php';
    require_once 'models/matiere.php';
    require_once 'models/contient.php';
    require_once 'models/note.php';



    $user = new User();
    $matiere = new Matiere();
    $filiere = new Filiere();
    $contient = new Contient();
    $note = new Note();

    $allfiliere = $filiere -> AllFiliere($conn);

    $idteacher = $_GET['iduser'];
    $idmatiere = $_GET['idmatiere'];
    $allStudents = $note->getStudents($conn,$idteacher,$idmatiere);
    $nom = $matiere->getNamematiere($conn,$idmatiere);
    // var_dump($allStudents);
    // die();
    require_once ('layouts/navbar.php'); 



?>
<div class="container">
    <div class="row">
        <!-- <div class="col"> -->
            <!-- <div class="d-block"> -->
            <!-- </div> -->
        <!-- </div> -->
    </div>
</div>
<!-- message succes enregistrement -->
<?php  if(isset($_SESSION['insertok']) && $_SESSION['insertok'] == "true" ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i> Les notes ont été ajouté avec succès!</div>
<?php unset($_SESSION['insertok']); } ?>




<?php  if(isset($_SESSION['insertok']) && $_SESSION['insertok'] == "noteExist" ){ ?>
    <div class="alert alert-danger mx-4 my-2" role="alert"><i class="bi bi-exclamation-triangle-fill"></i> Les notes pour ses étudiants ont déjà été enregistré!</div>
<?php unset($_SESSION['insertok']);
 } ?>


<?php  if(isset($_SESSION['suppstudent']) && $_SESSION['suppstudent'] == true ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i> L'Etudiant a été supprimé avec succès !</div>
<?php unset($_SESSION['suppstudent']);
 } ?>



<?php  if(isset($_SESSION['updatestudent']) && $_SESSION['updatestudent'] = true ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i> Les modifications ont été enregistrées avec succès !</div>
<?php unset($_SESSION['updatestudent']);
 } ?>


<?php  if(isset($_SESSION['updatestudent']) && $_SESSION['updatestudent'] = false ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-exclamation-triangle-fill"></i> Problème lors de la modification !</div>
<?php unset($_SESSION['updatestudent']);
 } ?>


<?php  if(isset($_SESSION['suppstudent']) && $_SESSION['suppstudent'] == "note exist" ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-exclamation-triangle-fill"></i> L'Etudiant a déjà une note et ne peut être supprimé!</div>
<?php unset($_SESSION['suppstudent']);
 } ?>
 

<?php  if(isset($_SESSION['addStudent']) && $_SESSION['addStudent'] == false ){ ?>
    <div class="alert alert-danger mx-4 my-2" role="alert"><i class="bi bi-exclamation-triangle-fill"></i>  Problème lors de l'insertion !</div>
<?php unset($_SESSION['addStudent']);
 } ?>
<form action="controllers/note.php" method="POST">
<div class="col-xl-12 px-4  my-4">
<div class="shadow-lg card">
    <div class="card-header py-3 border-0 px-3">
        <div class="d-flex flex-wrap px-3 mb-4">
            <div class="">
                <h3 class="heading m-0 mr-5 mx-2">La liste des étudiants qui font <?=$nom; ?></h3>
            </div>
            <ul class="nav nav-tabs dzm-tabs">
                <li class="nav-item" >
                    <select class="default-select form-control wide" name="type_examen" id="">
                        <option value="Contrôle Continu">Contrôle Continu</option>
                        <option value="Session Normale">Session Normale</option>
                        <option value="Session de Rattrapage">Session de Rattrapage</option>
                    </select>
                </li>
                <li>
                    <input type="hidden" name="idmatiere" value="<?=$idmatiere; ?>">
                    <input type="hidden" name="idteacher" value="<?=$idteacher; ?>">
                    <input type="submit" value="Enregistrer les notes" name="enregister" class="btn btn-primary mx-3">
                </li>
            </ul>

        </div>
        <?php  ?>
<div class="table-responsive mt-3">
<table class="table " style="padding-left:4px">
    <thead>
        <tr>
            <th scope="col">Nom et Prenom</th>
            <th scope="col">Matricule</th>
            <th scope="col">Filière</th>
            <th scope="col">Note /20</th>
        </tr>
    </thead>
    <?php

        if ($allStudents > 0) {
        foreach ($allStudents as $row) { ?>
        <tr>
            <th scope="row"><?=$row['nom_etudiant'].' '.$row['prenom_etudiant']?></th>
            <td scope="row"><?=$row['matricule']?></td>
            <td scope="row"><?=$row['nomfiliere']?></td>
            <input type="hidden" name="iduser[]" value="<?=$row['id_etudiant']?>">
            <td scope="row"><input type="text" name="note[]" id="" required placeholder="Entrer la note"></td>
        </tr>
  <?php
} 
}else {
echo "<tr><td colspan='4'>Aucun résultat trouvé</td></tr>"; }
echo "</table>";
?>
</form>
<script>
    function Confirm(){
        var supp = addEventListener('click', function(){
           var reponse = confirm('Voulez vous vraiment autoriser cette suppression ?')
           if (reponse == false) {
            event.preventDefault()
           }
        }())
    }
</script>
</div>
 </div>

