@include('back-end.layouts.header')
@include('back-end.modules.top-nav')

<body>
	<div class="row">

@include('back-end.modules.left-nav')
	@yield('content')
	</div>
</body>
@include('back-end.layouts.footer')