<div class="form__group">
	<label class="form__group__label" for="form-input-<?php echo e($field['field']); ?>"><?php echo e($field['label']); ?></label>
	<div class="form__group__input-group">
		<?php echo e(Form::select(
			'parent_ID', 
			$field['values']((isset($object) ? $object : null)), 
			(isset($object) ? (! is_string($field['value']) ? $field['value']($object) : $object->{$field['value']}) : ''), 
			[
				'id' => 'form-input-' . $field['field'], 
				'class' => 'select select--full-width'
			]
		)); ?>

		
		<?php echo $__env->make($controller->getViewRoute('fields._errors'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<?php $__env->startPush('js'); ?>
	<script>
		document.getElementById("form-input-<?php echo e($field['field']); ?>").select({
			staticWidth: false,
			search: true
		});
	</script>
<?php $__env->stopPush(); ?>