<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hidden Users</title>
    <link rel="stylesheet" href="/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-200">
   <?php include('header.php')?>

    <section class="main py-4" style="margin-top: 150px;">
        <div class="container mx-auto">
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                    <div class="connect-row">
                        <div class="connect bg-white rounded-lg p-8 shadow-lg">
                            <?php if (session()->has('user_email')) : ?>
                                <p>Connecté en tant que: <?= session()->get('user_email') ?></p>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert bg-red-500 text-white p-4 rounded">
                                    <strong>Attention :</strong> <?= session()->getflashdata('error') ?>
                                </div>
                            <?php endif; ?>

                            <?php if (session()->getFlashdata('erreur')) : ?>
                                <div class="alert bg-red-500 text-white p-4 rounded">
                                    <strong>Attention :</strong> <?= session()->getflashdata('erreur') ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo base_url('user_connect'); ?>" method="post" class="mycard">
                                <h4 class="text-gray-800 font-bold text-xl mb-4"><i class="fa fa-globe"></i> Connectez-vous</h4>
                                <p class="text-gray-600 mb-4">Bienvenue ! Connectez-vous à votre compte.</p>
                                <div class="mb-4">
                                    <input name="mail" type="mail" class="w-full px-3 py-2 border rounded text-center" id="mail" placeholder="Ex : hidden@gmail.com" required>
                                </div>
                                <div class="mb-4">
                                    <input name="pw" type="password" class="w-full px-3 py-2 border rounded text-center" id="pw" placeholder="mot de passe" required>
                                </div>
                                <div class="flex justify-center">
                                    <button type="submit" class="bg-black hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mt-4 transition-colors duration-300"><i class="fas fa-globe mr-3"></i>  Connecter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-4">
                    <div class="create bg-white rounded-lg p-8 shadow-lg">
                        <form action="<?php echo base_url('user_create'); ?>" method="post" class="mycard" id="myForm">
                            <h4 class="text-gray-800 font-bold text-xl mb-4"><i class="fa fa-user"></i> Inscrivez-vous</h4>
                            <?php if (session()->get('success')) { ?>
                                <div class="alert bg-green-800 text-white alert-success mt-4 mb-4">
                                    <strong class="font-bold text-2xl">Mise à jour</strong>
                                    <hr>
                                    <?php echo session()->get('success'); ?>
                                </div>
                            <?php } ?>
                            <p class="text-gray-600 mb-4">Commencez dès maintenant et créez un compte pour accéder à une expérience d'achat personnalisée.</p>
                            <div class="mb-4">
                                <input name="mail" type="mail" class="w-full px-3 py-2 border rounded text-center" id="mail" placeholder=" Ex : hidden@gmail.com" required>
                            </div>
                            <div class="mb-4">
                                <input name="pw" type="password" class="w-full px-3 py-2 border rounded text-center" id="pw" placeholder="mot de passe" required>
                            </div>
                            <p class="text-gray-600 mb-4">Vos données personnelles seront utilisées pour vous accompagner au cours de votre visite du site web, gérer l’accès à votre compte, et pour d’autres raisons décrites dans notre politique de confidentialité.</p>
                            <p class="text-gray-600 mb-4">Veuillez retenir votre <strong class="text-dark select-all">Mot de passe !!!</strong>.</p>
                            <div class="flex justify-center">
                                <button type="submit" class="bg-black hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mt-4 transition-colors duration-300"><i class="mr-3 fas fa-lock-open"></i>  Soumettre</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('footer.php')?>

    <script>
        $(document).ready(function() {
            $('#myForm').on('submit', function(e) {
                e.preventDefault();

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
                        this.submit();
                    }
                });
            });
        });
    </script>

</body>

</html>