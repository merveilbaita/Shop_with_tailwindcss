<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Philia Shop</title>
    <link rel="stylesheet" href="/output.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    .card-size {
        width: 250px;
        height: 350px;
    }

</style>


<body class="bg-gray-200 roboto-slab">
<header class="fixed top-0 w-full bg-black text-gray-200 px-2 py-5 z-50">
        <nav class="flex justify-between items-center">
            <div class="brand font-bold ml-8 block">
                <!-- <a href="<?=base_url()?>"><img class="hover:w-11" src="<?= base_url('img/logo.svg')?>" alt="" width="80px"></a> -->
                <a class="text-center roboto-slab text-2xl font-bold" href="<?= base_url() ?>"><span class="font-bold text-2xl bg-blue-500 text-white rounded px-2">P</span> hilia Shop</a>
            </div>
        
            <div class="hidden roboto-slab md:flex  font-bold mr-8">
                <ul class="flex space-x-4" >
                    <li><a href="" class=" hover:bg-blue-500 hover:py-2 px-2 hover:rounded hover:font-bold">Accueil</a></li>
                    <li">
                            <a class="hover:underline" href="<?= base_url('logout')?>">
                                <?php if (session()->has('mail')) : ?>
                                    <?= session()->get('mail') ?>
                                <?php endif; ?>
                            </a>
                        </li>
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
            <a href="" class="block">Panier</a>
        </div>
    </header>


    <section class="main-section py-4" style="margin-top:70px">
        <div class="container mx-auto">
            <div class="col py-4">
                <h4 class="font-bold text-black text-xl border-b border-black ml-8">Les produits suivants sont disponibles dans notre boutique</h4>
            </div>

            <!-- Affiche les catégories -->
            <div class="col py-2">
                <ul class="list-none flex space-x-4 py-4 bg-black justify-center items-center">
                <h5 class="text-white text-xl font-semibold py-4 ml-8"><i class="fas fa-box text-dark"></i> Catégories</h5>
                    <li><a href="<?= base_url('Article/article') ?>" class="bg-black hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full ml-8 mt-2 transition-colors border-2 border-white duration-300">Toutes</a></li>
                    <?php foreach ($categories as $cat) : ?>
                        <li><a href="<?= base_url('Article/article/' . $cat['categories']) ?>" class="bg-black hover:bg-blue-500 text-white font-bold py-2 px-4 rounded-full mt-2 border-2 border-white transition-colors duration-300"><?= $cat['categories'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="flex justify-start ml-6 mb-4 mt-4">
                <a class="font-bold text-black text-xl cursor-pointer hover:underline" href="<?= base_url('commandes_utilisateur') ?>"><i class="fa-solid fa-cart-plus"></i> Voir mes commandes</a>
            </div>

            <div class="flex justify-center flex-wrap mx-4">
                
                <?php foreach ($articles as $art) : ?>
                    <div class="w-full sm:w-1/2 lg:w-1/3 px-4 py-4 card-size">
                        <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-slate-400">
                            <?php
                            // Convertit les données d'image en base64
                            $imgData = base64_encode($art['img']);
                            // Construit l'URL de données avec le type MIME de l'image
                            $imgUrl = 'data:image/jpeg;base64,' . $imgData;
                            ?>
                            <img src="<?php echo $imgUrl; ?>" class="w-full h-48 object-cover" alt="<?php echo $art['designation']; ?>">
                            <div class="px-6 py-2">
                                <h5 class="font-semibold ml-4 text-start  text-zinc-950"><?php echo $art['designation']; ?></h5>
                                <!-- <div class="font-bold text-lg mb-2"><?php echo $art['designation']; ?></div> -->
                            </div>
                            <div class="px-6 py-4 mt-auto">
                                <p class="text-zinc-950 mb-4 font-semibold"><span>Prix : </span><?php echo $art['prix']; ?><span> $</span></p>
                                <a class="bg-black hover:bg-stone-900 text-white text-sm font-bold py-2 px-4 rounded-full mt-2 transition-colors duration-300" href="<?php echo base_url('Boutique') . '?id_produit=' . $art['id_produit']; ?>">Voir plus <i class="fas fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div id="searchResultsContainer"></div>
    </section>

    <?php include('footer.php') ?>
</body>

</html>