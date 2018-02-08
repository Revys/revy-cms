<?php if($controller::paginated($items) && $items->count()): ?>
	<div class="pagination">
		<span class="pagination__now"><?php echo e($items->perPage() * ($items->currentPage() - 1) + 1); ?>-<?php echo e($items->perPage() * ($items->currentPage() - 1) + $items->count()); ?></span>
		<span class="pagination__total">&nbsp<?php echo e(__('из')); ?>&nbsp<?php echo e($items->total()); ?></span>

		<a class="pagination__button pagination__button--prev<?php echo e($items->previousPageUrl() == '' ? ' pagination__button--disabled' : ''); ?>" href="<?php echo e($items->previousPageUrl()); ?>"></a>
		<a class="pagination__button pagination__button--next<?php echo e($items->nextPageUrl() == '' ? ' pagination__button--disabled' : ''); ?>" href="<?php echo e($items->nextPageUrl()); ?>"></a>
	</div>

	<?php $__env->startPush('js'); ?>
		<script>
			$("#<?php echo e($oc); ?> .pagination a").bind("click", function(e){
				e.preventDefault();

				if ($(this).attr("href") !== "") {
					$("#<?php echo e($oc); ?>").request({
						url: $(this).attr("href")
					});
				}
			});
		</script>
	<?php $__env->stopPush(); ?>
<?php endif; ?>