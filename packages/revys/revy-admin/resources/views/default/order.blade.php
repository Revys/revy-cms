@if($items->count())
	{{-- {{ Form::select('order', [
		'created' => __('Создан'),
		'updated' => __('Изменён')
	], null, ['class' => 'select']) }}

	@push('js')
		<script>
			document.getElementsByClassName("select").select({
				staticWidth: true 
			});
		</script>
	@endpush --}}
@endif