<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Ajouter une matière
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter une matière</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="controllers/matiere.php" method="post">
        <div class="modal-body">
            <div class="mb-3">
            <select multiple  name="filiere[]" class="form-select">
                <option value="error" selected disabled>Faites le choix de la filière</option>
                <?php foreach ($allfiliere as $key) { ?>
                <option value="<?=$key['idfiliere']?>"><?=$key['nomfiliere']?></option>
                <?php  } ?>
            </select>


            </div>

            <div id="element" >
                <div class="mb-3">
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom">
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" id="prenom" name="credit" placeholder="Entrer le nombre de crédit">
                </div>
                
                <div class="mb-3">
                    <select name="iduser" id="" class="form-select">
                        <option value="error">Faites le choix de  l'enseignant</option>
                        <?php foreach ($allenseignant as $key) { ?>
                            <option value="<?=$key['iduser']?>"><?=$key['nom']." ".$key['prenom']?></option>
                        <?php  } ?>
                    </select>
                </div>
            
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
            <input type="submit" class="btn btn-primary" id="btn" value="Ajouter" name="choixfiliere" >
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  const element = document.getElementById('element');
  const filiere = document.getElementById('filiere');
  const btn = document.getElementById('btn');
  const nom = document.getElementById('nom');
  const prenom = document.getElementById('prenom');

  // Vérifie si au moins une vraie filière est sélectionnée
  function hasValidFiliereSelected() {
    const selectedOptions = Array.from(filiere.selectedOptions);
    return selectedOptions.length > 0 && selectedOptions.some(option => option.value !== "error");
  }

  // Active/désactive le bouton selon le remplissage
  function checkFields() {
    const nomValide = nom.value.trim() !== "";
    const creditValide = prenom.value.trim() !== "";
    const filiereValide = hasValidFiliereSelected();

    if (nomValide && creditValide && filiereValide) {
      btn.disabled = false;
    } else {
      btn.disabled = true;
    }
  }

  // Quand on change de sélection de filière
  filiere.addEventListener('change', function () {
    if (hasValidFiliereSelected()) {
      element.style.display = 'block';
    } else {
      element.style.display = 'none';
    }
    checkFields(); // Vérifie si tous les champs sont OK
  });

  // Vérifie les champs en live
  nom.addEventListener('input', checkFields);
  prenom.addEventListener('input', checkFields);
</script>
