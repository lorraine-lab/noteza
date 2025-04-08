<!-- Modal -->

<button type="button" class="btn btn-outline-primary my-2" data-bs-toggle="modal" data-bs-target="#edit<?=$rows['idmatiere']?>">            
    <i class="bi bi-pen"></i>
</button>

<div class="modal fade" id="edit<?=$rows['idmatiere']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modifier une matière</h1>
              
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      <div class="modal-body">
                <form action="controllers/matiere.php" method="POST">
                     <div class="mb-3">
                        <input type="text" class="form-control" id="codefiliere" value="<?=$rows['nbrecreditmatiere']?>" name="credit" placeholder="Entrer le nombre de crédit de la matière">
                        <input type="hidden" name="idfiliere" value="<?=$idfiliere?>">
                        <input type="hidden" name="id" value="<?=$rows['idmatiere']?>">

                     </div>
                     <div class="mb-3">
                        <input type="text" class="form-control" id="nomfiliere" value="<?=$rows['nommatiere']?>" name="nom" placeholder="Entrer le nom de la matière">
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

