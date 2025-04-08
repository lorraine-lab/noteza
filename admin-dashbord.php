<?php 
    require_once 'session.php';
    require_once ('layouts/navbar.php'); 


    // if (!isset($_SESSION['superadmin'])) {
    //     header('location:loginadmin');
    //     exit();
    // }
?>
<html lang="fr"> 
    <div class="col-xl-12 px-4 my-4">
        <div class="shadow-lg card">
            <div class="card-header py-3 border-0 px-3">
                <div class="row">
                    <div class="col-md-6">
                        <div class="fs-2 heading m-0 d-inline-block">Bienvenue Administrateur  
                            <?php if (isset($_SESSION["superadmin"])) { ?>
                                <!-- <div class="col mx-0"> -->
                                    <a class="btn btn-outline-primary " href="listadmin.php">Gérer les Administrateur</a>  
                                <!-- </div>  -->
                            <?php }?>  
                            </div>
                    </div>         
                </div>
            </div>
            <div class="row">
                <div class="col-xl-9">
                    <h2 class="mx-4">Sur quoi allons nous travailler aujourd'hui ?</h2>
                </div>
            </div>
            <hr class="my-2">
            <div>
                <div class="row">						
                    <div class="row">
                        <!-- Pour les étudiants -->
                        <div class="col-xl-3 mx-2 my-5">
                            <div class="shadow-lg card">
                                <div class="card-header bg-success py-3 border-0 px-3" >
                                    <div class="heading m-0">
                                        <div class="text-light" style="font-size: 20px; font-weight: bold;  ">       
                                            <svg xmlns="http://www.w3.org/2000/svg"   width="65" height="65" style="margin:-45px -10px ;" viewBox="0 0 48 60" x="0px" y="0px">
                                                <g fill="#ffffff">
                                                <path d="M47.36,18.07l-23-9a1,1,0,0,0-.72,0l-23,9a1,1,0,0,0,0,1.86L8,22.81v9.11C8,34.32,16.64,39,24,39s16-4.68,16-7.08V22.81l3-1.18v9.6A4,4,0,0,0,41,35c0,2.24,1.32,4,3,4s3-1.76,3-4a4.06,4.06,0,0,0-2-3.76V20.85l2.34-.92a1,1,0,0,0,0-1.86ZM38,31.81C37.36,32.91,30.89,37,24,37s-13.36-4.09-14-5.19V23.6l13.64,5.33a1,1,0,0,0,.72,0L38,23.6ZM23.9,19l16.23,1.62L24,26.93,3.74,19,24,11.07,44.26,19l-.07,0-.07,0-20-2a1,1,0,0,0-.2,2ZM44,37c-.41,0-1-.78-1-2s.59-2,1-2,1,.78,1,2S44.41,37,44,37Z"/>
                                            </g>
                                            </svg>
                                            Etudiant
                                        </div>
                                    </div> 
                                </div>
                                <div class="card-body p-0 py-3 border-0 px-3">
                                    <div class="">
                                        <h5 class="card-title">Ici vous pouvez voir tous les étudiants enregistrés et gérer leurs notes.</h5>
                                    </div>
                                </div>
                                <div class="card-footer py-3 border-0 px-3 p-0">
                                    <div class="card-footer bg-transparent border-succes">
                                        <a href="all-students.php" style="text-decoration:none;">Voir les étudiants</a>                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 mx-2 my-5">
                            <div class="shadow-lg card">
                                <div class="card-header bg-danger py-3 border-0 px-3">
                                    <div class="text-light" style="font-size: 20px; font-weight: bold;  ">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  width="60" height="55" style="margin:-45px -10px ;" viewBox="0 0 285.285 357.01124999999996" style="enable-background:new 0 0 285.285 285.609;" xml:space="preserve">
                                            <g fill="#ffffff">
                                                <path d="M195.047,13.216c-6.504-1.814-12.576,1.088-13.221,8.719c-0.688,8.154,6.119,13.461,13.848,12.307   c1.771-0.266,0.035-1.729-1.041-1.568C180.121,34.845,182.115,9.21,196,15.117c0.443,0.188,1.99,0.414,1.85-0.486   c-1.252-8.051,3.244-14.57,11.896-12.688c3.01,0.652,5.867,2.406,7.389,5.127c1.898,3.404-0.346,7.043-2.736,9.461   c-0.775,0.783,1.543,1.436,2.051,1.24c5.459-2.105,10.768-1.006,11.291,5.525c0.389,4.873-3.332,8.746-8.195,7.207   c-1.266-0.402-2.072,0.68-0.697,1.322c4.25,1.992,5.295,6.053,2.484,9.758c-3.719,4.902-9.863,3.451-13.678-0.393   c-0.326-0.332-1.125-0.473-1.709-0.396c0.799-0.783,1.547-1.619,2.219-2.521c0.336-0.449-1.478-2.279-1.449-2.318   c-3.42,4.6-8.713,7.668-14.254,9.172c3.297-3.467,6.797-7.807,6.732-11.969c-0.01-0.746-1.475-1.932-1.479-2.185   c0.082,5.478-6.271,11.416-9.867,15.051c-0.225,0.227,1.1,2.358,1.449,2.318c5.715-0.654,11.629-2.98,15.996-6.928   c0.041,0.1,0.111,0.207,0.234,0.332c4.354,4.387,11.623,6.727,16.85,2.248c4.361-3.734,3.867-8.436,0.355-11.541   c4.715-0.152,8.061-3.922,7.621-9.406c-0.516-6.449-6.301-8.4-11.701-7.707c4.121-6.35-0.596-12.594-8.059-14.711   c-3.686-1.043-7.949-0.865-11.285,1.123C195.287,4.15,194.59,8.931,195.047,13.216z"/><path d="M200.018,28.019c4.105-2.627,9.828-1.066,11.543,3.729c0.367,1.027,1.723,2.051,1.088,0.281   c-2.014-5.635-8.053-10.16-13.824-6.473C198.225,25.941,199.535,28.324,200.018,28.019z"/><path d="M166.273,160.019c10.764-7.369,18.069-21.322,18.234-37.377c-4.09-0.757-8.558-2.346-13.904-4.945   c-0.525-0.258-1.016-0.564-1.48-0.9l-11.749,6.976l0.906,6.677l-9.5,12l-7.311-9.233l-22.299,13.239   c3.11,5.589,7.264,10.241,12.115,13.563c-5.687-2.907-10.532-7.181-14.071-12.379l4.429,96.384c0,6.83,5.537,12.363,12.363,12.363   c6.828,0,12.365-5.533,12.365-12.363V165.48c0.797,0.064,1.598,0.109,2.408,0.109c0.809,0,1.61-0.045,2.406-0.109v78.543   c0,6.83,5.537,12.363,12.365,12.363c6.826,0,12.363-5.533,12.363-12.363l4.43-96.381   C176.807,152.839,171.961,157.112,166.273,160.019z"/><path d="M189.321,105.17c-1.731-0.089-5.532-1.009-10.784-3.63c-3.965-1.949-8.76-0.314-10.707,3.65   c-1.951,3.963-0.316,8.758,3.648,10.707c7.029,3.418,12.748,5.229,18.25,5.279c0.438,0,0.876-0.019,1.314-0.046   c1.915-0.12,3.827-0.512,5.678-1.327c2.26-0.982,4.359-2.697,5.738-4.799c0-0.001,0.001-0.002,0.001-0.002   c0.005-0.008,0.011-0.014,0.016-0.021c1.723-2.611,2.333-5.538,2.327-8.169c-0.028-3.474-0.936-6.673-2.346-9.809l-13.173,7.821   L189.321,105.17z M189.141,106.14h0.002c0,0.002-0.002,0.002-0.002,0.002V106.14z"/>
                                                <circle cx="148.781" cy="44.702" r="24"/>
                                                <path d="M188.375,103.039l24.537-14.569l-2.041-3.438l-27.653,16.419C185.476,102.351,187.227,102.831,188.375,103.039z"/>
                                                <path d="M107.964,150.785l59.6-35.389c-0.889-0.99-1.579-2.155-2.02-3.451l-57.493,34.136c0.025-0.807,0.06-1.596,0.094-2.383   c0.62-14.014,2.719-24.869,5.561-33.185c0.001-0.003,0.003-0.006,0.004-0.009c0.763-2.208,1.574-4.219,2.417-6.088   c-0.956,2.614-1.707,5.363-2.228,8.22c-0.554,3.045-0.855,6.205-0.855,9.452c0,6.039,1.013,11.789,2.839,17.016l24.173-14.353   l4.698-34.625c1.297,0.486,2.662,0.74,4.026,0.739h0.002h0.006c1.363,0,2.726-0.254,4.021-0.74l3.398,25.036l8.873-5.269   c-0.229-1.9,0.091-3.828,0.956-5.586c1.693-3.447,5.131-5.59,8.979-5.59c1.537,0,3.02,0.346,4.406,1.027   c0.012,0.006,0.023,0.011,0.034,0.017c-1.063-2.16-2.28-4.193-3.626-6.089v-3.688c2.364,1.69,4.461,3.519,6.248,5.387   c0.01,0.01,0.019,0.017,0.029,0.027c0.927,0.969,1.763,1.943,2.505,2.897l13.828-8.21c-1.397-1.955-2.991-3.88-4.784-5.757   c-0.009-0.009-0.017-0.02-0.025-0.029c-7.298-7.608-17.984-14.541-31.151-17.514c-3.98,2.477-8.673,3.913-13.696,3.913   c-5.035,0-9.736-1.442-13.723-3.93c-3.484,0.965-7.351,2.477-11.336,4.844c-9.505,5.606-19.207,16.146-25.154,33.718l0,0   c-4.118,12.06-6.615,27.416-6.618,47.13c0,0.279,0.004,0.567,0.005,0.849c0.003,0.765,0.008,1.534,0.02,2.314l-2.061,1.224   l2.041,3.441l0.428-0.254c0.204,0.648,0.491,1.258,0.844,1.822c1.417,2.268,3.928,3.773,6.78,3.774   c0.062,0,0.123-0.001,0.186-0.003c4.417-0.103,7.916-3.765,7.815-8.182c-0.035-1.476-0.046-2.912-0.05-4.336   c-0.001-0.213-0.008-0.438-0.008-0.65C107.95,151.894,107.959,151.344,107.964,150.785z M158.767,98.169v-5h14.5v5H158.767z    M148.781,77.949h3.799l1.9,7.5l-0.289,0.456c-1.565,1.306-3.484,1.96-5.412,1.962c-1.928-0.002-3.843-0.655-5.407-1.958   l-0.292-0.46l1.9-7.5H148.781z"/>
                                                <path d="M64.428,143.314c0.262,0,0.52,0.018,0.777,0.033l0.229,0.014c0.019,0,0.037,0,0.057,0c0.42,0,0.861,0.043,1.328,0.125   c1.61,0.215,3.18,0.649,4.686,1.265c2.359-3.386,3.752-7.495,3.752-11.935c0-11.549-9.359-20.91-20.91-20.91   c-11.549,0-20.91,9.361-20.91,20.91c0,3.849,1.058,7.443,2.872,10.541H63.57C63.853,143.331,64.141,143.314,64.428,143.314z"/>
                                                <path d="M25.787,168.015v34.051h45.617v-34.039c0.588,0.551,1.267,0.99,1.998,1.312v35.551   c7.787-12.371,11.063-23.646,11.075-33.218c0-3.872-0.549-7.45-1.572-10.683c-0.021-0.074-0.036-0.148-0.06-0.222   c-0.786-2.414-1.854-4.626-3.167-6.597c-1.085-1.628-2.336-3.095-3.763-4.351c-2.619-2.314-5.893-3.9-9.41-4.355   c-0.357-0.066-0.725-0.105-1.102-0.105h-0.082c-0.297-0.018-0.594-0.045-0.895-0.045c-0.258,0-0.512,0.018-0.764,0.045H33.516   c-0.248-0.027-0.498-0.043-0.754-0.043c-4.109-0.025-8.254,1.5-11.424,4.285c-2.285,1.985-4.065,4.529-5.356,7.442   c-0.513,1.157-0.955,2.367-1.311,3.632c-0.009,0.032-0.014,0.064-0.022,0.096c-0.83,2.992-1.247,6.277-1.247,9.858   c0.024,9.911,3.112,22.119,10.384,36.913v-38.4C24.509,168.877,25.186,168.497,25.787,168.015z"/>
                                                <path d="M71.404,207.066H25.787v68.168c0,5.729,4.647,10.375,10.377,10.375c5.729,0,10.375-4.646,10.375-10.375v-49.416h4.113   v49.416c0,5.729,4.646,10.375,10.377,10.375c5.729,0,10.375-4.646,10.375-10.375V207.066z"/>
                                                <path d="M220.08,143.361c0.02,0,0.039,0,0.057,0l0.229-0.014c0.258-0.016,0.516-0.033,0.777-0.033c0.289,0,0.574,0.018,0.857,0.043   h27.264c1.814-3.098,2.871-6.692,2.871-10.541c0-11.549-9.359-20.91-20.908-20.91c-11.551,0-20.91,9.361-20.91,20.91   c0,4.439,1.393,8.549,3.752,11.935c1.506-0.616,3.073-1.05,4.684-1.265C219.219,143.404,219.662,143.361,220.08,143.361z"/>
                                                <path d="M214.168,168.027v34.039h45.615v-34.051c0.602,0.482,1.278,0.861,2,1.127v38.396c7.269-14.794,10.356-26.998,10.38-36.908   c0-3.52-0.404-6.749-1.207-9.702c-0.02-0.084-0.034-0.168-0.058-0.252c-0.354-1.265-0.797-2.475-1.31-3.632   c-1.289-2.914-3.069-5.457-5.357-7.442c-3.17-2.785-7.314-4.311-11.424-4.285c-0.254,0-0.506,0.016-0.754,0.043h-30.148   c-0.252-0.027-0.506-0.045-0.764-0.045c-0.301,0-0.596,0.027-0.895,0.045h-0.08c-0.379,0-0.746,0.039-1.104,0.105   c-3.516,0.455-6.791,2.041-9.41,4.355c-1.427,1.256-2.678,2.723-3.763,4.351c-1.305,1.958-2.365,4.154-3.148,6.551   c-0.005,0.015-0.012,0.028-0.017,0.043h-0.002c-1.068,3.29-1.634,6.947-1.634,10.905c0.011,9.572,3.286,20.849,11.077,33.222   v-35.553C212.899,169.017,213.579,168.578,214.168,168.027z"/>
                                                <path d="M259.783,207.066h-45.615v68.168c0,5.729,4.646,10.375,10.375,10.375c5.73,0,10.377-4.646,10.377-10.375v-49.416h4.113   v49.416c0,5.729,4.646,10.375,10.373,10.375c5.732,0,10.377-4.646,10.377-10.375V207.066z"/>
                                                <rect y="225.583" width="22" height="5.334"/>
                                                <rect x="263.285" y="225.583" width="22" height="5.334"/><rect x="75" y="225.583" width="42" height="5.334"/>
                                                <rect x="180" y="225.583" width="30.285" height="5.334"/>
                                            </g>
                                        </svg>
                                            Enseigants
                                        </div>
                                </div>
                                <div class="card-body p-0 py-3 border-0 px-3">
                                    <div class="">
                                        <h5 class="card-title">Ici vous pouvez voir tous les enseignants de Noteza enregistrées.</h5>
                                    </div>
                                </div>
                                <div class="card-footer py-3 border-0 px-3 p-0">
                                    <div class="card-footer bg-transparent border-danger">
                                        <a href="all-teacher.php" style="text-decoration:none;">Voir nos enseignants</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-3 mx-2 my-5">
                            <div class="shadow-lg card">
                                <div class="card-header py-3 border-0 px-3" style="background: linear-gradient(120deg, #C973FF, #AEBAF8);">
                                    <div class="text-light" style="font-size: 20px; font-weight: bold;  ">                    
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  width="70" height="60" style="margin:-20px -13px ;" viewBox="0 0 100 125"  style="enable-background:new 0 0 100 100;" xml:space="preserve">
                                            <g fill="#ffffff">
                                            <path d="M50,99c-2.4,0-4.1-2.2-5.7-4.1c-0.9-1.1-2-2.6-2.7-2.7c-0.7-0.2-2.4,0.8-3.7,1.5c-2.2,1.2-4.5,2.5-6.7,1.6  c-2.2-0.9-2.9-3.5-3.6-5.9c-0.4-1.3-0.9-3.2-1.5-3.6c-0.6-0.4-2.5-0.2-3.9,0c-2.5,0.3-5.2,0.6-6.8-1.1c-1.7-1.7-1.4-4.3-1.1-6.8  c0.2-1.4,0.4-3.3,0-3.9c-0.4-0.6-2.2-1.1-3.6-1.5c-2.5-0.7-5-1.4-5.9-3.6c-0.9-2.2,0.4-4.5,1.6-6.7C7,60.8,8,59.1,7.8,58.4  c-0.1-0.7-1.6-1.9-2.7-2.7C3.2,54.1,1,52.4,1,50s2.2-4.1,4.1-5.7c1.1-0.9,2.6-2,2.7-2.7C8,40.9,7,39.2,6.3,37.9  c-1.2-2.2-2.5-4.5-1.6-6.7c0.9-2.2,3.5-2.9,5.9-3.6c1.3-0.4,3.2-0.9,3.6-1.5c0.4-0.6,0.2-2.5,0-3.9c-0.3-2.5-0.6-5.2,1.1-6.8  c1.7-1.7,4.3-1.4,6.8-1.1c1.4,0.2,3.3,0.4,3.9,0c0.6-0.4,1.1-2.2,1.5-3.6c0.7-2.5,1.4-5,3.6-5.9c2.2-0.9,4.5,0.4,6.7,1.6  C39.2,7,40.9,8,41.6,7.8c0.7-0.1,1.9-1.6,2.7-2.7C45.9,3.2,47.6,1,50,1s4.1,2.2,5.7,4.1c0.9,1.1,2,2.6,2.7,2.7  C59.1,8,60.8,7,62.1,6.3c2.2-1.2,4.5-2.5,6.7-1.6c2.2,0.9,2.9,3.5,3.6,5.9c0.4,1.3,0.9,3.2,1.5,3.6c0.6,0.4,2.5,0.2,3.9,0  c2.5-0.3,5.2-0.6,6.8,1.1c1.7,1.7,1.4,4.3,1.1,6.8c-0.2,1.4-0.4,3.3,0,3.9c0.4,0.6,2.2,1.1,3.6,1.5c2.5,0.7,5,1.4,5.9,3.6  c0.9,2.2-0.4,4.5-1.6,6.7c-0.7,1.2-1.6,2.9-1.5,3.7c0.1,0.7,1.6,1.9,2.7,2.7c1.9,1.5,4.1,3.3,4.1,5.7s-2.2,4.1-4.1,5.7  c-1.1,0.9-2.6,2-2.7,2.7c-0.1,0.7,0.8,2.4,1.5,3.7c1.2,2.2,2.5,4.5,1.6,6.7c-0.9,2.2-3.5,2.9-5.9,3.6c-1.3,0.4-3.2,0.9-3.6,1.5  c-0.4,0.6-0.2,2.5,0,3.9c0.3,2.5,0.6,5.2-1.1,6.8c-1.7,1.7-4.3,1.4-6.8,1.1c-1.4-0.2-3.3-0.4-3.9,0c-0.6,0.4-1.1,2.2-1.5,3.6  c-0.7,2.5-1.4,5-3.6,5.9c-2.2,0.9-4.5-0.4-6.7-1.6c-1.2-0.7-2.9-1.6-3.7-1.5c-0.7,0.1-1.9,1.6-2.7,2.7C54.1,96.8,52.4,99,50,99z   M41.5,88.7c0.3,0,0.6,0,0.8,0.1c1.9,0.4,3.4,2.2,4.8,4c0.9,1.1,2.2,2.8,2.9,2.8s2.1-1.7,2.9-2.8c1.4-1.8,2.8-3.6,4.8-4  c2-0.4,4.1,0.7,6.1,1.9c1.1,0.6,3,1.7,3.6,1.4c0.6-0.3,1.2-2.3,1.6-3.7c0.6-2.2,1.3-4.4,2.9-5.5c1.7-1.1,4-0.9,6.3-0.6  c1.3,0.1,3.5,0.4,4-0.1c0.5-0.5,0.2-2.7,0.1-4c-0.3-2.3-0.5-4.6,0.6-6.3c1.1-1.7,3.4-2.3,5.5-2.9c1.4-0.4,3.4-1,3.7-1.6  c0.2-0.6-0.8-2.5-1.4-3.6c-1.1-2-2.3-4.1-1.9-6.1c0.4-1.9,2.2-3.4,4-4.8c1.1-0.9,2.8-2.2,2.8-2.9s-1.7-2.1-2.8-2.9  c-1.8-1.4-3.6-2.8-4-4.8c-0.4-2,0.7-4.1,1.9-6.1c0.6-1.1,1.7-3,1.4-3.6c-0.3-0.6-2.3-1.2-3.7-1.6c-2.2-0.6-4.4-1.3-5.5-2.9  c-1.1-1.7-0.9-4-0.6-6.3c0.1-1.3,0.4-3.5-0.1-4c-0.5-0.5-2.7-0.2-4-0.1c-2.3,0.3-4.6,0.5-6.3-0.6c-1.7-1.1-2.3-3.4-2.9-5.5  c-0.4-1.4-1-3.4-1.6-3.7c-0.6-0.2-2.5,0.8-3.6,1.4c-2,1.1-4.1,2.3-6.1,1.9c-1.9-0.4-3.4-2.2-4.8-4c-0.9-1.1-2.2-2.8-2.9-2.8  s-2.1,1.7-2.9,2.8c-1.4,1.8-2.8,3.6-4.8,4c-2,0.4-4.1-0.7-6.1-1.9c-1.1-0.6-3-1.7-3.6-1.4c-0.6,0.3-1.2,2.3-1.6,3.7  c-0.6,2.2-1.3,4.4-2.9,5.5c-1.7,1.1-4,0.9-6.3,0.6c-1.3-0.1-3.5-0.4-4,0.1c-0.5,0.5-0.2,2.7-0.1,4c0.3,2.3,0.5,4.6-0.6,6.3  c-1.1,1.7-3.4,2.3-5.5,2.9c-1.4,0.4-3.4,1-3.7,1.6c-0.2,0.6,0.8,2.5,1.4,3.6c1.1,2,2.3,4.1,1.9,6.1c-0.4,1.9-2.2,3.4-4,4.8  c-1.1,0.9-2.8,2.2-2.8,2.9s1.7,2.1,2.8,2.9c1.8,1.4,3.6,2.8,4,4.8c0.4,2-0.7,4.1-1.9,6.1c-0.6,1.1-1.7,3-1.4,3.6  c0.3,0.6,2.3,1.2,3.7,1.6c2.2,0.6,4.4,1.3,5.5,2.9c1.1,1.7,0.9,4,0.6,6.3c-0.1,1.3-0.4,3.5,0.1,4c0.5,0.5,2.7,0.2,4,0.1  c2.3-0.3,4.6-0.5,6.3,0.6c1.7,1.1,2.3,3.4,2.9,5.5c0.4,1.4,1,3.4,1.6,3.7c0.6,0.3,2.5-0.8,3.6-1.4C37.9,89.6,39.7,88.7,41.5,88.7z"/>
                                            <path d="M65,73.2H35.8c-0.7,0-1.2,0.6-1.2,1.2s0.6,1.2,1.2,1.2H65c0.7,0,1.2-0.6,1.2-1.2S65.7,73.2,65,73.2z"/>
                                            <path d="M31.8,36.7c1.7,0,3.2-1.4,3.2-3.2c0-0.2,0-0.5-0.1-0.7h14.3v36.3h-8.5c-0.7,0-1.2,0.6-1.2,1.2  s0.6,1.2,1.2,1.2h19.4c0.7,0,1.2-0.6,1.2-1.2s-0.6-1.2-1.2-1.2h-8.5V32.8h14.3c0,0.2-0.1,0.4-0.1,0.7c0,1.7,1.4,3.2,3.2,3.2  c1.7,0,3.2-1.4,3.2-3.2c0-1.7-1.3-3-2.9-3.1c-0.1,0-0.2,0-0.3,0H51.6v-5.6c0-0.7-0.6-1.2-1.2-1.2s-1.2,0.6-1.2,1.2v5.6H31.8  c-0.1,0-0.2,0-0.3,0c-1.6,0.1-2.9,1.5-2.9,3.1C28.6,35.3,30,36.7,31.8,36.7z"/>
                                            <path d="M39.6,53.9C39.6,53.9,39.6,53.9,39.6,53.9c0-0.1,0-0.1,0-0.2c0,0,0-0.1,0-0.1c0,0,0-0.1,0-0.1  c0,0,0-0.1,0-0.1c0,0,0,0,0,0l-6.6-14.5c-0.2-0.4-0.6-0.7-1.1-0.7c-0.5,0-0.9,0.3-1.1,0.7l-6.9,14.5c0,0,0,0,0,0c0,0,0,0.1,0,0.1  c0,0,0,0.1,0,0.1c0,0,0,0.1,0,0.1c0,0,0,0.1,0,0.1c0,0,0,0,0,0c0,3.5,3.4,6.3,7.7,6.5c0.1,0,0.1,0,0.2,0c0.1,0,0.2,0,0.3,0  c0.1,0,0.1,0,0.2,0C36.2,60.2,39.6,57.4,39.6,53.9z M31.8,42.4l4.7,10.3h-9.6L31.8,42.4z"/>
                                            <path d="M77,53.9c0,0,0-0.1,0-0.1c0,0,0-0.1,0-0.1c0,0,0-0.1,0-0.1c0,0,0-0.1,0-0.1c0,0,0,0,0,0l-6.8-14.5  c-0.2-0.4-0.6-0.7-1.1-0.7c-0.5,0-0.9,0.3-1.1,0.7l-6.8,14.5c0,0,0,0,0,0c0,0,0,0.1,0,0.1c0,0,0,0.1,0,0.1c0,0,0,0.1,0,0.1  c0,0,0,0.1,0,0.1c0,0,0,0,0,0c0,3.5,3.4,6.3,7.7,6.5c0.1,0,0.1,0,0.2,0c0.1,0,0.2,0,0.3,0c0.1,0,0.1,0,0.2,0  C73.6,60.2,77,57.4,77,53.9C77,53.9,77,53.9,77,53.9z M69,42.4l4.8,10.3h-9.6L69,42.4z"/>
                                            </g>
                                        </svg>
                                        Filière
                                    </div>
                                </div>
                                <div class="card-body p-0 py-3 border-0 px-3">
                                    <div class="">
                                        <h5 class="card-title">Ici vous pouvez voir la liste des filières
                                        </h5>
                                    </div>
                                </div>
                                <div class="card-footer py-3 border-0 px-3 p-0">
                                    <div class="card-footer bg-transparent border-danger">
                                        <a href="all-filieres.php" style="text-decoration:none;">Voir les filières</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

