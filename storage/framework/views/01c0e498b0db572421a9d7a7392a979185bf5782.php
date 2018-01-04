<div class="form__group form__group--toggler">
	<label class="form__group__label" for="form-input-<?php echo e($field['field']); ?>"><?php echo e($field['label']); ?></label>
	<div class="switcher">
		<?php echo e(Form::checkbox(
			$field['field'], 
			1, 
			(isset($object) ? (is_callable($field['value']) ? $field['value']($object) : $object->{$field['value']}) : ''), 
			[
				'id' => 'form-input-' . $field['field']
			]
		)); ?>

		<div class="switcher__lever"></div>
		
		<?php echo $__env->make($controller->getViewRoute('fields._errors'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>