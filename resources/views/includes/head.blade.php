<link rel="stylesheet" href="{{ asset('css/app.css') }}" />

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Scripts -->
<script>
	window.Laravel = {!! json_encode([
		'csrfToken' => csrf_token(),
	]) !!};
</script>