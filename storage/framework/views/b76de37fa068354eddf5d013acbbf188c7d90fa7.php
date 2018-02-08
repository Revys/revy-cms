<?php if($items->count()): ?>
	<?php echo e(Form::select('order', [
		'created' => __('Создан'),
		'updated' => __('Изменён')
	], null, ['class' => 'select', 'id' => $oc . '-order-select'])); ?>


	<?php $__env->startPush('js'); ?>
		<script>
			document.getElementById('<?php echo e($oc); ?>-order-select').select({
				staticWidth: true 
			});
		</script>
	<?php $__env->stopPush(); ?>
<?php endif; ?>