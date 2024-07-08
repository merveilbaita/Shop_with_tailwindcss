<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Philia Shop</title>
    <link rel="stylesheet" href="/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>

</style>
<body class="bg-gray-100">
    <?php include('header.php')?>

    <div class="w-full bg-cover bg-no-repeat roboto-slab flex-col items-start rounded-sm  flex justify-center h-72" style="background-image: url('<?= base_url('img/back4.png')?>'); height:100vh;">
        <div class="mt-1">
            <h2 class="font-bold text-gray-300 text-5xl ml-6 ">Nos <span class="text-black">produits</span></h2>
        </div>
        <div class="mt-4">
            <h2 class="font-semibold text-gray-300 text-2xl ml-6 tracking-widest"><span class="text-black">Nos produits</span> tech le plus haut de gammes</h2>
        </div>
        <div class="mt-8">
            <a class="border-2 ml-6 border-black bg-black text-white py-1 px-5 rounded-md hover:bg-transparent hover:text-slate-200 font-semibold" href="<?= base_url() ?>Article">Voir plus de produit <i class="ml-3 fa-solid fa-circle-plus"></i></a>
        </div>
    </div>

    <div class="container roboto-slab flex  justify-center mx-auto max-w-9/12 h-auto mt-4">
        <h2 class="font-semibold text-gray-950 text-2xl mt-4 ml-6"><span class="text-black">Nos meilleurs</span> produit en vente</h2>
    </div>

    <div class="container flex flex-wrap roboto-slab box-border rounded mb-10 bg-gray-100 justify-center md:justify-center items-stretch border-spacing-2 mx-auto max-w-9/12 h-auto mt-4 space-x-0 md:space-x-10 p-4">
    <?php foreach ($articles as $art) : ?>
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-2">
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white flex flex-col justify-between hover:shadow-slate-400 transition duration-0 hover:duration-150 mx-auto" style="height: 420px;">
                <div>
                    <div class="w-full overflow-hidden mt-2">
                        <?php if (isset($art['img'])) : ?>
                            <?php
                            // Convertit les données d'image en base64
                            $imgData = base64_encode($art['img']);

                            // Construit l'URL de données avec le type MIME de l'image
                            $imgUrl = 'data:image/jpeg;base64,' . $imgData;
                            ?>
                            <img src="<?php echo $imgUrl; ?>" class="w-full h-64 cover" alt="<?php echo $art['designation']; ?>">
                        <?php else : ?>
                            <img src="<?= base_url('assets/images/default.jpg') ?>" class="w-full h-48 object-cover" alt="Image non disponible">
                        <?php endif; ?>
                    </div>
                    <div class="px-6 py-2">
                        <div class="font-bold text-lg mb-2"><?php echo $art['designation']; ?></div>
                    </div>
                </div>
                <div class="px-6 py-4 mt-auto">
                    <p class="text-gray-700 text-base mb-4">Prix : <?php echo $art['prix']; ?> $</p>
                    <a class="bg-black hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mt-2 transition-colors duration-300" href="<?php echo base_url('Boutique') . '?id_produit=' . $art['id_produit']; ?>"><i class="fas fa-cart-plus"></i> Acheter</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>


    <script>
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>

<footer class="p-10 roboto-slab bg-black text-gray-400">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">
        <div>
            <h3 class="mb-4 font-bold uppercase">Infos Pratiques</h3>
    
            <ul>
                <li><a href="#" class="hover:text-gray-200">Points Fidélité</a></li>
                <li><a href="#" class="hover:text-gray-200">Guide d'Entretien</a></li>
                <li><a href="#" class="hover:text-gray-200">Guide des Tailles</a></li>
                <li><a href="#" class="hover:text-gray-200">Mentions Légales</a></li>
            </ul>
        </div>
        <div>
            <h3 class="mb-4 font-bold uppercase">À Propos</h3>
            <ul>
                <li><a href="#" class="hover:text-gray-200">SAV</a></li>
                <li><a href="#" class="hover:text-gray-200">Service Clients</a></li>
                <li><a href="#" class="hover:text-gray-200">Livraisons et Retours</a></li>
                <li><a href="#" class="hover:text-gray-200">FAQ Service Après Vente</a></li>
                <li><a href="<?= base_url('ErrorController')?>" class="hover:text-gray-200">Qui sommes-nous</a></li>
            </ul>
        </div>
        <div>
            <h3 class="mb-4 font-bold uppercase">Newsletter</h3>
            <p class="mb-2">Découvrez en Avant Première Nos Tendances !</p>
            <form action="#">
                <input type="email" class="p-2 w-full text-black" placeholder="Saisissez votre e-mail">
                <button type="submit" class="mt-2 p-2 w-full bg-black text-white">Transmettre</button>
            </form>
        </div>
    </div>
    <div class="max-w-6xl mx-auto mt-10 flex flex-col md:flex-row justify-between items-center text-center md:text-left">
        <div class="mb-4 md:mb-0">
            <p>Avis de la boutique <span class="font-bold">4.7/5</span></p>
            <a href="#" class="text-yellow-400 hover:text-yellow-500">Voir les avis</a>
        </div>
        <div class="flex space-x-4">
            <a href="#" class="hover:text-gray-200"><i class="fab fa-facebook"></i> Facebook</a>
            <a href="#" class="hover:text-gray-200"><i class="fab fa-pinterest"></i> Pinterest</a>
            <a href="#" class="hover:text-gray-200"><i class="fab fa-instagram"></i> Instagram</a>
            <a href="#" class="hover:text-gray-200"><i class="fab fa-youtube"></i> YouTube</a>
            
        </div>
    </div>
    <a href=""><img src="<?= base_url('img/logo.svg')?>" alt="" width="150px"></a>
</footer>
</body>

</html>
