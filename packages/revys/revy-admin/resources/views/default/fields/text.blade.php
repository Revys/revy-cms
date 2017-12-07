<div class="form__group form__group--editor">
	<label class="form__group__label" for="form-input-{{ $field['field'] }}">{{ $field['label'] }}</label>
	<div class="form__group__input-group">
		@if (! isset($field['translatable']))
			{{ Form::textarea(
				$field['field'], 
				(isset($object) ? (! is_string($field['value']) ? $field['value']($object) : $object->{$field['value']}) : ''), 
				[
					'id' => 'form-input-' . $field['field'], 
					'class' => 'form__group__input form__group__textarea' . 
						(isset($field['size']) ? ' form__group__input--' . $field['size'] : '') .
						($errors->any($field['field']) ? ' form__group__input--error' : '')
				]
			) }}
			@includeDefault('fields._errors')
		@else
			@includeDefault('fields.translate.text')
		@endif
	</div>
</div>

{{--  <!-- Include Editor style. -->
<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_editor.min.css' rel='stylesheet' type='text/css' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/css/froala_style.min.css' rel='stylesheet' type='text/css' />

@push('js')
	
	<!-- Include JS file. -->
	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.1/js/froala_editor.min.js'></script>

	<script>
		$("#form-input-{{ $field['field'] }}").froalaEditor({
			language: 'ru',
			imageUploadURL: '/scripts/upload_editor_image.php',
			imageAllowedTypes: ['jpeg', 'jpg', 'png', 'svg'],
			fileUpload: false,
			videoUpload: false,
			width: $("#form-input-{{ $field['field'] }}").outerWidth()
		}).on('froalaEditor.image.error', function (e, editor, error, response) {
			if (response !== undefined)
				console.log(response);
		});
	</script>
@endpush  --}}