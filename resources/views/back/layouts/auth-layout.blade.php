
<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>@yield('title')</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="/back/vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/back/vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/back/vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="/back/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="/back/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="/back/vendors/styles/style.css">
    @stack('stylesheets')
</head>
<body class="login-page">
	@yield('content')
	</div>
	<!-- js -->
	<script src="/back/vendors/scripts/core.js"></script>
	<script src="/back/vendors/scripts/script.min.js"></script>
	<script src="/back/vendors/scripts/process.js"></script>
	<script src="/back/vendors/scripts/layout-settings.js"></script>
    @yield('script')
</body>
</html>