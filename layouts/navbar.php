<?php 
// if (!isset($_SESSION['idadmin'])) {
//   header('location:loginadmin');
//   exit();
// }
if (isset($_GET['deconnect'])) {
  session_unset();
  session_destroy();
  header('Location:index.php');
  exit();
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Noteza</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Intégration des icônes bootstrap -->
    <!-- <link rel="stylesheet" href="../css/bootstrapFont.css"> -->
    <!-- Intégration du css bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand text-light" style="font-weight: bold;" href="admin-dashbord.php">Noteza</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if($_SESSION['role'] == "admin"){  ?>
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                  Etudiant
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="all-students.php">Liste étudiants</a></li>
                  <li><a class="dropdown-item" href="add-student.php">Ajouter un étudiant</a></li>
                  <li><a class="dropdown-item" href="listclasse.php">Gérer les </a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                  Enseignants
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="all-teacher.php">Liste des Enseignants</a></li>
                  <li><a class="dropdown-item" href="add-teacher.php">Ajouter un Enseignant</a></li>
                  <li>
                      
                  </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                  Filiere
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="all-filieres.php">Liste des filières  </a></li>
                </ul>
            </li>
          </ul> 
          <?php   } ?>
            <div style="display:flex; " class="justify-content-end" >
                <ul class="nav nav-pills">
                    <div class="btn-group dropstart">
                        <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                            </svg>
                        </button> 
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Connexion</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="?deconnect">Deconnexion</a></li>
                        </ul>
                    </div>
                </ul> 
            </div>
        </div>
    </div>
</nav>
<div class="my-4"><br></div>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<script src="js/bootstrap.bundle.js"></script>