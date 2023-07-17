<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title;?> | E-DARUL</title>

    <!-- General CSS Files -->
    <script src="<?= base_url();?>assets/modules/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= base_url();?>assets/modules/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url();?>assets/modules/fontawesome/css/all.min.css" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url();?>assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="<?= base_url();?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/modules/leaflet/leaflet.css" />
    <script src="<?= base_url();?>assets/modules/leaflet/leaflet.js"></script>
    <link rel="stylesheet" href="<?= base_url();?>assets/modules/dropify/css/dropify.css" />
    <script src="<?= base_url();?>assets/modules/dropify/js/dropify.js"></script>
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/style.css" />
    <link rel="stylesheet" href="<?= base_url();?>assets/css/components.css" />
    <script src="<?= base_url();?>assets/modules/chart.min.js"></script>
    <script src="<?= base_url();?>assets/modules/sweetalert/sweetalert.min.js"></script>
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>

    <?= $this->include('template/navbar') ?>
    <?= $this->include('template/sidebar_admin') ?>
    <?= $this->renderSection('content') ?>
    <?= $this->include('template/footer') ?>
    <!-- General JS Scripts -->
    <script src="<?= base_url();?>assets/modules/popper.js"></script>
    <script src="<?= base_url();?>assets/modules/tooltip.js"></script>
    <script src="<?= base_url();?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url();?>assets/modules/moment.min.js"></script>
    <script src="<?= base_url();?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url();?>assets/modules/datatables/datatables.min.js"></script>
    <script src="<?= base_url();?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
    </script>
    <script src="<?= base_url();?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="<?= base_url();?>assets/modules/jquery-ui/jquery-ui.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url();?>assets/js/page/modules-datatables.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url();?>assets/js/scripts.js"></script>
    <script src="<?= base_url();?>assets/js/custom.js"></script>
    <script>
    <?php if(!empty(session()->getFlashdata('pesan'))) : ?>
    swal("Berhasil", "<?= session()->getFlashdata('pesan');?>", "success");
    <?php elseif(!empty(session()->getFlashdata('error'))): ?>
    swal("Gagal", "<?php echo session()->get('error'); ?>", "error");
    <?php endif; ?>

    $(document).ready(function() {
        $('.dropify').dropify();
    });
    </script>
</body>

</html>