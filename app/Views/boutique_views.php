<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Philia Shop</title>
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/icons/font-awesome/css/fontawesome-all.css">
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
            width: 310px;
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

        /* Styles pour l'effet de zoom */
        #imageZoom {
            width: 100%;
            height: 400px; /* Ajustez en fonction de vos besoins */
            position: relative;
        }

        #imageZoom img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: 0 0;
        }

        #imageZoom::after {
            display: var(--display);
            content: '';
            width: 100%;
            height: 100%;
            background-color: white;
            background-image: var(--url);
            background-size: 200%;
            background-position: var(--zoom-x) var(--zoom-y);
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md bg-light navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand text-dark" href="<?= base_url('index.php') ?>">Philia <span class="bg-danger bg-gradient p-1 rounded-3 text-light">Shop</span></a>
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

    <section class="main-section py-2" style="margin-top:60px">
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
                        <div id="imageZoom" style="
                            --url: url(<?= $src; ?>);
                            --zoom-x: 0%; --zoom-y: 0%;
                            --display: none;
                        ">
                            <img src="<?= $src; ?>" alt="Image du produit" style="max-width:100%">
                        </div>
                    </div>
                    <div class="col">
                        <h4 class="fw-lighter">A propos de ce produit</h4>
                        <h5 class="text-start fs-4 text-primary py-2"><?= $art['designation']; ?></h5>
                        
                            <p style="font-family: Century Gothic; text-align:justify" class="fw-lighter text py-4"><?= $art['description_courte']; ?></p>
                        
                        <h6 class="fs-5 text-primary fw-bold py-1 m-2"><?= $art['prix']; ?> $</h6>
                        <form action="<?= base_url('ajouter_au_panier'); ?>" method="post">
                            <input type="hidden" name="id_produit" value="<?= $art['id_produit']; ?>">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <input class="form-control rounded-pill text-center fw-bold" name="quantite" type="number" placeholder="Quantité">
                                </div>
                                <div class="col-md-6 col-lg-4 mb-3 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-outline-primary btn-block"><i class="fas fa-cart-plus"></i> Ajouter au panier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="container second_section py-3">
        <div class="col-md-8 border-bottom d-flex">
            <h4 class="fw-lighter text-dark">Description</h4>
        </div>
        <div class="col-md-8">
            <p style="font-family: Century Gothic; text-align:justify" class="fw-lighter text py-4"><?= $art['description']; ?></p>
        </div>
    </section>

    <section class="container troi_section py-3">
        <div class="col-md-12">
            <h4 class="fw-lighter mr-0 border-bottom border-2"><span class="border-bottom border-primary border-2">Produit</span> similaires</h4>
        </div>
        <div class="row">
            <?php foreach ($similaires as $similar) : ?>
                <div class="col-md-4 py-4 d-flex justify-content-center align-items-center">
                    <?php
                    $imgData = base64_encode($similar['img']);
                    $src = 'data:image/jpeg;base64,' . $imgData;
                    ?>
                    <div class="card mycard card-hover-effect d-flex flex-column">
                        <img src="<?= $src; ?>" alt="Image du produit" class="card-img-top product-img" style="max-width: 80%;">
                        <div class="card-body d-flex flex-column">
                            <h5 style="font-size: smaller;" class="card-title text-primary"><?= $similar['designation']; ?></h5>
                            <p class="text-primary fw-bold"><?= $similar['prix']; ?> $</p>
                            <a href="<?= base_url('Boutique?id_produit=' . $similar['id_produit']); ?>" class="btn btn-outline-primary mt-auto"><i class="fas fa-cart-plus"></i> Acheter</a>
                        </div>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        let imageZoom = document.querySelector('#imageZoom');
        if (imageZoom) {
            let img = imageZoom.querySelector('img');
            let updateZoom = (event) => {
                let rect = img.getBoundingClientRect();
                let offsetX = event.clientX - rect.left;
                let offsetY = event.clientY - rect.top;
                let percentX = (offsetX / rect.width) * 100;
                let percentY = (offsetY / rect.height) * 100;
                imageZoom.style.setProperty('--zoom-x', percentX + '%');
                imageZoom.style.setProperty('--zoom-y', percentY + '%');
                imageZoom.style.setProperty('--display', 'block');
            };
            imageZoom.addEventListener('mousemove', updateZoom);
            imageZoom.addEventListener('mouseleave', () => {
                imageZoom.style.setProperty('--display', 'none');
            });
        }
    });
</script>



    <footer style="background-color: #1C274C;" class="footer text-center">
        2024 © Hidden Dark Lab Tous droit réservé <br>
        <p class="text-start">Pour plus de question,
            <a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
        </p>
        <a class="navbar-brand text-white py-2 d-flex" href="index.php">Philia <span class="bg-danger bg-gradient  rounded-3 text-light">Shop</span></a>
        <p class=" mr-2 py-3 d-flex text-secondaty">
            <img src="<?= base_url("assets/images/assistant-svgrepo-com.svg") ?>" alt="footer-contact_logo" style="width: 50px;">
            <strong class="text-secondary mr-2">BESOIN D'ASSISTANCE ? </strong> NOUS SOMMES DISPONIBLE DE 8h - 17h
            <hr>
            <span style="cursor: pointer;" class="fw-bold text-white">+243 890 000 000</span>
            <span style="cursor: pointer;" class="fw-bold text-light">+243 977 061 220</span>
        </p>
    </footer>
</body>

</html>
