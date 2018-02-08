<div class="form__group__translation">
	<?php
		$baseField = $field['field'];
	?>
	<?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php
			$field['field'] = \Revys\RevyAdmin\App\RevyAdmin::getTranslationFieldName($baseField, $language->code);
		?>

		<div class="form__group__translation__input">
			<div class="form__group__translation__locale"><?php echo e($language->code); ?></div>
			<?php echo e(Form::textarea(
				$field['field'], 
				((isset($object) && $object->translate($language->code)) ? $object->translate($language->code)->{$field['value']} : ''), 
				[
					'id' => 'form-input-' . $field['field'], 
					'class' => 'form__group__input form__group__textarea editor' . 
						(isset($field['size']) ? ' form__group__input--' . $field['size'] : '') .
						($errors->any($field['field']) ? ' form__group__input--error' : '')
				]
			)); ?>

		</div>

		<?php echo $__env->make($controller->getViewRoute('fields._errors'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>