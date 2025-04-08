<?php 
    require_once 'session.php';
    require_once 'connexion.php';
    require_once 'models/user.php';



    $user = new User();



    require_once ('layouts/navbar.php'); 

    $nombreEnseignant = $user -> getNumberOfTeacher($conn);

?>
<div class="container">
    <div class="row">
        <!-- <div class="col"> -->
            <!-- <div class="d-block"> -->
                <div class="col" style="margin-top:13px;">
                    <!-- <a href="add-student.php" class="btn btn-outline-primary">Gérer les classes</a> -->
                    
                    <div class="py-2 badge text-bg-primary"> Nous avons <?=$nombreEnseignant?> enseignant</div>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </div>
</div>
<!-- message succes enregistrement -->
<?php  if(isset($_SESSION['addTeacher']) && $_SESSION['addTeacher'] == true ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i> Enseignant ajouté avec succès!</div>
<?php unset($_SESSION['addTeacher']);
 } ?>


<?php  if(isset($_SESSION['addTeacher']) && $_SESSION['addTeacher'] == false ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i>  Problème lors de l'insertion !</div>
<?php unset($_SESSION['addTeacher']);
 } ?>

 
<?php  if(isset($_SESSION['updateteacher']) && $_SESSION['updateteacher'] == true ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i> Les modifications ont été enregistrées avec succès !</div>
<?php unset($_SESSION['updateteacher']);
 } ?>


<?php  if(isset($_SESSION['updateteacher']) && $_SESSION['updateteacher']== false ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-exclamation-triangle-fill"></i> Problème lors de la modification !</div>
<?php unset($_SESSION['updateteacher']);
 } ?>


<?php  if(isset($_SESSION['suppsteacher']) && $_SESSION['suppsteacher'] == true ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i> La suppression a été un succès !</div>
<?php unset($_SESSION['suppsteacher']);
 } ?>


<?php  if(isset($_SESSION['suppsteacher']) && $_SESSION['suppsteacher'] == false ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-exclamation-triangle-fill"></i> Problème lors de la suppression !</div>
<?php unset($_SESSION['updateteacher']);
 } ?>



<div class="col-xl-12 px-4  my-4">
<div class="shadow-lg card">
    <div class="card-header py-3 border-0 px-3">
        <h2 class="heading m-0 mr-5 ">La liste des enseignants 
            <?php require_once 'add-teacher.php' ?>
        </h2>
<div class="table-responsive">
<table class="table " style="padding-left:4px">
    <thead>
        <tr>
            <th scope="col">Nom et Prenom</th>
            <th scope="col">Matricule</th>
            <th scope="col">Numero telephone</th>
            <th scope="col">Option</th>
        </tr>
    </thead>
    <?php
        $rows = $user ->AllEnseignants($conn);
        if ($rows > 0) {
        foreach ($rows as $row) { ?>
        <tr>
            <th scope="row"><?=$row['nom'].' '.$row['prenom']?></th>
            <td scope="row"><?=$row['matricule']?></td>
           
            <td scope="row"><?=$row['numero']?></td>
            <td scope="row" class="d-flex">
                <?php require 'editstudent.php'; ?>

                <form action="controllers/user.php" onsubmit = "return Confirm()" class="mx-1" method="POST">
                    <input type="hidden" name="iduser" value="<?=$row['iduser']?>" class="btn btn-outline-danger">
                    <button type="submit" name="suppTechear" class="btn btn-outline-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
  <?php
} 
}else {
echo "<tr><td colspan='7'>Aucun résultat trouvé</td></tr>"; }
echo "</table>";
?>
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

