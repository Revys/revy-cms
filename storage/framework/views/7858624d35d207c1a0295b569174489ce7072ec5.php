

<?php $__env->startSection('content'); ?>

	<?php echo $__env->make($controller->getViewRoute('active-panel/create'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<?php $__currentLoopData = $fieldsMap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fieldGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<section class="card card--form">
			<?php if(isset($fieldGroup['caption'])): ?>
				<div class="card__header">
					<h2><?php echo e($fieldGroup['caption']); ?></h2>
				</div>
			<?php endif; ?>

			<?php echo Form::open([
				'route' => ['admin::insert', $controller_name],
				'class' => 'form',
				'files' => true
			]); ?>

				
				<?php $__currentLoopData = $fieldGroup['fields']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php echo $__env->make($controller->getViewRoute('fields.' . $field['type']), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
				<?php echo $__env->make($controller->getViewRoute('buttons'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			<?php echo Form::close(); ?>

		</section>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make(RevyAdmin::layout('base'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>