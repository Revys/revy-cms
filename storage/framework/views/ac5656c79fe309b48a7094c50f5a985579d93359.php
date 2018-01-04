

<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('infoblocks.services', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('infoblocks.site-creating', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('infoblocks.advantages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('infoblocks.order-now', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('catalog.clients', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('catalog.works', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('catalog.testimonials', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('forms.contact-us', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo $__env->make('popups.call', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>