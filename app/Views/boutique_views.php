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
    <link rel="stylesheet" href="<?= base_url()?>/public/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url()?>/public/css/icons/font-awesome/css/fontawesome-all.css">

    <style>
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
        @media (max-width: 768px) {
        .col-12 .btn-block {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-light navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand text-dark" href="<?= base_url('index.php') ?>">Hidden <span class="bg-danger bg-gradient p-1 rounded-3 text-light">Shop</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="<?= base_url('index.php') ?>">Accueil</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="<?= base_url('user.php') ?>">Utilisateurs</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="main-section py-4" style="margin-top:70px">
        <div class="container">
            <div class="col">
                <h4 class="fw-bold text-dark border-bottom border-3 py-3">Poursuivre votre achat</h4>
            </div>

            <div class="col">
                <?php if (session()->has('user_email')) : ?>
                    <p>Connecté en tant que: <?= session()->get('user_email') ?></p>
                <?php endif; ?>
            </div>

            <?php foreach ($article as $art) : ?>
                <div class="row">
                    <div class="col-md-4 py-4">
                        <?php
                        $imgData = base64_encode($art['img']);
                        $src = 'data:image/jpeg;base64,' . $imgData;
                        ?>
                        <img src="<?= $src; ?>" alt="Image du produit" style="max-width: 100%;">
                    </div>
                    <div class="col-md-8">
                        <h5 class="text-start fs-4 text-primary py-4"><?= $art['designation']; ?></h5>
                        <h5 class="text-start fs-6 text-primary">Description du produit</h5>
                        <p style="font-family: Century Gothic; text-align:justify" class="fw-lighter text py-4"><?= $art['description']; ?></p>

                        <form action="<?= base_url('ajouter_au_panier'); ?>" method="post">
                            <input type="hidden" name="id_produit" value="<?= $art['id_produit']; ?>">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <input class="form-control rounded-pill text-center fw-bold" name="quantite" type="number" placeholder="Quantité">
                                </div>
                                <div class="col-md-6 col-lg-4 mb-3 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-success btn-block rounded-pill"><i class="fas fa-cart-plus"></i> Ajouter au panier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>


    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <footer style="background-color: #1C274C;" class="footer text-center">
        2024 © Hidden Dark Lab Tous droit réservé <br>
        <p class="text-start">Pour plus de question,
            <a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
        </p>
    </footer>
</body>

</html>