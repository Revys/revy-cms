<?php echo $__env->make("admin::cards.list", [
	'selectable' => true,
	'filters' => true,
	'order' => true,
	'oc' => 'items-' . rand(0, 1000)
], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>