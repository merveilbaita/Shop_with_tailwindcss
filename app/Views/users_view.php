<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Philia Shop</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/icons/font-awesome/css/fontawesome-all.css">
    <style>
        .navbar-nav .nav-link {
            font-weight: bold !important;
        }

        .navbar-nav .nav-link:hover {
            color: #1C274C !important;
            transition: 0.5s;

        }

        .main {
            margin-top: 70px;
        }

        .connect {
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
            padding: 30px;
            border-radius: 10px;
            /* background: #0089BB; */
        }

        .create {
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
            padding: 30px;

        }

        .connect-row {
            margin-right: 100px;

        }
    </style>
</head>

<body>

    <header>
        <!-- Début de la balise <nav> -->
        <nav class="navbar navbar-expand-md bg-light navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand text-dark" href="index.php">Philia <span class="bg-danger bg-gradient p-1 rounded-3 text-light">Shop</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="index.php">Accueil</a> <!-- Correction de la faute de frappe -->
                        </li>

                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="<?= base_url() ?>Users">Utilisateurs</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <section class="main py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6"> <!-- Modification ici -->
                    <div class="row connect-row">
                        <div class="col connect">
                            <div class="col">
                                <?php if (session()->has('user_email')) : ?>
                                    <p>Connecté en tant que: <?= session()->get('user_email') ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col">

                                <div class="col">
                                    <?php if (session()->getFlashdata('error')) : ?>
                                        <div class="alert-danger bg-white">
                                            <span><strong>Attention :</strong></span>
                                            <?= session()->getflashdata('error') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="col">
                                    <?php if (session()->getFlashdata('erreur')) : ?>
                                        <div class="alert-danger bg-white">
                                            <span><strong>Attention :</strong></span>
                                            <?= session()->getflashdata('erreur') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>


                            </div>
                            <form action="<?php echo base_url('user_connect'); ?>" method="post" class="mycard">
                                <h4 class="fw-lighter text-dark fw-bold fs-3 border-bottom"><i class="fa fa-globe"></i> Connectez-vous</h4>
                                <p class="fw-lighter text-dark"> Bienvenue ! Connectez-vous a votre compte.</p>
                                <div class="col-md-6 py-2">
                                    <!-- <label for="mail" class="form-label fw-bold text-dark">Email ou identifiant</label> -->
                                    <input style="width:400px" name="mail" type="mail" class="form-control text-center rounded-pill " id="mail" placeholder="Ex : hidden@gmail.com" required>
                                </div>
                                <div class="col-md-6 py-2">
                                    <!-- <label for="pw" class="form-label fw-bold text-dark">Mot de passe</label> -->
                                    <input style="width:400px" name="pw" type="password" class="form-control text-center rounded-pill" id="pw" placeholder="mot de passe" required>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button style="width:200px" class="btn btn-outline-primary mt-4  text-dark" type="submit">Connecter <i class="fas fa-lock-open"></i></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 create connect"> <!-- Modification ici -->
                    <form action="<?php echo base_url('user_create'); ?>" method="post" class="mycard" id="myForm">
                        <h4 class="fw-lighter text-dark fw-bold border-bottom fs-3"><i class="fa fa-user"></i> Inscrivez-vous</h4>
                        <?php if (session()->get('success')) { ?>
                            <div class="alert alert-success">
                                <strong>Mise à jour</strong>
                                <hr>
                                <?php echo session()->get('success'); ?>
                            </div>
                        <?php } ?>
                        <p class="text-dark fw-lighter">Commencez dès maintenant et créez un compte pour accéder à une expérience d'achat personnalisée.</p>
                        <div class="d-flex justify-content-center align-items-center py-2">
                            <!-- <label for="mail" class="form-label fw-bold text-dark">Email ou identifiant</label> -->
                            <input style="width:400px" name="mail" type="mail" class="form-control text-center rounded-pill" id="mail" placeholder=" Ex : hidden@gmail.com" required>
                        </div>
                        <div class="d-flex justify-content-center align-items-center py-2">
                            <!-- <label for="pw" class="form-label fw-bold text-dark">Mot de passe</label> -->
                            <input style="width:400px" name="pw" type="password" class="form-control text-center rounded-pill" id="pw" placeholder="mot de passe" required>
                        </div>
                        <p class="text-dark fw-lighter">Vos données personnelles seront utilisées pour vous accompagner au cours de votre visite du site web, gérer l’accès à votre compte, et pour d’autres raisons décrites dans notre politique de confidentialité.</p>
                        <p class="text-dark fw-lighter py-2">Veuillez retenir votre <strong class="fw-bold text-primary border-bottom border-2">Mot de passe !!!</strong>.</p>
                        <div class="d-flex justify-content-center">
                            <button style="width:200px" class="btn btn-outline-primary mt-1 text-dark" type="submit">Soumettre <i class="fas fa-plus"></i></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- Ajout d'une balise <footer> pour une meilleure structure de la page -->

    <footer style="background-color: #1C274C;" class="footer text-center">
        2024 © Hidden Dark Lab Tous droit réservé <br>
        <p class="text-start">Pour plus de question
            <a href="https://web.facebook.com/merveil.baita"><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
        </p>
        <a class="navbar-brand text-white py-2 d-flex" href="index.php">Philia <span class="bg-danger bg-gradient  rounded-3 text-light">Shop</span></a>
        <p class=" mr-2 py-3 d-flex text-secondaty">
            <img src="<?=base_url("assets/images/assistant-svgrepo-com.svg")?>" alt="footer-contact_logo" style="width: 50px;">
            <strong class="text-secondary mr-2">BESOIN D'ASSISTANCE ? </strong> NOUS SOMMES DISPONIBLE DE 8h - 17h
            <hr>
            <span style="cursor: pointer;" class="fw-bold text-white">+243 890 000 000</span> 
            <span style="cursor: pointer;" class="fw-bold text-light" >+243 977 061 220</span> 
        </p>
    </footer>
    <script>
$(document).ready(function() {
    $('#myForm').on('submit', function(e) {
        e.preventDefault(); // Empêche la soumission réelle du formulaire

        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: "Voulez-vous valider l'inscription ?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, soumettre!',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); // Soumet le formulaire si l'utilisateur confirme
            }
        });
    });
});
</script>

    <!-- Ajout du lien vers Bootstrap JS -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

</body>

</html>