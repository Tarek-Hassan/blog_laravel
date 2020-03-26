<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<!--end::Page Vendors -->
<link href="{{asset('control')}}/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{asset('control')}}/assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
</head>
    <body>

    <!--  -->
    @yield('content')
    <!--begin::Base Scripts -->
		<script src="{{asset('control')}}/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="{{asset('control')}}/assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->
    @yield('script')
    </body>
</html>
