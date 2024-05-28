<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hidden Shop</title>
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">

</head>

<style>
    .mycard {
        width: 100%;
        height: 50%;
    }

    .card-size {
        width: 200px;
        height: 350px;
    }

    .card-size:hover {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .navbar-nav .nav-link {
        font-weight: bold !important;

    }

    .navbar-nav .nav-link:hover {
        color: #1C274C !important;
        /* font-size: 15px !important; */
        transition: 0.5s;
    }
</style>


<body>


    <header>

        <nav class="navbar navbar-expand-md bg-light navbar-light fixed-top">

            <div class="container">
                <a class="navbar-brand text-dark" href="index.php">Hidden <span class="bg-danger bg-gradient p-1 rounded-3 text-light">Shop</span></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span></button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="index.php">Acceuil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="<?= base_url() ?>Users">Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="">
                                <?php if (session()->has('mail')) : ?>
                                    <?= session()->get('mail') ?>
                                <?php endif; ?>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="<?= base_url('logout') ?>">Déconnexion</a>
                        </li>
                    </ul>
                </div>

            </div>
            </div>

        </nav>


    </header>

    <section class="main-section py-4" style="margin-top:70px">
        <div class="container">
            <div class="col">

                <h4 class="fw-bold text-dark border-bottom">Les produits suivants sont disponible dans notre boutique
                </h4>
            </div>
            <div class="row">

                <?php foreach ($articles as $art) : ?>

                    <div class="col py-4">
                        <div class="card card-size">
                            <?php
                            // Convertit les données d'image en base64
                            $imgData = base64_encode($art['img']);

                            // Construit l'URL de données avec le type MIME de l'image
                            $imgUrl = 'data:image/jpeg;base64,' . $imgData;
                            ?>
                            <img src="<?php echo $imgUrl; ?>" class="card-img-top mycard" alt="<?php echo $art['designation']; ?>">
                            <div class="card-body">
                                <h5 class="card-title text-start fs-6 text-primary "><?php echo $art['designation']; ?></h5>
                                <p class="card-text"><span>Prix : </span><?php echo $art['prix']; ?><span> $</span></p>

                                <a class="btn btn-outline-primary" href="<?php echo base_url('Boutique') . '?id_produit=' . $art['id_produit']; ?>">Voir
                                    plus <i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>






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
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <footer style="background-color: #1C274C;" class="footer text-center">
        2024 © Hidden Dark Lab Tous droit réservé <br>
        <p class="text-start">Pour plus de question,
            <a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class=" fab fa-instagram"></i></a>
        </p>
    </footer>
</body>

</html>