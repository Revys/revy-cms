{!! Form::open(['url' => '/send/call', 'class' => 'form']) !!}

	<div class="row">
		{{ Form::text('phone', null, ['placeholder' => __('Введите ваш телефон'), 'autofocus' => 'autofocus']) }}
	</div>

	{{ Form::submit(__('Отправить'), ['class' => 'button primary']) }}

{!! Form::close() !!}