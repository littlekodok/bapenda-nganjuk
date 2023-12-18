<!doctype html>
<html class="header-dark fixed sidebar-left-sm">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Admin - Bapenda Kabupaten Nganjuk</title>
		<meta name="description" content="Admin - Inspektorat Kota Surakarta">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		<link rel="shortcut icon" href="{{ asset('img/nganjuk-logo.png')}}" type="image/x-icon" />
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap/css/bootstrap.css')}}" />
		<link rel="stylesheet" href="{{ asset('admin/vendor/animate/animate.compat.css')}}">
		<link rel="stylesheet" href="{{ asset('admin/vendor/font-awesome/css/all.min.css')}}" />
		<link rel="stylesheet" href="{{ asset('admin/vendor/boxicons/css/boxicons.min.css')}}" />
		<link rel="stylesheet" href="{{ asset('admin/vendor/magnific-popup/magnific-popup.css')}}" />
		<link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}" />
		<link rel="stylesheet" href="{{ asset('admin/vendor/jquery-ui/jquery-ui.css')}}" />
		<link rel="stylesheet" href="{{ asset('admin/vendor/jquery-ui/jquery-ui.theme.css')}}" />
		<link rel="stylesheet" href="{{ asset('admin/vendor/select2/css/select2.css')}}" />
		<link rel="stylesheet" href="{{ asset('admin/vendor/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" />
		<link rel="stylesheet" href="{{ asset('admin/vendor/morris/morris.css')}}" />
		<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('admin/css/theme.css')}}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ asset('admin/css/skins/default.css')}}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('admin/css/custom.css')}}">

		<!-- Head Libs -->
		<script src="{{ asset('admin/vendor/modernizr/modernizr.js')}}"></script>

		@yield('css')

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			@include('admin.layouts.head')
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				@include('admin.layouts.sidebar')
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					@yield('admincontent')
				</section>
			</div>

		</section>

		<!-- Vendor -->
		<script src="{{ asset('admin/vendor/jquery/jquery.js')}}"></script>
		<script src="{{ asset('admin/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
		<script src="{{ asset('admin/vendor/popper/umd/popper.min.js')}}"></script>
		<script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{ asset('admin/vendor/select2/js/select2.js')}}"></script>
		<script src="{{ asset('admin/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
		<script src="{{ asset('admin/vendor/common/common.js')}}"></script>
		<script src="{{ asset('admin/vendor/nanoscroller/nanoscroller.js')}}"></script>
		<script src="{{ asset('admin/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
		<script src="{{ asset('admin/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
		<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

		<!-- Specific Page Vendor -->
		<script src="{{ asset('admin/vendor/jquery-ui/jquery-ui.js')}}"></script>
		<script src="{{ asset('admin/vendor/jqueryui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
		<script src="{{ asset('admin/vendor/jquery-appear/jquery.appear.js')}}"></script>
		<script src="{{ asset('admin/vendor/bootstrapv5-multiselect/js/bootstrap-multiselect.js')}}"></script>
		<script src="{{ asset('admin/vendor/jquery.easy-pie-chart/jquery.easypiechart.js')}}"></script>
		<script src="{{ asset('admin/vendor/flot/jquery.flot.js')}}"></script>
		<script src="{{ asset('admin/vendor/flot.tooltip/jquery.flot.tooltip.js')}}"></script>
		<script src="{{ asset('admin/vendor/flot/jquery.flot.pie.js')}}"></script>
		<script src="{{ asset('admin/vendor/flot/jquery.flot.categories.js')}}"></script>
		<script src="{{ asset('admin/vendor/flot/jquery.flot.resize.js')}}"></script>
		<script src="{{ asset('admin/vendor/jquery-sparkline/jquery.sparkline.js')}}"></script>
		<script src="{{ asset('admin/vendor/raphael/raphael.js')}}"></script>
		<script src="{{ asset('admin/vendor/morris/morris.js')}}"></script>
		<script src="{{ asset('admin/vendor/gauge/gauge.js')}}"></script>
		<script src="{{ asset('admin/vendor/snap.svg/snap.svg.js')}}"></script>
		<script src="{{ asset('admin/vendor/liquid-meter/liquid.meter.js')}}"></script>

		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('admin/js/theme.js')}}"></script>

		<!-- Theme Custom -->
		<script src="{{ asset('admin/js/custom.js')}}"></script>

		<!-- Theme Initialization Files -->
		<script src="{{ asset('admin/js/theme.init.js')}}"></script>

		<!-- Examples -->
		<script src="{{ asset('admin/js/examples/examples.dashboard.js')}}"></script>
		<script>
			function confirmDelete(url) {				
				if (confirm("Apakah anda yakin untuk menghapus data ini?")) {
					location.href = url;
				}
			}
		</script>
		@yield('js')
	</body>
</html>