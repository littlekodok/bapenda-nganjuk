<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		@include('layouts/head')

	</head>
	{{-- <body id="body" class="one-page" data-plugin-scroll-spy data-plugin-options="{'target': '#header'}"> --}}
	<body id="body" class="loading-overlay-showing one-page" data-loading-overlay data-plugin-options="{'hideDelay': 800}">
		{{-- <div class="loading-overlay">
			<div class="bounce-loader">
				<div class="cssload-thecube">
						<img src="{{ asset('img/nganjuk-logo.png') }}" class="img-fluid appear-animation animated flip appear-animation-visible" data-appear-animation="flip" data-appear-animation-delay="10" data-appear-animation-duration="1s" style="animation-duration: 1s; animation-delay: 0ms;">
			
				</div>
			</div>
		</div> --}}
		<div class="loading-overlay">
			<div class="preloader-logo">
				<img src="{{ asset('img/nganjuk-logo.png') }}" width="50px" alt="">
			</div>
		</div>
		@yield('content')

		@include('layouts/footer')
	</body>
</html>
