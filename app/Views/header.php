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
                    <li><a href="" class="hover:bg-blue-500 hover:py-2 px-2 hover:rounded">Panier</a></li>
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

    <script>
        const menuButton = document.getElementById('menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        menuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>