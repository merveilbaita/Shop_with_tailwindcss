<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panier dashboard</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>

<body>
  <?php include('dashboard.php') ?>

  <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
  <div class="navbar-brand align-items-center d-flex">
      <a class="text-dark fw-bold align-items-center" href=""><i class=" fas fa-credit-card"></i>  Paniers</a>
    </div>
    <!-- <h4 class="mt-4 fw-bold border-bottom">Gestion des paniers</h4> -->

    <div class="col-md-12 mt-4">
      <table class="table table-bordered table-striped table-hover" id="example">
        <thead class="bg-primary">
          <tr>
            <th class="text-white" scope="col">Id</th>
            <!-- <th class="text-white" scope="col">Id_client</th> -->
            <th class="text-white" scope="col">Client</th>
            <th class="text-white" scope="col">Designation</th>
            <th class="text-white" scope="col">Qté</th>
            <th class="text-white" scope="col">Adresse</th>
            <th class="text-white" scope="col">Ville</th>
            <th class="text-white" scope="col">Code Postal</th>
            <th class="text-white" scope="col">Pays</th>
            <th class="text-white" scope="col">Date d'ajout</th>
            <th class="text-white" scope="col">Actions</th>
            <!-- <th scope="col">Opérations</th> -->
          </tr>
        </thead>
        <tbody>

          <?php
          if (isset($pan)) {

            $i = 1;
            foreach ($pan as $key => $pani) { ?>
              <tr>
                <!-- <td><?= $i ?></td> -->
                <th scope="row"><?php echo $pani['id']; ?></th>
                <!-- <td><?php echo $pani['user_id']; ?></td> -->
                <td><?php echo $pani['mail']; ?></td>
                <!-- <td><?php echo $pani['produit_id']; ?></td> -->
                <td><?php echo $pani['designation']; ?></td>
                <td><?php echo $pani['qte']; ?></td>
                <td><?php echo $pani['adresse']; ?></td>
                <td><?php echo $pani['ville']; ?></td>
                <td><?php echo $pani['code_postal']; ?></td>
                <td><?php echo $pani['pays']; ?></td>
                <td><?php echo $pani['date_ajout']; ?></td>
                <td><Button class="btn btn-outline-danger" type="submit">Supprimer</Button></td>
              </tr>
          <?php $i++;
            }
          } ?>
        </tbody>

      </table>


    </div>

  </div>
  </div>

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