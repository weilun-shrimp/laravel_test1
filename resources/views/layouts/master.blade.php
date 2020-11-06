<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

		<title>{{ env('APP_NAME') }} - @yield('title')</title>
	</head>

	<body>

		<h1>{{ env('APP_NAME') }} - @yield('title')</h1>

		@include('layouts.navbar')

		<div class='main_contain container'>
			@yield('content')
		</div>

		<div class='container'>
			@include('layouts.footer')
		</div>

		@include('layouts.before_end_body')

	</body>
</html>