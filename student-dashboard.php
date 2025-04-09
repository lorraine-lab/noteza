<?php 
    require_once 'session.php';
    require_once 'connexion.php';
    require_once 'models/user.php';
    require_once 'models/filiere.php';
    require_once 'models/note.php';
    require_once 'models/matiere.php';


    $user = new User();
    $filiere = new Filiere();
    $note = new Note();
    $matiere = new Matiere();

    $iduser = $_SESSION['iduser'];
    $infoUser = $user->getOne($conn,$iduser);
    $nomuser = $infoUser['nom'];
    $nomfiliere = $filiere -> getName($conn,$infoUser['idfiliere']);
    $allNotes = $note->allNoteByStudent($conn,$iduser);
    $rowcount = count($allNotes);

    function decision($donnee){
        $badge = "";
        if ($donnee<10) {
           $badge = '<div class="py-2 badge text-bg-danger">NON VALIDEE</div>';
        }else {
            $badge = '<div class="py-2 badge text-bg-success">VALIDEE</div>';
        }
        return $badge;
    }

    require_once ('layouts/navbar.php'); 

    // $nbreMatiere = $contient -> getNumberofMatiere($conn, $idfiliere);

?>
<!-- <div class="container">
    <div class="row"> -->
        <!-- <div class="col"> -->
            <!-- <div class="d-block"> -->
            <!-- </div> -->
        <!-- </div> -->
    <!-- </div>
</div> -->
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


    <div class="card-header py-3 border-0 px-3">
        <div class="row">
            <div class="col-md-6">
                <div class="fs-2 heading m-0 d-inline-block">
                    Bienvenue, <?=$nomuser?> !
                </div>
            </div>         
        </div>
    </div>

    <div class="col-xl-12 px-4  my-2">
        <div class="shadow-lg card">
            <div class="card-header py-3 border-0 px-3">
                <h2 class="heading m-0 mr-5 ">La liste de vos notes 

                </h2>
            <div class="table-responsive mt-2">
                <table class="table" style="padding-left:4px">
                    <thead>
                        <tr>
                            <th scope="col">Nom de la Matière</th>
                            <th scope="col">Nombre de Crédit</th>
                            <th scope="col">Type d'Examen </th>
                            <th scope="col">Note</th>
                            <th scope="col">Décision</th>
                        </tr>
                    </thead>
                    <?php
                    
                        
                        if ($rowcount > 0) {
                            foreach ( $allNotes as $key) {
                                $infoMatiere = $matiere->getOne($conn,$key['idmatiere']);
                            ?>
                        <tr>
                            <th scope="row"><?=$infoMatiere['nommatiere']?></th>
                            <td scope="row"><?=$infoMatiere['nbrecreditmatiere']?></td>
                            <td scope="row"><?=$key['type_examen']?></td>
                            <td scope="row"><?=$key['note']?></td>
                            <td scope="row"><?=decision($key['note'])?></td>
                        </tr>
                <?php
                }}else {
                echo "<tr><td colspan='5'>Vous n'avez pas encore de notes.</td></tr>"; 
                }
                ?>
                </table>
            </div>
        </div>
    </div>

