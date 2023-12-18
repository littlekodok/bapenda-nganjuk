<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<?php echo $__env->make('layouts/head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	</head>
	
	<body id="body" class="loading-overlay-showing one-page" data-loading-overlay data-plugin-options="{'hideDelay': 800}">
		
		<div class="loading-overlay">
			<div class="preloader-logo">
				<img src="<?php echo e(asset('img/nganjuk-logo.png')); ?>" width="50px" alt="">
			</div>
		</div>
		<?php echo $__env->yieldContent('content'); ?>

		<?php echo $__env->make('layouts/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</body>
</html>
<?php /**PATH D:\Laravel\apllication\solo-inspektorat-website-master\resources\views/layouts/main.blade.php ENDPATH**/ ?>