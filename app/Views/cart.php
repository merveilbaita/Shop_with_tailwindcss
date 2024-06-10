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
</head>
<style>
    .card-header {
    font-size: 1.2rem;
}

.card-body p {
    font-size: 1.1rem; 
}

.mycard:hover{
    transform: scale(1.05);
    cursor: pointer;
    transition: transform 0.3s ease-in-out;
}
</style>
<body>
<header>
        <nav class="navbar navbar-expand-md bg-light navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand text-dark" href="index.php">Philia <span class="bg-danger bg-gradient p-1 rounded-3 text-light">Shop</span></a>
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
                            <a class="nav-link fw-bold" href="<?= base_url('cart') ?>">Voir Panier</a>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container" style="margin-top:70px">
    <div class="col-md-8">
    <h4 class="fw-bold border-bottom py-4">Votre Panier</h4>
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