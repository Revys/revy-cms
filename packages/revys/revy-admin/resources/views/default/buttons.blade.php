@if (count($fieldGroup['actions']))
	<div class="form__group__actions">
		@foreach($fieldGroup['actions'] as $action => $button)
			@if (! isset($button['type']))
				<a class="button button--{{ $button['style'] }} button--{{ $action }}" href="@if (isset($button['link']) && is_callable($button['link'])){{ $button['link']($controller_name, $object) }}@else{{ $button['link'] }}@endif">{{ $button['label'] }}</a>
			@elseif ($button['type'] == 'submit')
				{{ Form::submit($button['label'], ['class' => 'button button--' . $button['style'] . ' button--' . $action]) }}
			@endif
		@endforeach
	</div>
@endif