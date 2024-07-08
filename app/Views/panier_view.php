<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    .mycard {
        border-radius: 10px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
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
    <?php include("header.php")?>

    <main>
        <?php if ($panier === null || empty($panier)) : ?>
            <div class="container mx-auto flex justify-center items-center card-size h-screen">
                <?php if (session()->has('success')) : ?>
                    <div class="alert alert-success">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>
                <div class="card text-center mycard p-6">
                    <div class="card-body">
                        <h1 class="card-title font-semibold text-primary text-2xl">Votre panier</h1>
                        <p class="card-text font-semibold">Votre panier est vide.</p>
                        <hr class="my-4">
                        <p class="card-text">Veuillez sélectionner un article avant</p>
                        <div class="mt-4">
                        <a class="bg-black hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mt-4 mb-4 transition-colors duration-300" href="<?= base_url() ?>Article"><i class="fas fa-plus"></i> Voir les articles</a>
                        </div>
                       
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="container mx-auto mycont">
                <div class="row">
                    <div class="col">
                        <h4 class="text-center py-3 text-3xl text-gray-800">Détails de votre panier</h4>
                        <table class="table-auto w-full text-left">
                            <thead>
                                <tr>
                                    <th class="fw-lighter border-b-2">Désignation</th>
                                    <th class="fw-lighter border-b-2">Prix</th>
                                    <th class="fw-lighter border-b-2">Quantité</th>
                                    <th class="fw-lighter border-b-2">Total</th>
                                    <th class="fw-lighter border-b-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($panier as $article) : ?>
                                    <?php if (isset($article['id'])) : ?>
                                        <tr class="border-b">
                                            <td class="py-2"><?php echo $article['designation']; ?></td>
                                            <td class="py-2"><?php echo $article['prix']; ?> $</td>
                                            <td class="py-2">
                                                <form class="inline-block update-quantity-form">
                                                    <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                                                    <input type="number" name="quantite" value="<?= $article['quantite'] ?>" min="1" class="form-input w-20 text-center">
                                                </form>
                                            </td>
                                            <td class="py-2"><?php echo $article['prix'] * $article['quantite']; ?> $</td>
                                            <td class="py-2">
                                                <form action="<?= base_url('panier/remove_article') ?>" method="post" class="inline-block">
                                                    <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
                                                    <button type="submit" class="btn btn-outline-danger border border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition-colors"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="6" class="alert alert-danger">
                                                Un des articles du panier est mal formé et ne contient pas d'ID.
                                            </td>
                                        </tr>
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
                                <tr>
                                    <td colspan="3" class="text-right font-bold">Prix total à payer:</td>
                                    <td colspan="2" class="text-left"><?= $totalPrix ?> $</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <button type="button" id="openModalButton" class="btn btn-outline-primary mt-4 px-6 py-2 border border-primary text-primary hover:bg-primary hover:text-white transition-colors"><i class="fa fa-check"></i> Valider</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </main>

    <!-- Modal for delivery address -->
    <div id="livraisonModal" class="fixed inset-0 z-10 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="flex items-center justify-center min-h-screen text-center sm:p-0">
            <div class="inline-block bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Adresse de livraison</h3>
                            <div class="mt-2">
                                <form action="<?= base_url('PanierController/proceder_au_paiement') ?>" method="post">
                                    <div class="mb-4">
                                        <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse</label>
                                        <input type="text" name="adresse" id="adresse" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="ville" class="block text-sm font-medium text-gray-700">Ville</label>
                                        <input type="text" name="ville" id="ville" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="code_postal" class="block text-sm font-medium text-gray-700">Code Postal</label>
                                        <input type="text" name="code_postal" id="code_postal" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="pays" class="block text-sm font-medium text-gray-700">Pays</label>
                                        <input type="text" name="pays" id="pays" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    </div>
                                    <div class="flex justify-end">
                                        <button type="button" id="closeModalButton" class="mr-2 inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                                            <i class="fa fa-times"></i> Fermer
                                        </button>
                                        <button type="submit" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                                            <i class="fa-regular fa-credit-card"></i> Commander
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('footer.php') ?>

    <script>
        $(document).ready(function() {
            // Gestionnaire d'événement pour la modification de la quantité
            $('.update-quantity-form input[name="quantite"]').on('input', function() {
                var $form = $(this).closest('form');
                $.ajax({
                    url: '<?= base_url('panier/update_quantite') ?>',
                    type: 'POST',
                    data: $form.serialize(),
                    success: function(response) {
                        // Mettez à jour la page ou affichez un message de succès si nécessaire
                        location.reload(); // Recharge la page pour mettre à jour les totaux
                    },
                    error: function(xhr, status, error) {
                        // Gérez les erreurs si nécessaire
                        alert('Erreur lors de la mise à jour de la quantité');
                    }
                });
            });
        });

        // Gestion des modals
        const openModalButton = document.getElementById('openModalButton');
        const closeModalButton = document.getElementById('closeModalButton');
        const livraisonModal = document.getElementById('livraisonModal');

        openModalButton.addEventListener('click', () => {
            livraisonModal.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', () => {
            livraisonModal.classList.add('hidden');
        });

        document.getElementById('validateButton').addEventListener('click', function() {
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Vous êtes sur le point de valider votre panier.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, valider!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Soumettre le formulaire de paiement
                    document.querySelector('form[action="<?= base_url('PanierController/proceder_au_paiement') ?>"]').submit();
                }
            });
        });
    </script>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
</body>

</html>
