@if(count($services))
    <section class="services content-width block">
        <h3 class="header">@lang('Чем мы занимаемся?')</h3>

        @foreach($services as $service)
            <div class="service">
                {{ Html::image('img/site/service-' . $service->id . '.png', $service->title) }}
                <h2 class="title">{{ $service->title }}</h2>
                <p>{{ $service->description }}</p>
            </div>
        @endforeach

        {{--<div class="service">--}}
            {{--{{ Html::image('img/site/service-1.png', __('Изготовление сайтов')) }}--}}
            {{--<h2 class="title">@lang('Изготовление сайтов')</h2>--}}
            {{--<p>@lang('We strive to ensure that our customers are satisfied and we work continuously to develop your projects and surpass your expectations.')</p>--}}
        {{--</div>--}}
        {{--<div class="service">--}}
            {{--{{ Html::image('img/site/service-2.png', __('Разработка дизайна')) }}--}}
            {{--<h2 class="title">@lang('Разработка дизайна')</h2>--}}
            {{--<p>@lang('Rankings, links, brand, content, traffic – all you need is right here! Simply drop us a line, and you will get your conversions!')</p>--}}
        {{--</div>--}}
        {{--<div class="service">--}}
            {{--{{ Html::image('img/site/service-3.png', __('Проектирование веб-приложений')) }}--}}
            {{--<h2 class="title">@lang('Проектирование веб-приложений')</h2>--}}
            {{--<p>@lang('We have been on web marketing for 12 years helping you compete on Internet and converting your visitors into your clients.')</p>--}}
        {{--</div>--}}
    </section>
@endif