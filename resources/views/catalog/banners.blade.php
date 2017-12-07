<div class="banners content-width block" id="banners">
	<div class="banner">
		{{ Html::image('img/site/user-experience.svg', 'User experience', ['width'=> '386', 'height' => '478', 'class' => 'image']) }}

		<div class="info">
			{!! $textblocks['banner_text'] !!}

			<button class="button darker order" @click="showPopup('call')">{{ __('Заказать') }}</button>
		</div>
	</div>
</div>