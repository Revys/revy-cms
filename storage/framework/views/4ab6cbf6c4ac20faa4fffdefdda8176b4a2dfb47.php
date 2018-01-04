<!DOCTYPE html>
<html lang="<?php echo e(\Revy::getLanguage()->code); ?>">
<head>
	<?php echo $__env->make('includes.meta', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>
<body>
	<div id="app">
		<?php echo $__env->make('blocks.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php echo $__env->yieldContent('content'); ?>

		<?php echo $__env->make('blocks.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
	
	<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>