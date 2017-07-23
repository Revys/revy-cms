<div class="form__group form__group--toggler">
	<label class="form__group__label" for="form-input-{{ $field['field'] }}">{{ $field['label'] }}</label>
	<div class="switcher">
		{{ Form::checkbox(
			$field['field'], 
			1, 
			(is_callable($field['value']) ? $field['value']($object) : $object->{$field['value']}), 
			[
				'id' => 'form-input-' . $field['field'], 
				'class' => 'form__group__input'
			]
		 ) }}
		<div class="switcher__lever"></div>
	</div>
</div>