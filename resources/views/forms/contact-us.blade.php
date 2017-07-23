<section class="contact-us block background" id="contacts">
	<div class="content-width">
		<h3 class="header">@lang('Напишите нам')</h3>

		{!! Form::open([
			'url' => \Revy::getLanguage()->code.'/send/contact', 
			'class' => 'form darker', 
			'@submit.prevent' => 'onSubmit($event)',
			'@keydown' => 'form.errors.clear($event.target.name)'
		]) !!}

			<div class="row">
				<div class="col">
					<div class="input-container">
						{{ Form::email('email', null, ['placeholder' => __('E-mail'), 'v-model' => 'form.email']) }}
						
						<i class="error-flag" :class="{ visible: form.errors.has('email') }">!</i>
					</div>
				</div>
				<div class="col">
					<div class="input-container">
						{{ Form::text('phone', null, ['placeholder' => __('Телефон'), 'v-model' => 'form.phone']) }}
						<span v-show="!form.phone">(@lang('необязательно'))</span>
						
						<i class="error-flag" :class="{ visible: form.errors.has('phone') }">!</i>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="input-container">
					{{ Form::textarea('message', null, ['placeholder' => __('Ваше сообщение ...'), 'v-model' => 'form.message']) }}
					
					<i class="error-flag" :class="{ visible: form.errors.has('message') }">!</i>
				</div>
			</div>

			{{ Form::submit(__('Отправить сообщение'), ['class' => 'button primary']) }}

		{!! Form::close() !!}
	</div>
</section>