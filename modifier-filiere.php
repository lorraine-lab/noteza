<!-- Modal -->

<button type="button" class="btn btn-outline-primary my-2" data-bs-toggle="modal" data-bs-target="#edit<?=$row['idfiliere']?>">            
    <i class="bi bi-pen"></i>
</button>

<div class="modal fade" id="edit<?=$row['idfiliere']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modifier une filiere</h1>
              
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">
                <form action="controllers/filiere.php" method="POST">
                     <div class="mb-3">
                        <input type="text" class="form-control" id="codefiliere" value="<?=$row['codefiliere']?>" name="codefiliere" placeholder="Entrer le code de la filiere">
                        <input type="hidden" name="idfiliere" value="<?=$idfiliere?>">
                        <input type="hidden" name="id" value="<?=$row['idfiliere']?>">

                     </div>
                     <div class="mb-3">
                        <input type="text" class="form-control" id="nomfiliere" value="<?=$row['nomfiliere']?>" name="nomfiliere" placeholder="Entrer le nom de la filiere">
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

