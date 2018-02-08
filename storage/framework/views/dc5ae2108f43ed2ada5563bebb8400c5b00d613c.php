<!DOCTYPE html>
<html lang="<?php echo e($locale->code); ?>">
<head>
	<?php echo $__env->make('admin::includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
	<div id="app" class="no-sidebar no-header">
		<?php echo $__env->yieldContent('content'); ?>
	</div>

	<?php echo $__env->make('admin::includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>