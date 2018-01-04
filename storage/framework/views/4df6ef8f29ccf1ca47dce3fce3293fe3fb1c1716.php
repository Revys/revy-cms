

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make($controller->getViewRoute('items'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make(RevyAdmin::layout('base'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>