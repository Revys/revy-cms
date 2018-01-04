<div class="form__group">
	<label class="form__group__label" for="form-input-<?php echo e($field['field']); ?>"><?php echo e($field['label']); ?></label>
	<div class="form__group__input-group">
		<?php echo e(Form::text(
			$field['field'], 
			(isset($object) ? (! is_string($field['value']) ? $field['value']($object) : $object->{$field['value']}) : ''), 
			[
				'id' => 'form-input-' . $field['field'], 
				'class' => 'form__group__input' . 
					(isset($field['size']) ? ' form__group__input--' . $field['size'] : '')
			]
		)); ?>

		<span class="form__group__input__picked-icon"></span>
		
		<?php echo $__env->make($controller->getViewRoute('fields._errors'), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
</div>

<?php $__env->startPush('js'); ?>
	<script>
		$("#form-input-<?php echo e($field['field']); ?>").iconpicker({
			component: '.form__group__input__picked-icon, .iconpicker-component',
			templates: {
				search: '<input type="search" class="form-control iconpicker-search" placeholder="<?php echo e(__('Поиск')); ?>" />',
       			iconpickerItem: '<a role="button" href="#" tabindex="-1" class="iconpicker-item"><i></i></a>'
			},
			hideOnSelect: true,
			animation: false,
			fullClassFormatter: function(val) {
				return 'fa ' + val;
			},
			inputSearch: true
		});
	</script>
<?php $__env->stopPush(); ?>