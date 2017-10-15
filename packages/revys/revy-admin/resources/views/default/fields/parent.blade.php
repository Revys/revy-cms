<div class="form__group">
	<label class="form__group__label" for="form-input-{{ $field['field'] }}">{{ $field['label'] }}</label>
	<div class="form__group__input-group">
		{{ Form::select(
			'parent_ID', 
			$field['values']((isset($object) ? $object : null)), 
			(isset($object) ? (! is_string($field['value']) ? $field['value']($object) : $object->{$field['value']}) : ''), 
			['class' => 'select select--full-width']
		) }}
		
		@includeDefault('fields._errors')
	</div>
</div>

@push('js')
	<script>
		document.getElementsByClassName("select").select({
			staticWidth: false,
			search: true
		});
	</script>
@endpush