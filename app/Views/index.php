<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Philia Shop</title>
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/logo.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            width: 305px;
            height: 450px;
            display: flex;
            flex-direction: column;
        }

        .mycard .card-body {
            display: flex;
            flex-direction: column;
        }

        .mycard .btn {
            margin-top: auto;
        }

        .mycard:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }

        .navbar-nav .nav-link:hover {
            color: #1C274C !important;
            transition: 0.5s;
        }

        .card-hover-effect {
            transition: transform 0.3s ease-in-out;
        }

        .card-hover-effect:hover {
            transform: scale(1.05);
            cursor: pointer;
        }

        .bg-imaged {
            background-image: url('https://images.samsung.com/is/image/samsung/assets/africa_fr/01-hd01-ai-family-kv-pc-1440x640.jpg?imwidth=1366');
            background-size: cover;
            background-position: center;
            position: relative;
            color: white;
            padding: 20px;
            cursor: pointer;
        }

        .mybrand {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md bg-light navbar-light fixed-top p-3">
            <div class="container">
                <a href="<?= base_url() ?>">
                    <img class="rounded-pill mybrand" src="<?= base_url('assets/images/brand3.png') ?>" alt="" style="width: 210px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item link">
                            <a class="nav-link active fw-bold link text-primary" href="index.php"><i class="fas fa-home text-primary"></i>Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold link text-primary" href="<?= base_url() ?>Users"><i class="fas fa-user text-primary"></i>Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold link text-primary" href="<?= base_url() ?>panier_view"><i class="fa-solid fa-cart-plus fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid py-0">
        <section class="bg-image" style="background-image: url('https://images.unsplash.com/photo-1677794438539-b21f8632ab70?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');">
            <div class="row">
                <div class="col">
                    <div class="col-md-6">
                        <h2 class="text-light">Nos <span class="text-primary">Produits</span></h2>
                    </div>
                    <p class="text-light fw-lighter fs-4"><span class="border-bottom border-2 border-primary">Nos produits</span> tech le plus haut de gammes</p>
                    <a href="<?= base_url() ?>Article" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Voir plus de produits</a>
                </div>
            </div>
        </section>
    </div>
    <div class="container py-4">

        <div class="col-md-12 py-4 w-4">
            <div class="p-2 mb-2 bg-secondary text-white bg-imaged d-flex">
                <img class="rounded-pill" src="https://wp-pa.phonandroid.com/uploads/2022/07/Galaxy-S23-Technizo-concept-2.jpg" alt="" width="150px">
                <img class="rounded-pill" src="https://media.istockphoto.com/id/1470808049/photo/young-indian-male-employee-freelancer-businessman-stands-with-a-smartphone-in-hand.jpg?s=1024x1024&w=is&k=20&c=YJfRciBHwSHRd-O4K6nDI23sihMuSkXs5kCRb5iVu6k=" alt="" width="150px">
                <h4 class="text-primary">Vivez une experience d'achat pas comme les autres avec <span class="text-white">Philia Shop</span> </h4>
            </div>
        </div>
        <section class="main-section py-1">
            <div class="container">
                <h3 class="fw-lighter py-4"><span class="border-bottom border-primary border-2">Nos meilleurs</span> produits en vente</h3>
                <div class="row">
                    <?php foreach ($articles as $art) : ?>
                        <div class="col-md-4 my-custom-div d-flex justify-content-center align-items-center">
                            <div class="card mycard d-flex flex-column card-hover-effect">
                                <?php if (isset($art['img'])) : ?>
                                    <?php
                                    // Convertit les données d'image en base64
                                    $imgData = base64_encode($art['img']);

                                    // Construit l'URL de données avec le type MIME de l'image
                                    $imgUrl = 'data:image/jpeg;base64,' . $imgData;
                                    ?>
                                    <img src="<?php echo $imgUrl; ?>" class="card-img-top my-img" alt="<?php echo $art['designation']; ?>">
                                <?php else : ?>
                                    <img src="<?= base_url('assets/images/default.jpg') ?>" class="card-img-top my-img" alt="Image non disponible">
                                <?php endif; ?>
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

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

        <?php include('footer.php') ?>
</body>

</html>