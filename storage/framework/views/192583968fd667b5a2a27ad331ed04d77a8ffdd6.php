<!DOCTYPE html>
<html lang="<?php echo e($locale->code); ?>">
	<head>
		<?php echo $__env->make('admin::includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</head>
	<body>
		<div id="app">
			<?php echo $__env->make('admin::includes.modules', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			
			<?php echo $__env->make('admin::blocks.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php echo $__env->make('admin::navigation.left', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<div id="content">
				<?php echo $__env->yieldContent('content'); ?>
			</div>

			<?php echo $__env->make('admin::blocks.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		</div>
		
		<?php echo $__env->make('admin::includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</body>
</html>