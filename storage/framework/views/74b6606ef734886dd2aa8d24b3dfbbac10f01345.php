<div class="form__group form__group--editor <?php if(isset($field['size'])): ?> form__group__input--<?php echo e($field['size']); ?><?php endif; ?>">
	<label class="form__group__label" for="form-input-<?php echo e($field['field']); ?>"><?php echo e($field['label']); ?></label>
	<div class="form__group__input-group">
		<?php if(! isset($field['translatable'])): ?>
			<?php echo e(Form::textarea(
				$field['field'], 
				(isset($object) ? (! is_string($field['value']) ? $field['value']($object) : $object->{$field['value']}) : ''), 
				[
					'id' => 'form-input-' . $field['field'], 
					'class' => 'form__group__input form__group__textarea editor' . 
						(isset($field['size']) ? ' form__group__input--' . $field['size'] : '') .
						($errors->any($field['field']) ? ' form__group__input--error' : '')
				]
			)); ?>

			<?php echo $__env->make($controller->getViewRoute('fields._errors'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php else: ?>
			<?php echo $__env->make($controller->getViewRoute('fields.translate.text'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php endif; ?>
	</div>
</div>