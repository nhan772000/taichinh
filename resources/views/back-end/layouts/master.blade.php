@include('back-end.layouts.header')
@include('back-end.modules.top-nav')
        @include('back-end.flash-message')

<body>
	<div class="row">

@include('back-end.modules.left-nav')
	@yield('content')
	</div>
</body>
@include('back-end.layouts.footer')