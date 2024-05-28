<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hidden Shop</title>
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/logo.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <style>
        .my-img {
            width: 285px;
            height: 320px;
        }

        .bg-image {
            background-size: cover;
            background-repeat: no-repeat;
            padding: 0 5%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            color: #424144;
            height: 100vh;
        }

        .mycard {
            /* box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3); */
            width: 305px;
            height: 450px;
        }

        .mycard:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .navbar-nav .nav-link:hover {
            color: #1C274C !important;
            /* font-size: 15px !important; */
            transition: 0.5s;
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md bg-light navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand text-dark" href="index.php">Hidden <span class="bg-danger bg-gradient p-1 rounded-3 text-light">Shop</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item link">
                            <a class="nav-link active fw-bold link" href="index.php">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold link " href="<?= base_url() ?>Users">Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold link" href="<?= base_url() ?>panier_view">Panier</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid py-3">
        <section class="bg-image" style="background-image: url(<?= base_url('assets/images/back.png') ?>);">
            <div class="row">
                <div class="col">
                    <div class="col-md-6">
                    <h2 class="text-light">Nos <span class="text-primary">Produits</span></h2>
                    </div>
                    <p class="text-light fw-lighter fs-4"><span class="border-bottom border-2 border-primary">Nos produits</span>  tech le plus haut de gammes</p>
                    <a href="<?= base_url() ?>Article" class="btn btn-outline-primary bi bi-arrow-right-short fas fa-box"><i class="fa fa-plus"></i> Voir plus de produits</a>
                </div>
            </div>
        </section>

        <section class="main-section py-4">
            <div class="container">
                <h3 class="fw-lighter py-4"><span class="border-bottom border-primary border-2">Nos meilleurs</span> produits en vente</h3>
                <div class="row">
                    <?php foreach ($articles as $art) : ?>
                        <div class="col-md-4 my-custom-div d-flex justify-content-center align-items-center">
                            <div class="card mycard">
                                <?php
                                // Convertit les données d'image en base64
                                $imgData = base64_encode($art['img']);

                                // Construit l'URL de données avec le type MIME de l'image
                                $imgUrl = 'data:image/jpeg;base64,' . $imgData;
                                ?>
                                <img src="<?php echo $imgUrl; ?>" class="card-img-top my-img" alt="<?php echo $art['designation']; ?>">
                                <div class="card-body">
                                    <h5 class="card-title text-start fs-6 text-primary "><?php echo $art['designation']; ?></h5>
                                    <p class="card-text fw-bold"><span>Prix : </span><?php echo $art['prix']; ?><span> $</span></p>
                                    <a class="btn btn-outline-primary" href="<?php echo base_url('Boutique') . '?id_produit=' . $art['id_produit']; ?>"><i class="fas fa-cart-plus"></i> Acheter</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    </div>

    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/custom.js"></script>
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>

   <footer style="background-color: #1C274C;" class="footer text-center">
    2024 © Hidden Dark Lab Tous droit réservé <br>
    <p class="text-start">Pour plus de question, 
    <a href=""><i class="fab fa-facebook"></i></a>
    <a href=""><i class="  fab fa-instagram"></i></a>
    </p>
   </footer>
</body>

</html>