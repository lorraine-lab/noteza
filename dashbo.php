<?php 
    require_once 'connexion.php';
    require_once 'models/user.php';
    require_once 'models/filiere.php';
    require_once 'models/matiere.php';



    $user = new User();
    $matiere = new Matiere();
    $filiere = new Filere();

?>
<!DOCTYPE html>
<html lang="fr">
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=experiment" />
        <!-- <link rel="stylesheet" href="css/animate.css"> -->
        <link rel="stylesheet" href="css/styles.css">
        <link rel="shortcut icon" type="image/png" href="images/favicon.png" >
        <link href="vendor/wow-master/css/libs/animate.css" rel="stylesheet">
        <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
        <link rel="stylesheet" href="vendor/bootstrap-select-country/css/bootstrap-select-country.min.css">
        <link rel="stylesheet" href="vendor/jquery-nice-select/css/nice-select.css">
        <link href="vendor/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=experiment" />
        
        <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="vendor/swiper/css/swiper-bundle.min.css">
        <style>
            @font-face {
    font-family: 'Material Icons';
    font-style: normal;
    font-weight: 400;
    src: url(flUhRq6tzZclQEJ-Vdg-IuiaDsNc.woff2) format('woff2');
    }

    .material-icons {
    font-family: 'Material Icons';
    font-weight: normal;
    font-style: normal;
    font-size: 24px;
    line-height: 1;
    letter-spacing: normal;
    text-transform: none;
    display: inline-block;
    white-space: nowrap;
    word-wrap: normal;
    direction: ltr;
    -webkit-font-feature-settings: 'liga';
    -webkit-font-smoothing: antialiased;
    }
        </style>
    </head>
    <body>
        <div id="main-wrapper" class="wallet-open active">
        
            <?php include 'layouts/nv.php'; ?>

                
            <?php include 'layouts/dl.php'; ?>
                

            <div class="wallet-bar-close"></div>
                

            <div class="content-body">
                <div class="container-fluid">
                    <?php
                        require_once 'layouts/long.php';
                    ?>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	
	<script src="vendor/apexchart/apexchart.js"></script>
	
    <script src="vendor/peity/jquery.peity.min.js"></script>
	<script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
	<script src="vendor/swiper/js/swiper-bundle.min.js"></script>
	
	
    
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>

	
	<script src="js/dashboard/dashboard-1.js"></script>
	<script src="vendor/wow-master/dist/wow.min.js"></script>
	<script src="vendor/bootstrap-datetimepicker/js/moment.js"></script>
	<script src="vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-select-country/js/bootstrap-select-country.min.js"></script>
	
	<script src="js/dlabnav-init.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/demo.js"></script>
</html>
