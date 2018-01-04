<div class="actions">
	<div class="actions__action button button--round button--danger" data-action="delete">
		<i class="icon icon--delete"></i>
	</div>
	
	<div class="actions__action button button--round" data-action="publish">
		<i class="fa fa-eye"></i>
	</div>

	<div class="actions__action button button--round" data-action="hide">
		<i class="fa fa-eye-slash"></i>
	</div>
</div>

<?php $__env->startPush('js'); ?>
	<script>
		// Change checkbox state by clicking on the parent <td>
		$(".actions__action").bind("click", function(e){
			let action = $(this).data("action");

			if (action == "delete") {
				if (confirm("<?php echo app('translator')->getFromJson('Подтвердить удаление элементов?'); ?>"))
					$("#<?php echo e($oc); ?>").request({
						controller: '<?php echo e($controller_name); ?>',
						action: 'fast_delete',
						data: $(".data-table__values .checkbox__input").serialize()
					});
			} else if (action == "publish") {
				$("#<?php echo e($oc); ?>").request({
					controller: '<?php echo e($controller_name); ?>',
					action: 'fast_publish',
					data: $(".data-table__values .checkbox__input").serialize()
				});
			} else if (action == "hide") {
				$("#<?php echo e($oc); ?>").request({
					controller: '<?php echo e($controller_name); ?>',
					action: 'fast_hide',
					data: $(".data-table__values .checkbox__input").serialize()
				});
			}
		});
	</script>
<?php $__env->stopPush(); ?>