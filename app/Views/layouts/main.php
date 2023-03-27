<!DOCTYPE html>
<html class="loading" lang="ar" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="هدية الحاج والعمرة">
    <meta name="keywords"
        content="هدية الحاج والعمرة,  حاج ,حجاج, مناسكو مكة, مدينة, مسجد النبوي, مسجد الحرم">
    <meta name="author" content="abouyaziyd">
    <title><?= APP_NAME . ' | ' . $title ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" href="<?= base_url('app-assets/images/ico/apple-icon-120.png') ?> ">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('app-assets/images/ico/favicon.ico') ?> ">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/vendors-rtl.min.css') ?> ">
    <!-- END: Vendor CSS-->

    <?= $this->renderSection('styles') ?>
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/bootstrap.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/bootstrap-extended.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/colors.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/components.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/custom-rtl.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/forms/selects/select2.min.css') ?>">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') ?> ">
    <link rel="stylesheet" type="text/css"strtotime href="<?= base_url('app-assets/css-rtl/core/colors/palette-gradient.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/cryptocoins/cryptocoins.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/charts/apexcharts.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/fonts/line-awesome/css/line-awesome.min.css') ?> ">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/fonts/simple-line-icons/style.css') ?> ">
    <!-- END: Page CSS-->

    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/extensions/sweetalert2.min.css') ?>">

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style-rtl.css') ?> ">
    <!-- END: Custom CSS-->

</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-3EFBRM7PNV"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-3EFBRM7PNV');
</script>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <?= $this->include('layouts/header') ?>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <?= $this->include('layouts/sidebar') ?>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <?= $this->include('layouts/errors') ?>
            <?= $this->renderSection('content') ?>
        </div>
    </div>
</div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?= $this->include('layouts/footer') ?>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url('app-assets/vendors/js/vendors.min.js') ?> "></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url('app-assets/vendors/js/charts/chart.min.js') ?> "></script>
    <script src="<?= base_url('app-assets/vendors/js/charts/apexcharts/apexcharts.min.js') ?> "></script>
    <!-- END: Page Vendor JS-->

    <script src="<?= base_url('app-assets/vendors/js/extensions/sweetalert2.all.min.js') ?>"></script>
    <?= $this->renderSection('scripts') ?>

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url('app-assets/js/core/app-menu.js') ?> "></script>
    <script src="<?= base_url('app-assets/js/core/app.js') ?> "></script>
    <script src="<?= base_url('app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url('app-assets/js/scripts/pages/dashboard-crypto.js') ?> "></script>
    <script src="<?= base_url('app-assets/js/scripts/forms/select/form-select2.js') ?>"></script>
    <!-- END: Page JS-->

    <script>
        $(document).ready(function() {
            <?php if (session()->getFlashdata('type')) : ?>
                Swal.fire({
                    title: "<?= session()->getFlashdata('title') ?>",
                    text: "<?= session()->getFlashdata('text') ?>",
                    type: "<?= session()->getFlashdata('type') ?>",
                    timer: 3000,
                    showConfirmButton: false,
                });
            <?php endif ?>
        });
    </script>

</body>
<!-- END: Body-->

</html>