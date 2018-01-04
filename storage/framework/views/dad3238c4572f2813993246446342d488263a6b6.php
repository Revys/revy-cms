<?php $__env->startPush('js'); ?>
	<script>
		// Request ajax form
		$(".form--ajax").bind("submit", function(e){
			e.preventDefault();

			$.request({
				url: $(this).attr("action"),
				data: $(this).serialize()
			});
		});
	</script>
<?php $__env->stopPush(); ?>