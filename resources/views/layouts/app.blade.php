<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<title>Laravel Livewire/AlpineJS</title>

	{{-- Fonts --}}
	<link rel="dns-prefetch" href="//fonst.gstatic.com">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">

	{{-- Boostrap Styles --}}
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	{{-- App.js --}}
	<script src="{{ asset('js/app.js') }}" defer></script>

	@livewireStyles
</head>
<body>
	<div id="app">
		{{ $slot }}
	</div>
	@livewireScripts
</body>
</html>