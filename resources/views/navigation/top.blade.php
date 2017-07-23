@if(count($navigation))
	<nav class="menu">
		@foreach($navigation as $item)
			<a href="#{{ $item->urlid }}" onclick="$('#{{ $item->urlid }}').goTo({ offset: -100 })" class="menu-item">{{ $item->title }}</a>
		@endforeach
	</nav>
@endif