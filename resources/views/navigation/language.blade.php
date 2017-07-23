@if(count($languages))
	<div class="languages">
		@foreach($languages as $item)
			<a href="/{{ $item->code }}"@if($item->isSelected()) class="selected"@endif>{{ $item->code }}</a>
		@endforeach
	</div>
@endif