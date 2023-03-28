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
    <link rel="apple-touch-icon" href="<?= base_url('app-assets/images/logo/logo.png') ?>">
    <link rel="manifest" href="./manifest.json" />
    <meta name="theme-color" content="#2c343b">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('app-assets/images/ico/favicon.ico') ?>">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic&display=swap" rel="stylesheet">
	<link rel="apple-touch-icon" href="<?= base_url('app-assets/images/ico/apple-icon-120.png') ?>">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url('app-assets/images/ico/favicon.ico') ?>">

	<!-- BEGIN: Vendor CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/vendors/css/vendors-rtl.min.css') ?>">
	<!-- END: Vendor CSS-->

	<!-- BEGIN: Theme CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/bootstrap.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/bootstrap-extended.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/colors.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/components.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/custom-rtl.css') ?>">
	<!-- END: Theme CSS-->

	<!-- BEGIN: Page CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/core/colors/palette-gradient.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('app-assets/css-rtl/pages/error.css') ?>">
	<!-- END: Page CSS-->

	<!-- BEGIN: Custom CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style-rtl.css') ?>">
	<!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="1-column">

	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<div class="row full-height-vh-with-nav">
					<div class="col-12 d-flex align-items-center justify-content-center">
						<div class="col-lg-6 col-10">
							<div class="row">
								<div class="col-12 text-center">
									<h3 class="error-code text-center mb-2"><?= lang('app.welcome') ?></h3>
								</div>
							</div>
							<div class="row py-2">
								<div class="col-12 text-center">
									<a href="<?= base_url('user') ?>" class="btn btn-outline-info mb-1 round"><i class="ft-globe"></i> <?= lang('app.brows') ?> </a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- END: Content-->

	<div class="sidenav-overlay"></div>
	<div class="drag-target"></div>

	<!-- BEGIN: Vendor JS-->
	<script src="<?= base_url('app-assets/vendors/js/vendors.min.js') ?>"></script>
	<!-- BEGIN Vendor JS-->
	
	<!-- BEGIN: Theme JS-->
	<script src="<?= base_url('app-assets/js/core/app-menu.js') ?>"></script>
	<sript src="<?= base_url('app-assets/js/core/app.js') ?>"></script>
	<!-- END: Theme JS-->
    <script src="<?= base_url('assets/js/scripts.js') ?>"></script>

</body>
<!-- END: Body-->

</html>