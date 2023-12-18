<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Admin - Bappenda Kabupaten Nganjuk</title>
		<meta name="description" content="Admin - Bappenda Kabupaten Nganjuk">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('admin/vendor/bootstrap/css/bootstrap.css')); ?>" />
		<link rel="stylesheet" href="<?php echo e(asset('admin/vendor/animate/animate.compat.css')); ?>">
		<link rel="stylesheet" href="<?php echo e(asset('admin/vendor/font-awesome/css/all.min.css')); ?>" />
		<link rel="stylesheet" href="<?php echo e(asset('admin/vendor/boxicons/css/boxicons.min.css')); ?>" />
		<link rel="stylesheet" href="<?php echo e(asset('admin/vendor/magnific-popup/magnific-popup.css')); ?>" />
		<link rel="stylesheet" href="<?php echo e(asset('admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')); ?>" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('admin/css/theme.css')); ?>" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('admin/css/skins/default.css')); ?>" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo e(asset('admin/css/custom.css')); ?>">

		<!-- Head Libs -->
		<script src="<?php echo e(asset('admin/vendor/modernizr/modernizr.js')); ?>"></script>

		<?php echo $__env->yieldContent('css'); ?>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
         <?php echo $__env->yieldContent('logincontent'); ?>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src="<?php echo e(asset('admin/vendor/jquery/jquery.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/vendor/popper/umd/popper.min.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/vendor/common/common.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/vendor/nanoscroller/nanoscroller.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/vendor/magnific-popup/jquery.magnific-popup.js')); ?>"></script>
		<script src="<?php echo e(asset('admin/vendor/jquery-placeholder/jquery.placeholder.js')); ?>"></script>

		<!-- Specific Page Vendor -->

		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo e(asset('admin/js/theme.js')); ?>"></script>

		<!-- Theme Custom -->
		<script src="<?php echo e(asset('admin/js/custom.js')); ?>"></script>

		<!-- Theme Initialization Files -->
		<script src="<?php echo e(asset('admin/js/theme.init.js')); ?>"></script>
		<?php echo $__env->yieldContent('js'); ?>

	</body>
</html><?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views////admin/layouts/loginapp.blade.php ENDPATH**/ ?>