@extends('layout.guest')

@section('content')

    <header id="header">
        @include('layout.guest_navigation')
    </header>

    <div class="section">
        <div class="container">
            @php ($array = [])
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Search Result: {{ $title }}</h2>
                    </div>
                </div>
                @foreach ($search as $post)
                    @if (!in_array($post->id, $array))
                        <div class="col-md-4">
                            <div class="post">
                                <a class="post-img" href="{{ '/posts/details/'.$post->post_slug }}">
                                    <img src="{{ asset('public/uploads/'.$post->post_image) }}" alt="">
                                </a>
                                <div class="post-body">
                                    <div class="post-meta">
                                        <a class="post-category cat-1" href="javascript:void(0)">{{ __('Category') }}</a>
                                        <span class="post-date">{{ date('F d, Y', strtotime($post->created_at)) }}</span>
                                    </div>
                                    <h3 class="post-title"><a href="{{ '/posts/details/'.$post->post_slug }}">{{ $post->post_title }}</a></h3>
                                </div>
                            </div>
                        </div>
                    @endif
                    @php ($array[] = $post->id)
                @endforeach
            </div>
            @if ($posts)
                <div class="row">
                    <div class="col-md-4">
                        @empty($most_reads)
                            <div class="aside-widget">
                                <div class="section-title">
                                    <h2>Most Read</h2>
                                </div>
                                <div class="post post-widget">
                                    <a class="post-img" href="blog-post.html">
                                        <img src="img/xwidget-1.jpg.pagespeed.ic.nqEkEDP2_z.jpg" alt="">
                                    </a>
                                    <div class="post-body">
                                        <h3 class="post-title">
                                            <a href="blog-post.html">Title Goes Here</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        @endempty

                        <div class="aside-widget">
                            {{-- <div class="section-title">
                                <h2>Featured Posts</h2>
                            </div> --}}
                            {{-- @foreach ($posts as $post)
                                @if (!in_array($post->id, $array) && $post->post_section == 'featured' && count($array) <= 2)
                                    <div class="post post-thumb">
                                        <a class="post-img" href="{{ '/posts/details/'.$post->post_slug }}">
                                            <img src="{{ asset('public/uploads/'.$post->post_image) }}" alt=""></a>
                                        <div class="post-body">
                                            <div class="post-meta">
                                                <a class="post-category cat-3" href="javascript:void(0)">{{ __('Category') }}</a>
                                                <span class="post-date">{{ date('F d, Y', strtotime($post->created_at)) }}</span>
                                            </div>
                                            <h3 class="post-title"><a href="{{ '/posts/details/'.$post->post_slug }}">{{ $post->post_title }}</a></h3>
                                        </div>
                                    </div>
                                    @php ($array[] = $post->id)
                                @endif
                            @endforeach --}}
                        </div>
    
                        <div class="aside-widget text-center">
                            <a href="#" style="display: inline-block;margin: auto;">
                                <img class="img-responsive" src="img/xad-1.jpg.pagespeed.ic.C1dNWPxojd.jpg" alt="">
                            </a>
                        </div>
    
                    </div>
                </div>
                <div class="section section-grey">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title text-center">
                                    <h2>Featured Posts</h2>
                                </div>
                            </div>
            
                            @foreach ($posts as $post)
                                @if (!in_array($post->id, $array) && $post->post_section == 'featured' && count($array) <= 3)
                                    <div class="col-md-4">
                                        <div class="post">
                                            <a class="post-img" href="{{ '/posts/details/'.$post->post_slug }}">
                                                <img src="{{ asset('public/uploads/'.$post->post_image) }}" alt="">
                                            </a>
                                            <div class="post-body">
                                                <div class="post-meta">
                                                    <a class="post-category cat-2" href="javascript:void(0)">{{ __('Category') }}</a>
                                                    <span class="post-date">{{ date('F d, Y', strtotime($post->created_at)) }}</span>
                                                </div>
                                                <h3 class="post-title"><a href="{{ '/posts/details/'.$post->post_slug }}">{{ $post->post_title }}</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                    @php ($array[] = $post->id)
                                @endif
                            @endforeach
            
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
                        @empty($most_reads)
                            <div class="col-md-12">
                                <div class="section-title">
                                    <h2>Most Read</h2>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="post post-row">
                                    <a class="post-img" href="blog-post.html"><img
                                            src="img/xpost-4.jpg.pagespeed.ic.acII8ZYTz8.jpg" alt=""></a>
                                    <div class="post-body">
                                        <div class="post-meta">
                                            <a class="post-category cat-2" href="category.html">JavaScript</a>
                                            <span class="post-date">March 27, 2018</span>
                                        </div>
                                        <h3 class="post-title"><a href="blog-post.html">Chrome Extension Protects Against
                                                JavaScript-Based CPU Side-Channel Attacks</a></h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                                    </div>
                                </div>
                            </div>
                        @endempty

						{{-- <div class="col-md-12">
							<div class="section-row">
								<button class="primary-button center-block">Load More</button>
							</div>
						</div> --}}

					</div>
				</div>
				<div class="col-md-4">

					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="img/xad-1.jpg.pagespeed.ic.C1dNWPxojd.jpg" alt="">
						</a>
					</div>


					<div class="aside-widget">
						<div class="section-title">
							<h2>Catagories</h2>
						</div>
						<div class="category-widget">
							<ul>
                                @foreach ($categories as $category)
                                    <li><a href="javascript:void(0)" class="cat-1">{{ $category->category_name }}<span>{{ get_number_of_category_posts($category->id) }}</span></a></li>
                                @endforeach
							</ul>
						</div>
					</div>


					<div class="aside-widget">
						<div class="tags-widget">
							<ul>
								<li><a href="javascript:void(0)">Posts</a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
@endsection