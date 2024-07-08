<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Mes Commandes</title>
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <link rel="stylesheet" href="/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

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

    .main {
        margin-top: 80px;
    }

    .sidebar {
        min-height: 100vh;
    }
</style>

<body>
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


    <div class="col py-3">
    <section class="main">
        <div class="container mt-8">
            <div class="max-w-2xl mx-auto">
                <h4 class="font-bold border-b-2 border-gray-300 text-primary mb-4">Mes Commandes</h4>
                <?php if (count($commandes) > 0) : ?>
                    <?php foreach ($commandes as $commande) : ?>
                        <div class="bg-white shadow-md rounded-lg mb-4 p-4 hover:shadow-slate-400">
                            <div class="p-4">
                                <h5 class="text-center border-b-2 border-gray-300 py-2 mb-4"><i class="fa-regular fa-calendar"></i> Commande du <?= date('d/m/Y', strtotime($commande['date_ajout'])) ?></h5>
                                <p class="mb-2"><strong>Produit :</strong> <?= $commande['designation'] ?></p>
                                <p class="mb-2"><strong>Quantité :</strong> <?= $commande['qte'] ?></p>
                                <p class="mb-2"><strong>Adresse :</strong> <?= $commande['adresse'] ?></p>
                                <p class="mb-2"><strong>Ville :</strong> <?= $commande['ville'] ?></p>
                                <p class="mb-2"><strong>Code Postal :</strong> <?= $commande['code_postal'] ?></p>
                                <p class="mb-2"><strong>Pays :</strong> <?= $commande['pays'] ?></p>
                                <p class="mb-2"><strong>Prix :</strong> <?= $commande['total'] ?> $</p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="text-red-500 text-center font-bold">Vous n'avez pas encore passé de commandes.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</div>


    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <?php include('footer.php') ?>
</body>

</html>