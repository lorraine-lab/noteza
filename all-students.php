<?php 
    require_once 'session.php';
    require_once 'connexion.php';
    require_once 'models/user.php';
    require_once 'models/filiere.php';



    $user = new User();
    $filiere = new Filiere();

    $allfiliere = $filiere -> AllFiliere($conn);



    require_once ('layouts/navbar.php'); 

    $nombreEtudiant = $user -> getNumberOfStudent($conn);

?>
<div class="container">
    <div class="row">
        <!-- <div class="col"> -->
            <!-- <div class="d-block"> -->
                <div class="col" style="margin-top:13px;">
                    <div class="py-2 badge text-bg-primary"> Nous avons <?=$nombreEtudiant?> étudiants</div>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </div>
</div>
<!-- message succes enregistrement -->
<?php  if(isset($_SESSION['addStudent']) && $_SESSION['addStudent'] == true ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i> Etudiant ajouté avec succès!</div>
<?php unset($_SESSION['addStudent']);
 } ?>




<?php  if(isset($_SESSION['suppstudent']) && $_SESSION['suppstudent'] == false ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-exclamation-triangle-fill"></i> Problème lors de la suppresion!</div>
<?php unset($_SESSION['suppstudent']);
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

<div class="col-xl-12 px-4  my-4">
<div class="shadow-lg card">
    <div class="card-header py-3 border-0 px-3">
        <h2 class="heading m-0 mr-5 ">La liste des étudiants 
            <?php require_once 'add-student.php' ?>
        </h2>
<div class="table-responsive">
<table class="table " style="padding-left:4px">
    <thead>
        <tr>
            <th scope="col">Nom et Prenom</th>
            <th scope="col">Matricule</th>
            <th scope="col">Numero</th>
            <th scope="col">Filière</th>
            <th scope="col">Voir notes</th>
            <th scope="col">Option</th>
        </tr>
    </thead>
    <?php
        $rows = $user ->AllStudents($conn);
        if ($rows > 0) {
        foreach ($rows as $row) { ?>
        <tr>
            <th scope="row"><?=$row['nom'].' '.$row['prenom']?></th>
            <td scope="row"><?=$row['matricule']?></td>
            <?php 
                // recuperation de l'intitule de la classe en fonction de l'id recupéré dans la table etu
                $nomfiliere = $filiere -> getName($conn,$row['idfiliere']);
            ?>
            <td scope="row"><?=$row['numero']?></td>
            <td scope="row"><?=$nomfiliere?></td>
            <td scope="row">
                <a class="btn btn-outline-primary" href="voirnote.php?etu=<?=$row['iduser']?>">
                    <i class="bi bi-pen"></i>
                </a> 
            </td>
            <td scope="row" class="d-flex">
                <?php require 'editstudent.php'; ?>
                    
                

                <form action="controllers/user.php" onsubmit = "return Confirm()" class="mx-1" method="POST">
                    <input type="hidden" name="iduser" value="<?=$row['iduser']?>" class="btn btn-outline-danger">
                    <button type="submit" name="supp-student" class="btn btn-outline-danger">
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

