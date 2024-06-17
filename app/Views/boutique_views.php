<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Philia Shop</title>
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            height: 400px;
            /* Ajustez en fonction de vos besoins */
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
                <a href="<?= base_url() ?>">
                    <img class="rounded-pill mybrand" src="<?= base_url('assets/images/brand3.png') ?>" alt="" style="width: 210px;">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="<?= base_url('index.php') ?>"><i class="fas fa-home"></i> Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="<?= base_url('Users') ?>"><i class="fas fa-user"></i>Utilisateurs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary" href="<?= base_url('panier_view') ?>"><i class="fa-solid fa-cart-plus fs-3"></i> (<span id="panier-quantite"><?= $quantite_totale ?? 0 ?></span>)</a>
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
            <div class="row">
                <div class="col d-flex">
                    <a class="text-decoration-none fw-bold text-primary" href="<?= base_url("Article") ?>"><i class="fa-solid fa-cart-flatbed"></i> Voir les articles</a>
                    <a class="text-decoration-none fw-bold ms-2 text-primary" href="<?= base_url('commandes_utilisateur') ?>"><i class="fa-solid fa-cart-plus"></i> Voir mes commandes</a>
                </div>
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
                                    <input class="form-control rounded-pill text-center fw-bold" name="quantite" type="number" placeholder="Quantité" value=1>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let updatePanierQuantite = () => {
                if (<?= session()->has('user_id') ? 'true' : 'false' ?>) {
                    fetch('<?= base_url('compter_articles_panier') ?>')
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('panier-quantite').textContent = data.quantite_totale;
                        });
                } else {
                    // Utilisateur non connecté, affichez 0 dans la quantité de panier
                    document.getElementById('panier-quantite').textContent = '0';
                }
            };

            // Appel initial pour afficher la quantité de panier au chargement de la page
            updatePanierQuantite();

            document.querySelectorAll('form[action*="ajouter_au_panier"]').forEach(form => {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    if (!<?= session()->has('user_id') ? 'true' : 'false' ?>) {
                        // Redirection vers la vue de connexion si l'utilisateur n'est pas connecté
                        window.location.href = '<?= base_url('Users') ?>';
                    } else {
                        let formData = new FormData(this);

                        fetch(this.action, {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    document.getElementById('panier-quantite').textContent = data.quantite_totale;
                                } else {
                                    alert(data.message);
                                }
                            });
                    }
                });
            });
        });
    </script>




    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <footer style="background-color: #232f3e" class="footer text-center">
        2024 © Hidden Dark Lab Tous droits réservés <br>

        <div class="d-flex justify-content-center">
            <i class="fab fa-facebook text-primary  fs-3 m-2"></i>
            <i class="fab fa-instagram fs-3 m-2" style="color:#963ec3"></i>
            <i class="fab fa-twitter text-white fs-3 m-2"></i>
            <i class="fab fa-whatsapp fs-3 m-2" style="color:#00bd07"></i>

        </div>

        <div class="d-flex justify-content-center">
            <span style="cursor: pointer;" class="fw-bold text-white text-center">+243 890 000 000</span>
            <span style="cursor: pointer;" class="fw-bold text-white text-center">+243 977 061 220</span>
        </div>
    </footer>
</body>

</html>