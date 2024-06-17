<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Panier</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .card-header {
        font-size: 1.2rem;
    }

    .card-body p {
        font-size: 1.1rem;
    }

    .mycard:hover {
        transform: scale(1.05);
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
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
                            <a class="nav-link fw-bold" href="index.php">Acceuil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="<?= base_url() ?>Users">Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="<?= base_url('cart') ?>"><i class="fa-solid fa-basket-shopping"></i> Voir Panier</a>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container" style="margin-top:70px">
        <div class="col-md-8">
            <h4 class="fw-bold border-bottom py-4">Votre Panier</h4>
        </div>
        <div class="row">
            <div class="col d-flex">
                <a class="text-decoration-none fw-bold text-primary" href="<?= base_url("Article") ?>"><i class="fa-solid fa-cart-flatbed"></i> Voir les articles</a>
                <a class="text-decoration-none fw-bold ms-2 text-primary" href="<?= base_url('commandes_utilisateur') ?>"><i class="fa-solid fa-cart-plus"></i> Voir mes commandes</a>
            </div>
        </div>

        <div class="col d-flex justify-content-center py-3">
            <?php if (!empty($panier)) : ?>
                <?php foreach ($panier as $article) : ?>
                    <div class="card shadow-sm mycard" style="width:400px">
                        <div class="card-header bg-secondary text-center text-white">
                            <h5 class="card-title"><?php echo $article['designation']; ?></h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Quantité:</strong> <?php echo $article['quantite']; ?></p>
                            <p class="card-text"><strong>Prix:</strong> <?php echo $article['prix']; ?> $</p>
                            <p class="card-text"><strong>Sous-total:</strong> <?php echo $article['prix'] * $article['quantite']; ?> $</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Aucun article dans le panier.</p>
            <?php endif; ?>
        </div>
    </div>




    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>