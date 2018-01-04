<popup ref="call">
	<div class="header"><?php echo app('translator')->getFromJson('Мы вам позвоним!'); ?></div>

	<?php echo $__env->make('forms.call', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</popup>