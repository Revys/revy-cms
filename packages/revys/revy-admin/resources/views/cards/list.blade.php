<section class="card card--list" id="{{ $oc }}">
	@if(isset($caption))
		<div class="card__header">
			{{ $caption }}
		</div>
	@endif
	<div class="card__content">
		@if($items->hasMorePages() || $items->previousPageUrl() !== '' || $order || $filters)
			<div class="card__header">
				@include($controller->getViewRoute('order'))
				@include($controller->getViewRoute('pagination'))
			</div>
		@endif
		
		@if(count($items))
			<table class="data-table{{ !isset($auto_width) ? ' data-table--fixed' : '' }}">
				<thead>
					<tr class="data-table__titles">
						@if(isset($selectable))
							<td class="data-table__checkbox">
								<div class="checkbox">
									<input type="checkbox" class="checkbox__input" id="{{ $oc }}-checkbox-field-parent" />
									<label class="checkbox__label" for="{{ $oc }}-checkbox-field-parent"></label>
								</div>
							</td>
						@endif
						
						@foreach($fields as $field)
							<td class="data-table__titles__title">{{ $field['title'] }}</td>
						@endforeach
					</tr>
				</thead>

				<tbody>
					@foreach($items as $item)
						<tr class="data-table__values{{ $item->isHidden() ? ' data-table__values--state-block' : '' }}">
							@if(isset($selectable))
								<td class="data-table__checkbox">
									<div class="checkbox">
										<input type="checkbox" class="checkbox__input" id="{{ $oc }}-checkbox-field-{{ $item->id }}" />
										<label class="checkbox__label" for="{{ $oc }}-checkbox-field-{{ $item->id }}"></label>
									</div>
								</td>
							@endif
							
							@foreach($fields as $field)
								<td class="data-table__values__value">
									@if(isset($field['link']) && is_string($field['link']))
										<a class="data-table__values__value__link" href="{{ $field['link'] }}">{{ $item->{$field['field']} }}</a>
									@elseif(isset($field['link']) && is_callable($field['link']))
										<a class="data-table__values__value__link" href="{{ $field['link']($item) }}">{{ $item->{$field['field']} }}</a>
									@elseif(isset($field['link']))
										<a class="data-table__values__value__link" href="{{ route('admin::edit', [$controller_name, $item->id]) }}">{{ $item->{$field['field']} }}</a>
									@else
										{{ $item->{$field['field']} }}
									@endif
								</td>
							@endforeach
						</tr>
					@endforeach
				</tbody>
			</table>
		@endif
	</div>
</section>