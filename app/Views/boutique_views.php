<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Philia Shop</title>
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .card-size:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
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

       
    </style>
</head>

<body class="bg-gray-100">
<header class="fixed top-0 w-full bg-black text-gray-200 px-2 py-5 z-50">
        <nav class="flex justify-between items-center">
            <div class="brand font-bold ml-8 block">
                <!-- <a href="<?=base_url()?>"><img class="hover:w-11" src="<?= base_url('img/logo.svg')?>" alt="" width="80px"></a> -->
                <a class="text-center roboto-slab text-2xl font-bold" href="<?= base_url() ?>"><span class="font-bold text-2xl bg-blue-500 text-white rounded px-2">P</span> hilia Shop</a>
            </div>
        
            <div class="hidden roboto-slab md:flex  font-bold mr-8">
                <ul class="flex space-x-4" >
                    <li><a href="" class=" hover:bg-blue-500 hover:py-2 px-2 hover:rounded hover:font-bold">Accueil</a></li>
                    <li><a href="<?= base_url() ?>Users" class="hover:bg-blue-500 hover:py-2 px-2 hover:rounded">Users</a></li>
                    <li><a class="nav-link text-primary" href="<?= base_url('panier_view') ?>"><i class="fa-solid fa-cart-plus fs-3"></i> (<span id="panier-quantite"><?= $quantite_totale ?? 0 ?></span>)</a></li>
                </ul>
            </div>
            <div class="md:hidden">
                <button id="menu-button" class="text-white">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </nav>
        <div id="mobile-menu" class="hidden md:hidden flex-col space-y-2 mt-4">
            <a href="" class="block">Accueil</a>
            <a href="" class="block">Users</a>
            <li><a class="block text-primary" href="<?= base_url('panier_view') ?>"><i class="fa-solid fa-cart-plus fs-3"></i> (<span id="panier-quantite"><?= $quantite_totale ?? 0 ?></span>)</a></li>
        </div>
    </header>

    <section class="main-section py-2" style="margin-top:60px">
        <div class="container mx-auto px-4">
            <div class="col">
                <h4 class="font-bold text-dark text-2xl py-3 mt-4 mb-4">Poursuivre votre achat</h4>
            </div>
            <div class="row flex justify-between">
                <div class="col flex flex-wrap">
                    <a class="hover:underline font-bold text-primary" href="<?= base_url("Article") ?>"><i class="fa-solid fa-cart-flatbed"></i> Voir les articles</a>
                    <a class="hover:underline font-bold ml-2 text-primary mb-4" href="<?= base_url('commandes_utilisateur') ?>"><i class="fa-solid fa-cart-plus"></i> Voir mes commandes</a>
                </div>
            </div>

            <div class="col">
                <?php foreach ($article as $art) : ?>
                <div class="flex flex-wrap md:flex-nowrap mb-8 mt-8 w-full md:w-4/6 justify-between">
                    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
                        <?php
                        $imgData = base64_encode($art['img']);
                        $src = 'data:image/jpeg;base64,' . $imgData;
                        ?>
                        <div id="imageZoom" class="flex justify-center items-center w-full h-64" style="
                            --url: url(<?= $src; ?>);
                            --zoom-x: 0%; --zoom-y: 0%;
                            --display: none;
                        ">
                            <img src="<?= $src; ?>" alt="Image du produit" class="max-w-full max-h-full object-contain">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-4">
                        <h4 class="font-bold text-xl">A propos de ce produit</h4>
                        <h5 class="text-start text-xl text-primary py-2"><?= $art['designation']; ?></h5>
                        <p class="font-light text-xl py-4 text-justify tracking-wider"><?= $art['description_courte']; ?></p>
                        <h6 class="text-lg text-primary font-bold py-1 m-2"><?= $art['prix']; ?> $</h6>
                        <form action="<?= base_url('ajouter_au_panier'); ?>" method="post">
                            <input type="hidden" name="id_produit" value="<?= $art['id_produit']; ?>">
                            <div class="flex flex-wrap">
                                <div class="w-full md:w-auto mb-3 md:mb-0 md:mr-3">
                                    <input class="w-full px-3 py-2 border rounded text-center" name="quantite" type="number" placeholder="Quantité" value="1">
                                </div>
                                <div class="w-full md:w-auto">
                                    <button type="submit" class="bg-black hover:bg-blue-500 text-white font-bold py-2 px-4 rounded transition-colors duration-300"><i class="fas fa-cart-plus"></i> Ajouter au panier</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="container mx-auto px-4 py-3">
        <div class="col-md-8 flex">
            <h4 class="text-dark text-xl font-bold">Description</h4>
        </div>
        <div class="col-md-8">
            <p class="font-light text py-4 text-xl"><?= $art['description']; ?></p>
        </div>
    </section>

    <section class="mx-auto px-4 py-3">
        <div class="col-md-12">
            <h4 class="font-bold text-xl border-b-2"><span class="border-b border-primary">Produit</span> similaires</h4>
        </div>
        <div class="flex flex-wrap justify-between items-center">
            <?php foreach ($similaires as $similar) : ?>
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 py-4 flex justify-center items-center">
                <?php
                $imgData = base64_encode($similar['img']);
                $src = 'data:image/jpeg;base64,' . $imgData;
                ?>
                <div class="card mycard border-2  rounded card-hover-effect flex flex-col w-full overflow-hidden mt-2">
                    <div class="flex justify-center items-center w-full h-64">
                        <img src="<?= $src; ?>" alt="Image du produit" class="max-w-full max-h-full object-contain" style="max-width: 80%;">
                    </div>
                    <div class="px-6 py-2">
                        <div class="font-bold text-lg mb-2 text-primary"><?= $similar['designation']; ?></div>
                    </div>
                    <div class="px-6 py-4 mt-auto">
                        <p class="text-primary font-bold mb-8"><?= $similar['prix']; ?> $</p>
                        <a class="bg-black hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mt-2 transition-colors duration-300" href="<?= base_url('Boutique?id_produit=' . $similar['id_produit']); ?>"><i class="fas fa-cart-plus"></i> Acheter</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

  
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
    
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

    </script>

    
    <?php include('footer.php')?>
</body>

</html>
