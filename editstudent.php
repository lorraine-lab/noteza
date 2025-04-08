<!-- Modal -->

<button type="button" class="btn btn-outline-primary my-2" data-bs-toggle="modal" data-bs-target="#edit<?=$row['iduser']?>">            
    <i class="bi bi-pen"></i>
</button>
<?php 
  if($row['role'] == "student" ){ 

    $filliaire = $filiere->getOne($conn,$row['idfiliere']);
    $nomfiliere = $filliaire['nomfiliere'];
  }
?>


<div class="modal fade" id="edit<?=$row['iduser']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modifier <?php 
  if($row['role'] == "student" ){  echo "un etudiant";}else{ echo "un enseignant";} ?></h1>
              
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">
                <form action="controllers/user.php" method="POST">
                     <div class="mb-3">
                        <input type="text" class="my-2 form-control" id="nom" value="<?=$row['nom']?>" name="nom" placeholder="Entrer le nom de l'etudiant">
                        <input type="txet" class="my-2 form-control" name="prenom" value="<?=$row['prenom']?>" name="prenom" placeholder="Entrer le prenom de l'etudiant">
                        <input type="hidden"class="form-control" name="matricule" value="<?=$row['matricule']?>">
                        <input type="hidden" class="form-control" name="iduser" value="<?=$row['iduser']?>">
                        <input type="number"class=" my-2 form-control" name="numero" value="<?=$row['numero']?>" name="num" placeholder="Entrer le numero de telephone de l'etudiant">
                        <input type="hidden" name="role" value="<?=$row['role']?>">

                        <?php if($row['role'] == "student" ){ ?>
                            <div class="mb-3">
                                <select name="filiere" id="" class="form-select">
                                    <option selected value="<?=$filliaire['idfiliere']?>"><?=$nomfiliere?></option>
                                    <?php foreach ($allfiliere as $key) { ?>
                                    <option value="<?=$key['idfiliere']?>"><?=$key['nomfiliere']?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        <?php  } ?>
                     </div>
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <input type="submit" value="Ajouter" name="modif" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>
</div>

