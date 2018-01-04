<div class="header__navigation">
	<?php if(isset($path) && count($path)): ?>
		<div class="header__path">
			<?php $__currentLoopData = $path; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<span class="header__path__item"><?php echo e($title); ?></span>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	<?php endif; ?>
	<?php if(isset($caption)): ?>
		<div class="header__caption"><?php echo e($caption); ?></div>
	<?php endif; ?>
	<?php if(isset($actions['create']) && $actions['create'] && $action !== "create"): ?>
		<a href="<?php echo e(route('admin::create', [$controller_name])); ?>" class="header__add-item"><?php echo app('translator')->getFromJson("Добавить"); ?><i class="icon icon--add"></i></a>
	<?php endif; ?>
</div>