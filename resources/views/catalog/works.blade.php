<section class="works block dark" id="works">
	<h3 class="header">@lang('Наши работы')</h3>
	
	<div class="works-list owl-carousel">
		<div class="work content-width">
			<div class="image">
				{{ Html::image('img/data/works/1/image.png', __('Посадочная страница (LANDING)')) }}
			</div>
			<div class="info">
				<div class="title">
					<h2>@lang('Посадочная страница (LANDING)')</h2>
					<div class="link">
						<i class="icon icon-link"></i><a target="_blank" href="http://aromamarketing.md">www.aromamarketing.md</a>
					</div>
				</div>
				<div class="features">
					<div class="feature">
						<div class="icon">{{ Html::image('img/data/works/1/icons/responsive.svg', __('Адаптивный дизайн')) }}</div>
						<div>
							<b>@lang('Адаптивный дизайн')</b>
							<p>@lang('Сайт также хорошо отображается на смартфонах, как и на настольком компьютере')</p>
						</div>
					</div>
					<div class="feature">
						<div class="icon">{{ Html::image('img/data/works/1/icons/multilang.svg', __('Поддержка нескольких языков')) }}</div>
						<div>
							<b>@lang('Поддержка нескольких языков')</b>
							<p>@lang('Страница полностью переведёна на 2 языка')</p>
						</div>
					</div>
					<div class="feature">
						<div class="icon">{{ Html::image('img/data/works/1/icons/animation.svg', __('Приятная анимация')) }}</div>
						<div>
							<b>@lang('Приятная анимация')</b>
							<p>@lang('Проработана анимация различных элементов страницы: кнопки, поля для ввода текста, активные блоки')</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>