<?php 
    require_once 'session.php';
    require_once 'connexion.php';
    require_once 'models/user.php';
    require_once 'models/filiere.php';



    $user = new User();
    $filiere = new Filiere();

    $allfiliere = $filiere -> AllFiliere($conn);



    require_once ('layouts/navbar.php'); 

    $nombreFiliere = $filiere -> getNumberOfFiliere($conn);

?>
<div class="container">
    <div class="row">
        <!-- <div class="col"> -->
            <!-- <div class="d-block"> -->
                <div class="col" style="margin-top:13px;">
                    
                    <div class="py-2 badge text-bg-primary"> Nous avons <?=$nombreFiliere?> Filières</div>
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
        <h2 class="heading m-0 mr-5 ">La liste des filières
            <?php require_once 'add-filiere.php' ?>
        </h2>
<div class="table-responsive">
<table class="table" style="padding-left:4px">
    <thead>
        <tr>
            <th scope="col">Code de la filière</th>
            <th scope="col">Nom</th>
            <th scope="col">Option</th>
        </tr>
    </thead>
    <?php
        $rows = $filiere ->AllFiliere($conn);
        if ($rows > 0) {
        foreach ($rows as $row) { ?>
        <tr>
            <th scope="row"><?=$row['codefiliere']?></th>
            <th scope="row"><a href="all-matiere.php?filiere=<?=$row['idfiliere']?>"><?=$row['nomfiliere']?></a></th>
            <td scope="row" class="d-flex">
               
            <?php require 'modifier-filiere.php'; ?>
                <form action="controllers/filiere.php" onsubmit = "return Confirm()" class="mx-1" method="POST">
                    <input type="hidden" name="idfiliere" value="<?=$row['idfiliere']?>" class="btn btn-outline-danger">
                    <button type="submit" name="supp" class="btn btn-outline-danger">
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

