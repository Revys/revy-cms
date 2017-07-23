<div class="banners content-width block" id="banners">
	<div class="banner">
		{{ Html::image('img/site/user-experience.svg', 'User experience', ['width'=> '386', 'height' => '478', 'class' => 'image']) }}

		<div class="info">
			<b>{{ __('Веб сайт') }}</b> — <br />{{ __('идеальное решение для вашего бизнеса') }}

			<button class="button darker order" @click="showPopup('call')">{{ __('Заказать') }}</button>
		</div>
	</div>
</div>