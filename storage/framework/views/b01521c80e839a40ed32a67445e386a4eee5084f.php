<?php if(count($fieldGroup['actions'])): ?>
	<div class="form__group__actions">
		<?php $__currentLoopData = $fieldGroup['actions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action => $button): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php if($button !== false): ?>
				<?php echo $__env->make("admin::components.button", $button, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<?php endif; ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>

	<?php $__env->startPush('js'); ?>
		<script>
			$(".form__group__actions .button").bind("click", function(e){
				if ($(this).hasClass('button--loading'))
					return false;

				$(this).width($(this).width()).addClass('button--loading');
			});
		</script>
	<?php $__env->stopPush(); ?>
<?php endif; ?>