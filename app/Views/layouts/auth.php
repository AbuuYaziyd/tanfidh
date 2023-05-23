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
    <link rel="apple-touch-icon" href="<?= base_url('app-assets/images/ico/apple-icon-120.png') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('app-assets/images/ico/favicon.ico') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/vendors-rtl.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/forms/icheck/icheck.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/forms/icheck/custom.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/forms/selects/select2.min.css') ?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/bootstrap.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/bootstrap-extended.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/colors.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/components.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/custom-rtl.css') ?>">
    <!-- END: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/extensions/sweetalert2.min.css') ?>">
    <?= $this->renderSection('styles') ?>

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/core/menu/menu-types/horizontal-menu.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/core/colors/palette-gradient.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/pages/login-register.css') ?>">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style-rtl.css') ?>">
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

<body class="horizontal-layout horizontal-menu horizontal-menu-padding 1-column   blank-page" data-open="click" data-menu="horizontal-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content container center-layout mt-2">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <?= $this->renderSection('content') ?>
        </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?= base_url('app-assets/vendors/js/vendors.min.js') ?>"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= base_url('app-assets/vendors/js/ui/jquery.sticky.js') ?>"></script>
    <script src="<?= base_url('app-assets/vendors/js/forms/icheck/icheck.min.js') ?>"></script>
    <script src="<?= base_url('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') ?>"></script>
    <!-- END: Page Vendor JS-->

    <script src="<?= base_url('app-assets/vendors/js/extensions/sweetalert2.all.min.js') ?>"></script>
    <script>
        $(document).ready(function() {
            <?php if (session()->getFlashdata('type')) : ?>
                Swal.fire({
                    title: "<?= session()->getFlashdata('title') ?>",
                    text: "<?= session()->getFlashdata('text') ?>",
                    type: "<?= session()->getFlashdata('type') ?>",
                    showConfirmButton: true,
                    confirmButtonText: 'تمام',
                });
            <?php elseif (session()->getFlashdata('error')) : ?>
                Swal.fire({
                    title: "<?= session()->getFlashdata('error') ?>",
                    type: "error",
                    showConfirmButton: true,
                    confirmButtonText: 'تمام',
                });
            <?php endif ?>
        });
    </script>
    
    <?= $this->renderSection('scripts') ?>

    <!-- BEGIN: Theme JS-->
    <script src="<?= base_url('app-assets/js/core/app-menu.js') ?>"></script>
    <script src="<?= base_url('app-assets/js/core/app.js') ?>"></script>
    <script src="<?= base_url('app-assets/vendors/js/forms/select/select2.full.min.js') ?>"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?= base_url('app-assets/js/scripts/forms/form-login-register.js') ?>"></script>
    <script src="<?= base_url('app-assets/js/scripts/forms/select/form-select2.js') ?>"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>