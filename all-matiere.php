<?php 
    require_once 'session.php';
    require_once 'connexion.php';
    require_once 'models/user.php';
    require_once 'models/filiere.php';
    require_once 'models/contient.php';
    require_once 'models/matiere.php';


    $user = new User();
    $filiere = new Filiere();
    $contient = new Contient();
    $idfiliere = $_GET['filiere'];
    $matiere = new Matiere();

    $allmatiere = $contient -> getMatiereByFiliere($conn,$idfiliere);

    $allfiliere = $filiere -> AllFiliere($conn);

    $allenseignant = $user -> AllEnseignants($conn);
    $nomfiliere = $filiere -> getName($conn,$idfiliere);

    require_once ('layouts/navbar.php'); 

    $nbreMatiere = $contient -> getNumberofMatiere($conn, $idfiliere);

?>
<div class="container">
    <div class="row">
        <!-- <div class="col"> -->
            <!-- <div class="d-block"> -->
                <div class="col" style="margin-top:13px;">
                    <?php require_once 'add-matiere.php' ?>
                    <div class="py-2 badge text-bg-primary"> Nous avons <?=$nbreMatiere?> Matière dans la filière <?=$nomfiliere?> </div>
                </div>
            <!-- </div> -->
        <!-- </div> -->
    </div>
</div>
<!-- message succes enregistrement -->
<?php  if(isset($_SESSION['addfiliere']) && $_SESSION['addfiliere'] == true ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i> Filière ajouté avec succès!</div>
<?php
 unset($_SESSION['addfiliere']);
 } ?>


<?php  if(isset($_SESSION['modifmatiere']) && $_SESSION['modifmatiere'] == true ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i> Matière modifiée avec succès!</div>
<?php
 unset($_SESSION['modifmatiere']);
 } ?>


<?php  if(isset($_SESSION['modifmatiere']) && $_SESSION['modifmatiere'] == false ){ ?>
    <div class="alert alert-danger mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i> Problème lors de la modification</div>
<?php
 unset($_SESSION['modifmatiere']);
 } ?>

<?php  if(isset($_SESSION['suppmatiere']) && $_SESSION['suppmatiere'] == true ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i> Matière supprimée avec succès!</div>
<?php
 unset($_SESSION['suppmatiere']);
 } ?>

<?php  if(isset($_SESSION['addfiliere']) && $_SESSION['addfiliere'] == false ){ ?>
    <div class="alert alert-danger mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i>  Problème lors de l'insertion !</div>
<?php unset($_SESSION['addfiliere']);
 } ?>

<?php  if(isset($_SESSION['addmatiere']) && $_SESSION['addmatiere'] == true ){ ?>
    <div class="alert alert-success mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i> Matière ajouté avec succès!</div>
<?php
 unset($_SESSION['addmatiere']);
 } ?>

<?php  if(isset($_SESSION['addmatiere']) && $_SESSION['addmatiere'] == false ){ ?>
    <div class="alert alert-danger mx-4 my-2" role="alert"><i class="bi bi-check2-circle"></i>  Problème lors de l'insertion !</div>
<?php unset($_SESSION['addmatiere']);
 } ?>




<div class="col-xl-12 px-4  my-4">
<div class="shadow-lg card">
    <div class="card-header py-3 border-0 px-3">
        <h2 class="heading m-0 mr-5 ">La liste des matieres 

        </h2>
<div class="table-responsive">
<table class="table " style="padding-left:4px">
    <thead>
        <tr>
            <th scope="col">Nom Matière</th>
            <th scope="col">Nombre de Crédit</th>
            <th scope="col">Option</th>
        </tr>
    </thead>
    <?php
        foreach ( $allmatiere as $key) {
           $idmat = $key['idmatiere'];
        
        $rows = $matiere ->getOne($conn,$idmat);
        if ($rows > 0) {
            ?>
        <tr>
            <th scope="row"><?=$rows['nommatiere']?></th>
            <td scope="row"><?=$rows['nbrecreditmatiere']?></td>
            <td scope="row" class="d-flex">
                <?php require 'modifier-matiere.php' ?>

                <form action="controllers/matiere.php" onsubmit = "return Confirm()" class="mx-1" method="POST">
                    <input type="hidden" name="id" value="<?=$rows['idmatiere']?>">
                    <input type="hidden" name="idfiliere" value="<?=$idfiliere?>">
                    <button type="submit" name="supp" class="btn btn-outline-danger">
                        <i class="bi bi-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
  <?php
 }else {
echo "<tr><td colspan='3'>Aucun résultat trouvé</td></tr>"; 
}
}?></table>

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

