<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>

<style>
    .mycard {
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
    }

    .mycard:hover {
        box-shadow: 0 10px 20px rgba(240, 240, 240, 0.3);
    }

    .navbar-nav .nav-link {
        font-weight: bold !important;
    }

    .navbar-nav .nav-link:hover {
        color: #1C274C !important;
        font-size: 15px !important;
    }

    .mycont {
        padding-top: 100px;
    }
</style>

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
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="index.php">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="<?= base_url() ?>Users">Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="<?= base_url('panier') ?>">Voir Panier</a>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php if ($panier === null || empty($panier)) : ?>
            <div class="container d-flex justify-content-center align-items-center card-size" style="height: 100vh;">
                <?php if (session()->has('success')) : ?>
                    <div class="alert alert-success">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>
                <div class="card text-center mycard">
                    <div class="card-body">
                        <h1 class="card-title text-primary">Votre panier</h1>
                        <p class="card-text"><strong>Votre panier est vide.</strong></p>
                        <hr>
                        <p class="card-text">Veuillez sélectionner un article avant</p>
                        <a class="btn btn-outline-primary" href="<?= base_url() ?>Article"><i class="fas fa-plus"></i> Voir les articles</a>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="container mycont">
                <div class="row">
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="card mycard" style="width:400px">
                            <div class="card-body">
                                <h4 class="card-title text-center  border-bottom border-2" style="color:#1C274C">Détails de votre panier</h4>
                                <?php foreach ($panier as $article) : ?>
                                    <?php if (isset($article['id'])) : ?>
                                        <div class="mb-3">
                                            <p class="text-center fs-5 bg-light"><span class="fw-bold">Désignation: </span><?php echo $article['designation']; ?></p>
                                            <p><span class="fw-bold text-primary">Prix: </span><?php echo $article['prix']; ?> $</p>
                                            <p><span class="fw-bold text-primary">Quantité: </span>
                                            <form action="<?= base_url('panier/update_quantity') ?>" method="post" class="d-inline justify-content-center">
                                                <div class="col-md-auto d-flex justify">
                                                    <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                                                    <input type="number" name="quantite" value="<?= $article['quantite'] ?>" min="1" class="form-control d-inline text-center" style="width: 70px;">
                                                    <button type="submit" class="btn btn-outline-primary ms-3 "><i class="fa fa-check"></i> Mettre à jour</button>
                                                </div>

                                            </form>
                                            </p>
                                            <p><span class="fw-bold text-primary">Total: </span><?php echo $article['prix'] * $article['quantite']; ?> $</p>

                                        </div>
                                    <?php else : ?>
                                        <div class="alert alert-danger">
                                            Un des articles du panier est mal formé et ne contient pas d'ID.
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                                <!-- Calcul et affichage du prix total à payer -->
                                <?php
                                $totalPrix = 0;
                                foreach ($panier as $article) {
                                    if (isset($article['id'])) {
                                        $totalPrix += $article['prix'] * $article['quantite'];
                                    }
                                }
                                ?>
                                <p class="fw-bold text-primary text-center">Prix total à payer: <?= $totalPrix ?> $</p>

                                <div class="text-center">
                                    <button type="button" class="btn btn-outline-primary" style="width:150px" data-bs-toggle="modal" data-bs-target="#livraisonModal"><i class="fa fa-check"></i> Valider</button>
                                    <form action="<?= base_url('panier/remove_article') ?>" method="post" class="text-center py-3">
                                        <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                                        <button style="width: 150px;" type="submit" class="btn btn-outline-primary"><i class="fa fa-trash"></i> Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>
    </main>

    <!-- Modal for delivery address -->
    <div class="modal fade" id="livraisonModal" tabindex="-1" aria-labelledby="livraisonModalLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="livraisonModalLabel">Adresse de livraison</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('PanierController/proceder_au_paiement') ?>" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" required>
                        </div>
                        <div class="mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control" id="ville" name="ville" required>
                        </div>
                        <div class="mb-3">
                            <label for="code_postal" class="form-label">Code Postal</label>
                            <input type="text" class="form-control" id="code_postal" name="code_postal" required>
                        </div>
                        <div class="mb-3">
                            <label for="pays" class="form-label">Pays</label>
                            <input type="text" class="form-control" id="pays" name="pays" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa fa-exited"></i> Fermer</button>
                        <button type="submit" class="btn btn-outline-primary"><i class="fa fa-check"></i> Valider</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/panier.js'); ?>"></script>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

    <footer style="background-color: #1C274C;" class="footer text-center">
        2024 © Hidden Dark Lab Tous droit réservé <br>
        <p class="text-start">Pour plus de question,
            <a href="">Facebook</a>
            <a href="">Instagram</a>
        </p>
    </footer>
</body>

</html>