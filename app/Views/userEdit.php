<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier User</title>
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/back.png">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/fontawesome.css">
    <link rel="stylesheet" href="<?= base_url() ?>/public/css/icons/font-awesome/css/fontawesome-all.css">

</head>

<body>

    <style>
        .mycard {
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.3);
            padding: 30px;
            border-radius: 10px;
            width: 700px;
            height: 450px;

        }

        .mylink:hover {
            color: #1C274C !important;
        }

        .mycont {
            margin-top: 40px;
        }
    </style>

    <div class="container py-4 d-flex justify-content-center mycont">

        <?php if (isset($user)) : ?>
            <form class="mycard " method="post" action="<?php echo base_url('Users/update_user'); ?>">
                <img src="<?=base_url('plugins/images/logo-client.png')?>" alt="logo" width="50px">
                <h4 class="fw-bold py-4 border-bottom border-2">Modifier l'utilisateur</h4>
                <a class="link-secondary mylink text-decoration-none fs-5" href="<?= base_url('Dashboard_view_controlleur') ?>">Retour vers le dashboard</a>

                <div class="row mt-4">
                    <div class="col">
                        <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                        <label for="mail" class="form-label fw-bold text-primary">Mail</label>
                        <input class="form-control text-center" type="text" id="mail" name="mail" value="<?php echo $user['mail']; ?>" required>
                        <label for="role" class="form-label fw-bold text-primary">Role</label>
                        <input class="form-control text-center" type="text" id="role" name="role" value="<?php echo $user['role']; ?>" required>
                        <div class="col py-4 d-flex justify-content-center">
                            <button style="width: 300px;" class="btn btn-outline-secondary rounded-5" type="submit"><i class="fa fa-edit"></i> Modifier</button>
                        </div>

                    </div>
            </form>
    </div>

<?php else : ?>
    <p>Utilisateur non trouvé.</p>
<?php endif; ?>

</div>
</body>

</html>






<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>

</html>