<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="<?= base_url('css/style.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/icons/font-awesome/css/fontawesome-all.css">

</head>

<body>

    <?php include('dashboard.php'); ?>

    <div class="container">
        <form action="<?php echo base_url('ajout_produit'); ?>" method="post" class="col-md-9 ms-sm-auto col-lg-10 px-md-4" enctype="multipart/form-data">
            <div class="navbar-brand align-items-center d-flex">
                <a class="text-dark fw-bold align-items-center" href=""><i class="fas fa-box "></i> Produits</a>
            </div>

            <div class="row mt-4">

                <?php if (session()->get('success')) { ?>
                    <div class="alert alert-success">
                        <strong>Mise à jour</strong>
                        <hr>
                        <?php echo session()->get('success'); ?>
                    </div>
                <?php } ?>

                <?php $session = session(); ?>

<?php if ($session->getFlashdata('succes')): ?>
    <div class="alert alert-danger">
        <?= $session->getFlashdata('succes'); ?>
    </div>
<?php endif; ?>

<?php if ($session->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= $session->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

                <div class="col-md-4">
                    <label for="designation" class="form-label fw-bold text-primary">Designation</label>
                    <input name="designation" type="text" class="form-control text-center" id="designation" placeholder="Samsung S21 Ultra">
                </div>

                <div class="col-md-4">
                    <label for="description" class="form-label fw-bold text-primary">Description du produit</label>
                    <textarea name="description" class="form-control text-center" placeholder="Un smartphone haut de gamme de chez samsung..."></textarea>
                </div>

                <div class="col-md-4">
                    <label for="formFile" class="form-label fw-bold text-primary">Image du produit</label>
                    <input type="file" class="form-control" name="img" id="formFile">
                </div>

                <div class="col-md-4 mt-4">
                    <label for="prix" class="form-label fw-bold text-primary">Prix du produit</label>
                    <input name="prix" type="number" class="form-control text-center" id="prix" placeholder="200$">
                </div>

                <div class="col-md-4 mt-4">
                    <label for="qte" class="form-label fw-bold text-primary">Quantité du produit</label>
                    <input name="qte" type="number" class="form-control text-center" id="qte" placeholder="20">
                </div>

                <div class="col-md-4 mt-4">
                    <label for="marque" class="form-label fw-bold text-primary">Marque</label>
                    <input name="categories" type="text" class="form-control text-center" id="marque" placeholder="Pixel">
                </div>

                <div class="col d-flex justify-content-center mt-2">
                    <button class="btn btn-outline-success w-50 " type="submit"><i class="fa fa-check"></i> Ajouter</button>
                </div>

            </div>
        </form>


        <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <table class="table table-bordered py-4" id="example" style="width:100%">
                <thead class="fw-bold bg-primary">
                    <tr>
                        <th class="text-white" scope="col">Id</th>
                        <th class="text-white" scope="col">Designation</th>
                        <th class="text-white" scope="col">Description</th>
                        <th class="text-white" scope="col">Marque</th>
                        <th class="text-white" scope="col">Image</th>
                        <th class="text-white" scope="col">Prix</th>
                        <th class="text-white" scope="col">Quantité</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($products)) {
                        $i = 1;
                        foreach ($products as $key => $prod) { ?>
                            <tr>
                                <th scope="row"><?php echo $prod['id_produit']; ?></th>
                                <td><?php echo $prod['designation']; ?></td>
                                <td><?php echo $prod['description']; ?></td>
                                <td><?php echo $prod['categories']; ?></td>
                                <td>
                                    <?php $imgData = base64_encode($prod['img']);
                                    $src = 'data:image/jpeg;base64,' . $imgData; ?>
                                    <img src="<?php echo $src; ?>" alt="Image du produit" style="max-width: 100px;">
                                </td>
                                <td><?php echo $prod['prix']; ?></td>
                                <td><?php echo $prod['qte']; ?></td>
                                <td class="d-grid gap-3">
                                    <a href="#" class="btn btn-outline-danger p-2" onclick="confirmDeletion(<?= $prod['id_produit'] ?>);"><i class="fa fa-eraser"></i></a>
                                    
                                    <a href="<?= base_url('modifier_produit/' . $prod['id_produit']) ?>" class="btn btn-outline-secondary p-2"><i class="fa fa-edit"></i></a>
                                </td>


                            </tr>
                    <?php $i++;
                        }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDeletion(productId) {
    Swal.fire({
        title: 'Êtes-vous sûr?',
        text: "Vous ne pourrez pas revenir en arrière!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Oui, supprimez-le!',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `<?= base_url('delete_product/') ?>${productId}`;
        }
    });
}
    </script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <!-- Initialisation de DataTables -->
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>