@push('js')
	<script>
		// Change checkbox state by clicking on the parent <td>
		$(".data-table__checkbox").bind("click", function(e){
			if($(e.target).prop("tagName") == "TD" || $(e.target).prop("tagName") == "TH"){
				$(this).find("input").prop("checked", !$(this).find("input").is(":checked")).change();
			}
		});
		
		// Parent checkbox
		$(".data-table__titles .checkbox__input").bind("change", function(){
			$(".data-table__checkbox .checkbox__input").prop("checked", $(this).is(":checked"));
		});
	</script>
@endpush