<div class="active-panel active-panel--edit">
	@if (isset($activePanel['buttons']['back']) && $activePanel['buttons']['back'])
		<a class="active-panel__button active-panel__button--back" href="{{ route('admin::list', [$controller_name]) }}"><i class="icon icon--active-panel-back"></i></a>
	@endif
	
	@if (isset($activePanel['caption']))
		<h1 class="active-panel__caption">{!! $activePanel['caption'] !!}@if(isset($object))<b><small>ID:</small> {{ $object->id }}</b>@endif</h1>
	@endif

	@if (isset($activePanel['buttons']['export']) && $activePanel['buttons']['export'])
		<a class="active-panel__button active-panel__button--export"><i class="icon icon--active-panel-export"></i></a>
	@endif
	@if (isset($activePanel['buttons']['copy']) && $activePanel['buttons']['copy'])
		<a class="active-panel__button active-panel__button--copy"><i class="icon icon--active-panel-copy"></i></a>
	@endif
</div>