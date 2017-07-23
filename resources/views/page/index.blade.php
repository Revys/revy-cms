@extends('layouts.base')

@section('content')
	@include('infoblocks.services')
	@include('infoblocks.site-creating')
	@include('infoblocks.advantages')
	@include('infoblocks.order-now')
	@include('catalog.clients')
	@include('catalog.works')
	@include('catalog.testimonials')
	@include('forms.contact-us')

	@include('popups.call')
@endsection