<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qui sommes nous ?</title>
    <link rel="stylesheet" href="/output.css">
</head>
<body>
    <header>
    <nav class="bg-gray-800">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
        <a class="text-center text-white roboto-slab text-2xl font-bold" href="<?= base_url() ?>"><span class="font-bold text-2xl bg-blue-500 text-white rounded px-2">P</span> hilia Shop</a>
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="<?= base_url()?>" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Acceuil</a>
            <a href="<?= base_url() ?>Article" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Articles</a>
            <a href="<?= base_url() ?>Users" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Users</a>
            
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        
          
        </button>

        <!-- Profile dropdown -->
        <div class="relative ml-3">
          <div>
          <a class="font-semibold text-gray-100 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2" href="<?= base_url('logout')?>">
                                <?php if (session()->has('mail')) : ?>
                                    <?= session()->get('mail') ?>
                                <?php endif; ?>
                            </a>
          </div>  
         
        </div>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="<?=base_url()?>" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Acceuil</a>
      <a href="<?= base_url() ?>Article" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Articles</a>
      <a href="<?= base_url() ?>Users" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Users</a>
    </div>
  </div>
</nav>

    </header>
<section class="relative isolate overflow-hidden bg-white px-6 py-24 sm:py-32 lg:px-8">
  <div class="absolute inset-0 -z-10 bg-[radial-gradient(45rem_50rem_at_top,theme(colors.indigo.100),white)] opacity-20"></div>
  <div class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white shadow-xl shadow-indigo-600/10 ring-1 ring-indigo-50 sm:mr-28 lg:mr-0 xl:mr-16 xl:origin-center"></div>
  <div class="mx-auto max-w-2xl lg:max-w-4xl">
    <h4 class="font-bold text-2xl">Hidden Dark Lab</h4>
    <figure class="mt-10">
      <blockquote class="text-center text-xl font-semibold leading-8 text-gray-900 sm:text-2xl sm:leading-9">
        <p>“Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo expedita voluptas culpa sapiente alias molestiae. Numquam corrupti in laborum sed rerum et corporis.”</p>
      </blockquote>
      <figcaption class="mt-10">
        <img class="mx-auto h-10 w-10 rounded-full" src="https://scontent.fgom1-1.fna.fbcdn.net/v/t39.30808-6/448278049_3061755583972151_8743648229347043426_n.jpg?_nc_cat=107&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeG-LyfjjMC6ps7Lt9DkIjirrCNXBmOY0yasI1cGY5jTJrKsTYg_W6QJDiF0Dt2gUJMBGZJuNTeejUqhS-Bog3kU&_nc_ohc=hYOHaZmND5cQ7kNvgFNS9Kr&_nc_zt=23&_nc_ht=scontent.fgom1-1.fna&oh=00_AYAlhSj6vLkNXkvrURd8Q65QgZrDvsAImB8CDLgj1GbVDg&oe=668F7DF3" alt="">
        <div class="mt-4 flex items-center justify-center space-x-3 text-base">
          <div class="font-semibold text-gray-900">Baita Merveil</div>
          <svg viewBox="0 0 2 2" width="10" height="3" aria-hidden="true" class="fill-gray-900">
            <circle cx="1" cy="1" r="1" />
          </svg>
          <div class="text-gray-600">CEO of Hidden Dark Lab</div>
        </div>
      </figcaption>
    </figure>
  </div>
</section>

    
</body>
</html>