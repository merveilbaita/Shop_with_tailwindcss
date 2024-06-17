<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mes Commandes</title>
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

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

    .mycard {
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

    .main {
        margin-top: 80px;
    }

    .sidebar {
        min-height: 100vh;
    }
</style>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-light navbar-light fixed-top">
            <div class="container">
            <a href="<?= base_url()?>">
                    <img class="rounded-pill mybrand" src="<?= base_url('assets/images/brand3.png') ?>" alt="" style="width: 210px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="<?= base_url('index.php') ?>"><i class="fa fa-home"></i> Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="<?= base_url('panier_view') ?>"><i class="fa-solid fa-cart-plus fs-3"></i> (<span id="panier-quantite"><?= $quantite_totale ?? 0 ?></span>)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="<?= base_url('Article') ?>"><i class="fa-solid fa-shop"></i> Shop</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="col py-3">
        <section class="main">
            <div class="container mt-5">
                <div class="col-md-8 mx-auto">
                    <h4 class="fw-bold border-bottom text-primary mb-4">Mes Commandes</h4>
                    <?php if (count($commandes) > 0) : ?>
                        <?php foreach ($commandes as $commande) : ?>
                            <div class="card mb-4 mycard">
                                <div class="card-body">
                                    <h5 class="card-title text-center border-bottom py-2"><i class="fa-regular fa-calendar"></i> Commande du <?= date('d/m/Y', strtotime($commande['date_ajout'])) ?></h5>
                                    <p class="card-text"><strong>Produit :</strong> <?= $commande['designation'] ?></p>
                                    <p class="card-text"><strong>Quantité :</strong> <?= $commande['qte'] ?></p>
                                    <p class="card-text"><strong>Adresse :</strong> <?= $commande['adresse'] ?></p>
                                    <p class="card-text"><strong>Ville :</strong> <?= $commande['ville'] ?></p>
                                    <p class="card-text"><strong>Code Postal :</strong> <?= $commande['code_postal'] ?></p>
                                    <p class="card-text"><strong>Pays :</strong> <?= $commande['pays'] ?></p>
                                    <p class="card-text"><strong>Prix :</strong> <?= $commande['total'] ?> $</p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-danger text-center fw-bold">Vous n'avez pas encore passé de commandes.</p>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
    </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <?php include('footer.php') ?>
</body>

</html>