<div class="active-panel active-panel--edit">
	<?php echo $__env->make($controller->getViewRoute("active-panel/edit-back"), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php if(isset($activePanel['caption'])): ?>
		<h1 class="active-panel__caption"><?php echo $activePanel['caption']; ?><?php if(isset($object)): ?><b><small>ID:</small> <?php echo e($object->id); ?></b><?php endif; ?></h1>
	<?php endif; ?>

	<?php echo $__env->make($controller->getViewRoute("active-panel/edit-panel"), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php echo $__env->make($controller->getViewRoute("active-panel/edit-actions"), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>