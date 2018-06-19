<html>
	<head>
		<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>@yield('title','laravle')--小魔仙电商</title>
		<meta name="_token" content="{{csrf_token()}}">
		<link rel="stylesheet" href="{{mix('css/app.css')}}">
	</head>
	<body>
		<div id="app" class="{{route_class()}}-page">
			@include('layouts._header')
			<div class="container">
				@yield('content')
			</div>
			@include('layouts._footer')
		</div>
		<script src="{{mix('js/app.js')}}"></script>
		@yield('scriptsAfterJs')
	</body>
</html>