<?php 
    require_once 'session.php';
    require 'connexion.php';
    require 'models/filiere.php';
    require 'models/matiere.php';
    require 'models/user.php';
    require_once ('layouts/navbar.php'); 
    
    $filiere = new Filiere();
    $user = new USer();

    $allteacher = $user -> AllEnseignants($conn);



?>
<div class="col-xl-12 px-4 my-4">
    <div class="shadow-lg card">
        <div class="card-header py-3 border-0 px-3">
            <div class="jumbotron">
                <div class="d-flex">
                    <div class="display-2 me-3">Nos Filières</div>
                    <div class="mt-5">
                    <a class="btn btn-outline-primary mt-auto" href="#staticBackdrop" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Ajouter une filière.</a>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter une filière</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <center><span id="erreur-aff" class="text-danger fs-6"></span></center>
                                    <form onsubmit="return validForm()" action="controllers/classe.php" method="post">        
                                        <div class="modal-body">
                                            <span id="erreur-spec" class="text-danger fs-6" ></span>

                                            <input id="codespec" class="form-control mb-3" type="text" name="nom" value="<?php if (isset($_SESSION['form_data']['nom'])){ echo $_SESSION['form_data']['nom']; } ?>" placeholder="Entrez le nom de la filière">   
                                                
                                            <input id="niv" class="form-control mb-3" type="text" name="code" value="<?php if (isset($_SESSION['form_data']['code'])){ echo $_SESSION['form_data']['nom']; } ?>" placeholder="Entrez le code filière">   

                                            <div class="mb-3">
                                                <select name="responsable" id="choixetu" class="form-select">
                                                    <option value="err" id="">Choisisser le responsable</option>
                                                    <?php foreach ($allteacher as $key) {
                                                        echo '<option value="'.htmlspecialchars($key['iduser']).'">'.htmlspecialchars($key['nom']).' '.htmlspecialchars($key['prenom']).'</option>';
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermez</button>
                                            <button type="submit" name="addclass" class="btn btn-outline-primary">Ajouter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                 <div class="table-responsive">
                <table class="table " style="padding-left:4px; ">
                    <thead>
                        <tr>
                            <th scope="col">Intitulé</th>
                            <th scope="col">Code Filères</th>
                            <th scope="col">Responsable Filères</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <?php
                        $rows = $filiere -> AllFiliere($conn);
                        if ($rows > 0) {
                        foreach($rows as $row) {  
                        $nomResponsable = $user -> getName($conn,$row['responsablefiliere']);
                    ?>
                    <tr>
                        <th scope="row"><?=$row['nomfiliere']?></th>
                        <th scope="row"><?=$row['codefiliere']?></th>
                        <th scope="row"><?=$nomResponsable?></th>
                        <td scope="row" class="d-flex">
                            <a class="btn btn-outline-primary " href="#modif<?=$row['idfiliere']?>" data-bs-toggle="modal" data-bs-target="#modif<?=$row['idfiliere']?>"><i class="bi bi-pen"></i></a>
                            <div class="modal fade" id="modif<?=$row['idfiliere']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel<?=$row['idfiliere']?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel<?=$row['idfiliere']?>">Modifiez les filières</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <?php $info = $filiere -> getOne($conn,$row['idfiliere']); ?>     
                                        <form class="form" method="POST" action="/modifAdmin"> 
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <center><?php if(isset($_SESSION['errradminmail'])){ echo $_SESSION['errradminmail']; } ?> </center> 
                                                    <div class="mb-3">
                                                        <input type="hidden" name="id" value="<?=$info['idfiliere'] ?>">
                                                        <input id="nom" class="form-control" type="text" name="nom" value="<?=$info['nom']?>" placeholder="Entrez son nom" style="margin-top: -13px;">   
                                                    </div>
                                                    <div class="mb-3">
                                                        <input id="prenom" class="form-control" type="text" name="prenom" title="Inpit title" placeholder="Entrez son prenom" value="<?=$info['nomspec'] ?>">
                                                        <span id="erreur-prenom" style="color:red; font-size:13px;"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermez</button>
                                                <input type="submit" name="Envoyez" class="btn btn-outline-primary" value="Modifier">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <form class="mx-1" onsubmit="return Confirm()" action="controller/filière.php" method="post">
                                <input type="hidden" name="idspec" value="<?=$row['idfiliere']?>">
                                <button type="submit" name="suppspec" id="supp" class="btn btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php
                    } }else { ?>
                    <tr>
                        <td colspan='4'>Aucun résultat trouvé</td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div> 
    </div>  
</div> 
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
<script src="js/addclass.js"></script>

