<div id="nav">
	<div id="nav-fixed">
		<div class="container">
			<div class="nav-logo">
				<a href="{{ route('home') }}" class="logo">
					<img src="{{ url('storage/images/site-logo.png') }}" alt="">
				</a>
			</div>
			<ul class="nav-menu nav navbar-nav">
				@foreach ($categories as $key => $category)
					<li class="cat-{{ $key-1 }}"><a href="javascript:void(0)">{{ $category['category_name'] }}</a></li>
				@endforeach
			</ul>
			<div class="nav-btns">
				<button class="aside-btn"><i class="fa fa-bars"></i></button>
				<button class="search-btn"><i class="fa fa-search"></i></button>
				<form class="search-form" action="search" method="POST">
					@csrf
					<input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
					<button class="btn btn-primary search-submit">Search</button>
					<button class="search-close"><i class="fa fa-times"></i></button>
				</form>
			</div>
		</div>
	</div>
	<div id="nav-aside">
		<div class="section-row">
			<ul class="nav-aside-menu">
				<li><a href="{{ route('home') }}">Home</a></li>
				<li><a href="{{ route('about') }}">About Us</a></li>
				<li><a href="{{ route('contact') }}">Contact</a></li>
			</ul>
		</div>
		<div class="section-row">
			<h3>Recent Posts</h3>
			{{-- <div class="post post-widget">
				<a class="post-img" href=""><img src="img/xwidget-2.jpg.pagespeed.ic.183VIkUWUH.jpg" alt=""></a>
				<div class="post-body">
					<h3 class="post-title"><a href="">Pagedraw UI Builder Turns Your Website Design Mockup Into Code
							Automatically</a></h3>
				</div>
			</div> --}}
		</div>
		<div class="section-row">
			<h3>Follow us</h3>
			<ul class="nav-aside-social">
				<li>
					<a href="https://www.facebook.com/DELTAPEOPLENGR" target="_blank"><i class="fa fa-facebook"></i></a>
				</li>
				<li>
					<a href="https://twitter.com/softDelta2023/status/1570007990052306945?t=PaV8YodXIYOl7PScKtA9pQ&s=19" target="_blank"><i class="fa fa-twitter"></i></a>
				</li>
				<li>
					<a href="https://www.youtube.com/channel/UCjb02gX0VGb1zcb9OjC2Tvg" target="_blank"><i class="fa fa-youtube"></i></a>
				</li>
			</ul>
		</div>
		<button class="nav-aside-close"><i class="fa fa-times"></i></button>
	</div>
</div>