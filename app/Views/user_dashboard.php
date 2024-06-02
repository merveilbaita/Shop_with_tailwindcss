<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Utilisateurs</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
</head>

<body>
  <?php include('dashboard.php') ?>

  <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 ">
  
    <div class="navbar-brand align-items-center d-flex">
      <img src="plugins/images/logo-client.png" alt="" width="70px">
      <a class="text-dark fw-bold align-items-center" href="">Clients</a>
    </div>
    <?php if (session()->getFlashdata('succes')): ?>
    <div class="alert alert-danger">
  <strong>Mise à jour</strong><hr>
        <?= session()->getFlashdata('succes'); ?>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
    </div>
<?php endif; ?>

    <div class="col-md-12 mt-4">
      <?php if (session()->get('success')) { ?>
        <div class="alert alert-success">
          <strong>Mise à jour</strong>
          <hr>
          <?php echo session()->get('success'); ?>
        </div>
      <?php } ?>
      <table class="table table-bordered table-striped table-hover" id="example">
        <thead class="bg-primary">
          <tr>
            <th class="text-white" scope="col">Id</th>
            <th class="text-white" scope="col">Username</th>
            <th class="text-white" scope="col">Password</th>
            <th class="text-white" scope="col">Role</th>
            <th class="text-white" scope="col">Actions</th>

            <!-- <th scope="col">Opérations</th> -->
          </tr>
        </thead>
        <tbody>

          <?php
          if (isset($users)) {

            $i = 1;
            foreach ($users as $key => $client) { ?>
              <tr>
                <!-- <td><?= $i ?></td> -->
                <th scope="row"><?php echo $client['user_id']; ?></th>
                <td><?php echo $client['mail']; ?></td>
                <td><?php echo $client['pw']; ?></td>
                <td><?php echo $client['role']; ?></td>
                <td class="d-grid gap-3">
                <a href="#" class="btn btn-outline-danger p-2" onclick="confirmDeletion(<?= $client['user_id'] ?>);"><i class="fa fa-eraser"></i></a>
                  <a href="<?= base_url('modifier_user/' . $client['user_id']) ?>" class="btn btn-outline-secondary p-2"><i class="fa fa-edit"></i></a>
                </td>
              </tr>
          <?php $i++;
            }
          } ?>
        </tbody>

      </table>


    </div>

  </div>
  </div>

  <script>
        function confirmDeletion(user_id) {
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
            window.location.href = `<?= base_url('delete_user/') ?>${user_id}`;
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