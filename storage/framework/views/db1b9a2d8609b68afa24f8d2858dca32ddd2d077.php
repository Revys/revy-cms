<?php if(count($languages)): ?>
	<div class="languages">
		<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<a href="/<?php echo e($item->code); ?>"<?php if($item->isSelected()): ?> class="selected"<?php endif; ?>><?php echo e($item->code); ?></a>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
<?php endif; ?>