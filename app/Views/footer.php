
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
                <li><a href="<?= base_url('ErrorController')?>" class="hover:text-gray-200">Info du dev</a></li>
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