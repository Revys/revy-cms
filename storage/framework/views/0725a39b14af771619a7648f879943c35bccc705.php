<aside id="sidebar">
	<?php if(count($items)): ?>
		<div class="sidebar">
			<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<a 
					href="<?php echo e(route('admin::path', [$item->controller, $item->action])); ?>" 
					class="
						sidebar__item
						<?php echo e(count($item['children']) ? ' sidebar__item--parent' : ''); ?>

						<?php echo e(($item->controller == $controller_name) ? ' sidebar__item--active' : ''); ?>

						" 
					title="<?php echo e($item->title); ?>"
				>
					
					<i class="icon fa <?php echo e($item->icon ? $item->icon : 'fa-circle'); ?> fa-lg"></i>
				</a>

				<div class="sidebar__children">
					<?php $__currentLoopData = $item['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<a href="<?php echo e(route('admin::path', [$child->controller, $child->action])); ?>"  class="sidebar__children__item<?php echo e(($child->controller == $controller_name) ? ' sidebar__item--active' : ''); ?>" title="<?php echo e($child->title); ?>">
							
							<?php echo e($child->title); ?>

						</a>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	<?php endif; ?>
</aside>