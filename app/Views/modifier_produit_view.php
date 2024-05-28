<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le produit</title>
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/back.png">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url()?>/public/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url()?>/public/css/icons/font-awesome/css/fontawesome-all.css">
    
</head>

<body>

    <style>
        .mycard {
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
            padding: 30px;
            border-radius: 10px;

        }

        .mylink:hover {
            color: #1C274C !important;
        }
    </style>
    <div class="container py-4">

        <?php if (isset($produit)) : ?>
            <form class="mycard" method="post" action="<?php echo base_url('ProduitController/update_produit'); ?>">
                <h4 class="fw-lighter py-4 border-bottom border-2">Modifier Produit</h4>

                <a class="link-secondary mylink text-decoration-none fs-5" href="<?= base_url('Dashboard_view_controlleur') ?>">Retour vers le dashboard</a>

                <div class="row mt-4">
                    <div class="col-md-4">
                        <input type="hidden" name="id_produit" value="<?php echo $produit['id_produit']; ?>">
                        <label for="designation" class="form-label fw-bold text-primary">Designation</label>
                        <input class="form-control text-center" type="text" id="designation" name="designation" value="<?php echo $produit['designation']; ?>" required>
                    </div>

                    <div class="col-md-10">
                        <label for="description" class="form-label fw-bold text-primary">Description du produit</label>
                        <textarea class="form-control text-start" id="description" name="description" required><?php echo $produit['description']; ?></textarea>
                    </div>

                    <div class="col-md-2">
                        <label for="prix" class="form-label fw-bold text-primary">Prix du produit</label>
                        <input class="form-control text-center" type="text" id="prix" name="prix" value="<?php echo $produit['prix']; ?>" required>
                    </div>

                    <div class="col-md-4">
                        <label for="qte" class="form-label fw-bold text-primary">Quantité du produit</label>
                        <input class="form-control text-center" type="number" id="qte" name="qte" value="<?php echo $produit['qte']; ?>" required>
                    </div>

                    <div class="col-md-8">
                        <label for="Categorie" class="form-label fw-bold text-primary">Marque</label>
                        <input class="form-control text-center" type="text" id="categories" name="categories" value="<?php echo $produit['categories']; ?>" required><br>
                    </div>
                    <div class="col d-flex justify-content-center mt-3">
                        <button class="btn btn-outline-secondary w-50 rounded-5" type="submit"><i class="fa fa-edit"></i>  Modifier</button>
                    </div>

            </form>
    </div>

<?php else : ?>
    <p>Produit non trouvé.</p>
<?php endif; ?>

</div>
</body>

</html>






<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>