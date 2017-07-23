<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">



<!-- SEO -->
<title>{{ $page->meta_title }}</title>

@if( $page->meta_description )
	<meta name="description" content="{{ $page->meta_description }}" />
@endif
@if( $page->meta_keywords )
	<meta name="keywords" content="{{ $page->meta_keywords }}" />
@endif