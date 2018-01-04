<?php if(count($navigation)): ?>
	<nav class="menu">
		<?php $__currentLoopData = $navigation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<a href="#<?php echo e($item->urlid); ?>" onclick="$('#<?php echo e($item->urlid); ?>').goTo({ offset: -100 })" class="menu-item"><?php echo e($item->title); ?></a>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</nav>
<?php endif; ?>