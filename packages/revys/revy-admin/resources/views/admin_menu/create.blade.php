@extends(RevyAdmin::layout('base'))

@section('content')

	<section class="login-block">
		{!! Form::open([
			'route' => 'admin::login::signin',
			'class' => 'form',
			'id' => 'login-block',
			'@submit.prevent' => 'onSubmit($event)',
			'@keydown' => 'form.errors.clear($event.target.name)'
		]) !!}

			<h1>@lang('Вход в систему')</h1>

			<div class="form__group">
				<label class="form__group__label" for="form-input-id">@lang('Логин') / @lang('Email')</label>
				{{ Form::text('id', null, ['v-model' => 'form.id', 'id' => 'form-input-id', 'class' => 'form__group__input']) }}
				
				{{-- <i class="error-flag" :class="{ visible: form.errors.has('email') }">!</i> --}}
			</div>

			<div class="form__group">
				<label class="form__group__label" for="form-input-password">@lang('Пароль')</label>
				{{ Form::password('password', ['v-model' => 'form.password', 'id' => 'form-input-password', 'class' => 'form__group__input']) }}
				
				{{-- <i class="error-flag" :class="{ visible: form.errors.has('password') }">!</i> --}}
			</div>

			<div class="form__group form__group--toggler">
				<label class="form__group__label" for="form-input-remember">@lang('Запомнить меня')</label>
				<div class="switcher">
					<input type="checkbox" id="form-input-remember" v-model="form.remember">
					<div class="switcher__lever"></div>
				</div>
			</div>
		
			{{ Form::submit(__('Вход'), ['class' => 'button button--primary']) }}

		{!! Form::close() !!}
	</section>

@endsection