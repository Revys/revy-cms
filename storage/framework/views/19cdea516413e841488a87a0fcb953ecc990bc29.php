<?php $__env->startPush('js'); ?>
	<script>
		// Change checkbox state by clicking on the parent <td>
		$(".data-table__checkbox").bind("click", function(e){
			if($(e.target).prop("tagName") == "TD" || $(e.target).prop("tagName") == "TH"){
				$(this).find("input").prop("checked", !$(this).find("input").is(":checked")).change();
			}
		});
		
		// Show actions button
		$(".data-table .checkbox__input").bind("change", function(e){
			if ($(".data-table__values .checkbox__input:checked").length > 0)
				$("#<?php echo e($oc); ?> .actions").addClass("actions--visible");
			else
				$("#<?php echo e($oc); ?> .actions").removeClass("actions--visible");
		});
		
		// Parent checkbox
		$(".data-table__titles .checkbox__input").bind("change", function(){
			$(".data-table__values .checkbox__input").prop("checked", $(this).is(":checked")).change();
		});
	</script>
<?php $__env->stopPush(); ?>