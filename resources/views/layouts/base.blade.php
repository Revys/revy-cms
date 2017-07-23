<!DOCTYPE html>
<html lang="{{ \Revy::getLanguage()->code }}">
<head>
	@include('includes.meta')

	@include('includes.head')
</head>
<body>
	<div id="app">
		@include('blocks.header')

		@yield('content')

		@include('blocks.footer')
	</div>
	
	@include('includes.footer')
</body>
</html>