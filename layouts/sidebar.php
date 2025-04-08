<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mode Sombre et Plein Écran</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/sidebar.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            transition: background-color 0.3s, color 0.3s;
            background-color: #fff; /* Fond clair par défaut */
            color: #000; /* Texte noir par défaut */
        }

        /* Mode sombre */
        body.sombre {
            background-color: #121212;
            color: #e0e0e0; /* Texte clair en mode sombre */
        }

        /* Liens en mode sombre */
        body.sombre a {
            color: #bb86fc; /* Liens violets en mode sombre */
        }

        /* Styles pour les boutons */
        .btn {
            padding: 10px 15px;
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 5px;
            font-size: 20px;
        }

        /* Mode sombre pour les boutons */
        body.sombre .btn {
            background-color: #333;
            color: #e0e0e0; /* Texte clair en mode sombre */
        }

        /* Navbar style */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #007bff;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000; /* Pour qu'elle soit au-dessus de la sidebar */
        }

        /* Image utilisateur */
        .header_img {
            display: flex;
            align-items: center;
        }

        .header_img img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        /* Boutons pour mode sombre et plein écran */
        .header_buttons {
            display: flex;
            align-items: center;
            margin-left: 10px;
        }

        /* Sidebar */
        .l-navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #111;
            color: #fff;
            padding-top: 50px;
            z-index: 10; /* La sidebar doit être sous la navbar */
        }

        .height-100 {
            padding-top: 60px; /* Décalage pour éviter que la navbar ne masque le contenu */
        }
    </style>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <!-- Bouton burger à gauche -->
        <div class="header_toggle"> 
            <i class='bx bx-menu' id="header-toggle"></i> 
        </div>

        <!-- Les boutons pour le mode sombre et plein écran -->
        <div class="header_buttons">
            <!-- Bouton mode sombre/claire -->
            <button id="toggleMode" class="btn">
                <i class="fas fa-moon"></i> <!-- Icône pour le mode sombre -->
            </button>

            <!-- Bouton plein écran -->
            <button id="toggleFullscreen" class="btn">
                <i class="fas fa-expand"></i> <!-- Icône pour passer en plein écran -->
            </button>
        </div>

        <!-- Image de l'utilisateur -->
        <div class="header_img"> 
            <img src="https://i.imgur.com/hczKIze.jpg" alt=""> 
        </div>
    </header>

    <!-- Sidebar -->
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="#" class="nav_logo"> 
                    <i class='bx bx-layer nav_logo-icon'></i> 
                    <span class="nav_logo-name">BBBootstrap</span> 
                </a>
                <div class="nav_list"> 
                    <a href="#" class="nav_link active"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-user nav_icon'></i> 
                        <span class="nav_name">Users</span> 
                    </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-message-square-detail nav_icon'></i> 
                        <span class="nav_name">Messages</span> 
                    </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-bookmark nav_icon'></i> 
                        <span class="nav_name">Bookmark</span> 
                    </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-folder nav_icon'></i> 
                        <span class="nav_name">Files</span> 
                    </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                        <span class="nav_name">Stats</span> 
                    </a> 
                </div>
            </div>
            <a href="#" class="nav_link"> 
                <i class='bx bx-log-out nav_icon'></i> 
                <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>

    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>Main Components</h4>
    </div>
    <!--Container Main end-->

    <script>
        // Variables pour détecter l'état des modes
        const toggleModeButton = document.getElementById('toggleMode');
        const toggleFullscreenButton = document.getElementById('toggleFullscreen');
        const body = document.body;

        // Fonction pour basculer entre le mode sombre et clair
        toggleModeButton.addEventListener('click', function() {
            body.classList.toggle('sombre');  // Basculer la classe "sombre" sur le body
            if (body.classList.contains('sombre')) {
                toggleModeButton.innerHTML = '<i class="fas fa-sun"></i>';  // Icône du soleil pour le mode clair
            } else {
                toggleModeButton.innerHTML = '<i class="fas fa-moon"></i>';  // Icône de la lune pour le mode sombre
            }
        });

        // Fonction pour basculer entre le mode plein écran et sortir du plein écran
        toggleFullscreenButton.addEventListener('click', function() {
            if (!document.fullscreenElement) {
                // Passer en mode plein écran
                if (body.requestFullscreen) {
                    body.requestFullscreen();
                } else if (body.mozRequestFullScreen) { // Firefox
                    body.mozRequestFullScreen();
                } else if (body.webkitRequestFullscreen) { // Chrome, Safari, Opera
                    body.webkitRequestFullscreen();
                } else if (body.msRequestFullscreen) { // Internet Explorer/Edge
                    body.msRequestFullscreen();
                }
                toggleFullscreenButton.innerHTML = '<i class="fas fa-compress"></i>';  // Icône pour quitter le plein écran
            } else {
                // Quitter le plein écran
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) { // Firefox
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) { // Chrome, Safari, Opera
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) { // Internet Explorer/Edge
                    document.msExitFullscreen();
                }
                toggleFullscreenButton.innerHTML = '<i class="fas fa-expand"></i>';  // Icône pour entrer en plein écran
            }
        });
    </script>

</body>
</html>
