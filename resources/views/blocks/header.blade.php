<div class="top-block">
	<header id="header">
		<div class="content-width">
			<!-- Logo -->
			<a href="#" class="logo" onclick="$('body').goTo();">{{ Html::image('img/site/logo.png', env('APP_NAME', '')) }}</a>

			@include('navigation.top')
			
			@include('navigation.language')

			<div class="phone-block">
				<i class="icon icon-phone-header" @click="showPopup('call')"></i>
				<span>{{ $phone }}</span>
			</div>
		</div>
	</header>

	@include('catalog.banners')
</div>