<!DOCTYPE html>
<html class="loading" lang="ar" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="aby,aBy Solutions">
	<meta name="keywords" content="aby,aBy Solutions">
	<meta name="author" content="Abou Yaziyd">
	<title><?= APP_NAME ?></title>
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

<body class="vertical-layout vertical-menu 1-column   blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
	<!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<section class="flexbox-container">
					<div class="col-12 d-flex align-items-center justify-content-center">
						<div class="col-lg-4 col-md-8 col-10 p-0">
							<div class="card-header bg-transparent border-0">
								<h2 class="error-code text-center mb-2">404</h2>
								<h3 class="text-uppercase text-center"><?= lang('app.errpg') ?></h3>
							</div>
							<div class="card-content">
								<fieldset class="row py-2">
									<div class="input-group col-12">
										<p>
                                            <?php if (ENVIRONMENT !== 'production') : ?>
                                                <?= nl2br(esc($message)) ?>
                                            <?php else : ?>
												Sorry! Cannot seem to find the page you were looking for.
											<?php endif ?>
										</p>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!-- END: Content-->


	<!-- BEGIN: Vendor JS-->
	<script src="<?= base_url('app-assets/vendors/js/vendors.min.js') ?>"></script>
	<!-- BEGIN Vendor JS-->

	<!-- BEGIN: Page Vendor JS-->
	<script src="<?= base_url('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') ?>"></script>
	<!-- END: Page Vendor JS-->

	<!-- BEGIN: Theme JS-->
	<script src="<?= base_url('app-assets/js/core/app-menu.js') ?>"></script>
	<script src="<?= base_url('app-assets/js/core/app.js') ?>"></script>
	<!-- END: Theme JS-->

	<!-- BEGIN: Page JS-->
	<script src="<?= base_url('app-assets/js/scripts/forms/form-login-register.js') ?>"></script>
	<!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>