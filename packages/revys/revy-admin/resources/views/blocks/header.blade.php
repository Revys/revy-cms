<header id="header">
	<div class="header__sitename">
		<a href="/{{ $locale->code }}" class="header__sitename__link" target="_blank">
			{{ Html::image('admin-assets/img/site/logo.svg', false, ['class' => 'logo', 'width' => 32, 'height' => 32]) }}

			{{ env('APP_NAME', __('Веб-сайт')) }}
		</a>
	</div>	
	
	@include("admin::navigation.top")

	<div class="header__language">{{ $locale->code }}<i class="icon icon--caret header__language__caret"></i></div>

	<div class="header__translation	@translation_mode header__translation--active @endtranslation_mode" title="{{ __('Режим перевода') }}"><i class="icon icon--language"></i></div>

	<a href="{{ route('admin::settings') }}" class="header__settings"><i class="icon icon--settings"></i></a>

	<div class="header__user">{{ $user->name }}</div>
	
	<a href="{{ route('admin::login::logout') }}" class="header__exit"><i class="icon icon--exit"></i></a>
</header>

@push('js')
	<script>
		$(".header__translation").bind("click", function(e){
			let button = $(this);

			$.request({
				controller: "{{ $controller_name }}",
				action: "toggle_translation_mode",
				complete: function(result) {
					button.toggleClass("header__translation--active");
				}
			});
		});
	</script>
@endpush