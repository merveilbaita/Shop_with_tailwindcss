<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Philia Shop</title>
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        transition: 0.5s;
    }
    .card-hover-effect {
        transition: transform 0.3s ease-in-out;
    }
    .card-hover-effect:hover {
        transform: scale(1.05);
        cursor: pointer;
    }
</style>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-light navbar-light fixed-top">
            <div class="container-fluid">
                <div class="col">
                <a href="<?= base_url()?>">
                    <img class="rounded-pill mybrand" src="<?= base_url('assets/images/brand3.png') ?>" alt="" style="width: 210px;">
                </a>
                </div>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="<?= base_url() ?>"> <i class="fas fa-home text-primary"></i> Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="<?= base_url() ?>Users"><i class="fas fa-user text-primary"></i> Utilisateurs</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link fw-bold text-primary" href="<?= base_url('logout')?>">
                                <?php if (session()->has('mail')) : ?>
                                    <?= session()->get('mail') ?>
                                <?php endif; ?>
                            </a>
                        </li>
                        <form class="d-flex ms-3" action="<?= base_url('Article/search') ?>" method="get">
                            <input class="form-control me-2" id="searchInput" type="search" placeholder="Rechercher" aria-label="Rechercher" name="query">
                            <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </ul>
                </div>
            </div>
           
        </nav>
       
    </header>

    
    
    <section class="main-section py-4" style="margin-top:70px">
        <div class="container">
            
            <div class="col">
                <h4 class="fw-bold text-dark border-bottom">Les produits suivants sont disponibles dans notre boutique</h4>
            </div>

            <!-- Affiche les catégories -->
            <div class="col py-2">
                <h5> <i class="fas fa-box text-primary"></i> Catégories</h5>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="<?= base_url('Article/article') ?>" class="btn btn-outline-dark  fw-bold">Toutes</a></li>
                    <?php foreach ($categories as $cat) : ?>
                        <li class="list-inline-item"><a href="<?= base_url('Article/article/' . $cat['categories']) ?>" class="btn btn-outline-dark  fw-bold"><?= $cat['categories'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="row">
                <div class="col d-flex">
                    <a class="text-decoration-none fw-bold ms-2 text-primary" href="<?= base_url('commandes_utilisateur') ?>"><i class="fa-solid fa-cart-plus"></i> Voir mes commandes</a>    
                </div>
            </div>

            <div class="row">
                <?php foreach ($articles as $art) : ?>
                    <div class="col py-4">
                        <div class="card card-size card-hover-effect">
                            <?php
                            // Convertit les données d'image en base64
                            $imgData = base64_encode($art['img']);
                            // Construit l'URL de données avec le type MIME de l'image
                            $imgUrl = 'data:image/jpeg;base64,' . $imgData;
                            ?>
                            <img src="<?php echo $imgUrl; ?>" class="card-img-top mycard" alt="<?php echo $art['designation']; ?>">
                            <div class="card-body">
                                <h5 class="card-title text-start fs-6 text-primary"><?php echo $art['designation']; ?></h5>
                                <p class="card-text"><span>Prix : </span><?php echo $art['prix']; ?><span> $</span></p>
                                <a class="btn btn-outline-primary" href="<?php echo base_url('Boutique') . '?id_produit=' . $art['id_produit']; ?>"> Voir plus <i class=" fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div id="searchResultsContainer"></div>

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

    <?php include('footer.php') ?>
</body>

</html>