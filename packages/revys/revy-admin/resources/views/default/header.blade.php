<div class="header__navigation">
	@if(isset($path) && count($path))
		<div class="header__path">
			@foreach($path as $title)
				<span class="header__path__item">{{ $title }}@if(isset($object) && $title === end($path)) ID: {{ $object->id }}@endif</span>
			@endforeach
		</div>
	@endif
	@if(isset($caption))
		<div class="header__caption">{{ $caption }}</div>
	@endif
	@if(isset($actions['create']) && $actions['create'] && $action !== "create")
		<a href="{{ route('admin::create', [$controller_name]) }}" class="header__add-item">@lang("Добавить")<i class="icon icon--add"></i></a>
	@endif
</div>