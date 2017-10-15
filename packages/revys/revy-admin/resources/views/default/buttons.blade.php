@if (count($fieldGroup['actions']))
	<div class="form__group__actions">
		@foreach($fieldGroup['actions'] as $action => $button)
			@if ($button !== false)
				@if (! isset($button['type']))
					<a class="button button--{{ $button['style'] }} button--{{ $action }}" href="@if (isset($button['link']) && is_callable($button['link'])){{ $button['link']($controller_name, (isset($object) ? $object : null)) }}@else{{ $button['link'] }}@endif">{!! $button['label'] !!}</a>
				@elseif ($button['type'] == 'submit')
					{{ Form::button($button['label'], ['type' => 'submit', 'class' => 'button button--' . $button['style'] . ' button--' . $action]) }}
				@endif
			@endif
		@endforeach
	</div>

	@push('js')
		<script>
			$(".form__group__actions .button").bind("click", function(e){
				if ($(this).hasClass('button--loading'))
					return false;

				$(this).width($(this).width()).addClass('button--loading');
			});
		</script>
	@endpush
@endif