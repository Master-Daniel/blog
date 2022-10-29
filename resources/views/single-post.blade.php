@extends('layout.guest')

@section('content')
    <header id="header">
        @include('layout.guest_navigation');
        <div id="post-header" class="page-header">
			<div class="background-img" style="background-image: url({{ asset('public/uploads/'.$post_details->post_image) }});"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-meta">
							<a class="post-category cat-2" href="javascript:void(0)">{{ __('Category') }}</a>
							<span class="post-date">{{ date('F d, Y', strtotime($post_details->created_at)) }}</span>
						</div>
						<h1>{{ ucwords($post_details->title) }}</h1>
					</div>
				</div>
			</div>
		</div>
    </header>

    <div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="section-row sticky-container">
						<div class="main-post">
							<h3>{{ ucwords($post_details->post_title) }}</h3>
							{!! html_entity_decode($post_details->post_body) !!}
						</div>
						<div class="post-shares sticky-shares">
							<a href="https://www.facebook.com/sharer/sharer.php?u={{ url('/posts/details') }}/{{ $post_details->post_slug }}" target="_blank" class="share-facebook"><i class="fa fa-facebook"></i></a>
							<a href="http://twitter.com/share?text={{ $post_details->post_title }}&url={{ url('/posts/details') }}/{{ $post_details->post_slug }}&hashtags={{ $post_details->post_tags }}" target="_blank" class="share-twitter"><i class="fa fa-twitter"></i></a>
							<a href="javascript:void(0)"><i class="fa fa-envelope"></i></a>
						</div>
					</div>

					<div class="section-row text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="img/xad-2.jpg.pagespeed.ic.bUoDgOb5IT.jpg" alt="">
						</a>
					</div>

					{{-- <div class="section-row">
						<div class="post-author">
							<div class="media">
								<div class="media-left">
									<img class="media-object" src="img/author.png" alt="">
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h3>John Doe</h3>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
										nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									</p>
									<ul class="author-social">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
										<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div> --}}


					{{-- <div class="section-row">
						<div class="section-title">
							<h2>3 Comments</h2>
						</div>
						<div class="post-comments">

							<div class="media">
								<div class="media-left">
									<img class="media-object" src="img/avatar.png" alt="">
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h4>John Doe</h4>
										<span class="time">March 27, 2018 at 8:00 am</span>
										<a href="#" class="reply">Reply</a>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
										nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									</p>

									<div class="media">
										<div class="media-left">
											<img class="media-object" src="img/avatar.png" alt="">
										</div>
										<div class="media-body">
											<div class="media-heading">
												<h4>John Doe</h4>
												<span class="time">March 27, 2018 at 8:00 am</span>
												<a href="#" class="reply">Reply</a>
											</div>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
												tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
												veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
												commodo consequat.</p>
										</div>
									</div>

								</div>
							</div>


							<div class="media">
								<div class="media-left">
									<img class="media-object" src="img/avatar.png" alt="">
								</div>
								<div class="media-body">
									<div class="media-heading">
										<h4>John Doe</h4>
										<span class="time">March 27, 2018 at 8:00 am</span>
										<a href="#" class="reply">Reply</a>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
										nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									</p>
								</div>
							</div>

						</div>
					</div> --}}


					<div class="section-row">
						<div class="section-title">
							<h2>Leave a reply</h2>
							<p>your email address will not be published. required fields are marked *</p>
						</div>
						<form class="post-reply">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span>Name *</span>
										<input class="input" type="text" name="name">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span>Email *</span>
										<input class="input" type="email" name="email">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="input" name="message" placeholder="Message"></textarea>
									</div>
									<button class="primary-button">Submit</button>
								</div>
							</div>
						</form>
					</div>

				</div>


				<div class="col-md-4">

					<div class="aside-widget text-center">
						<a href="#" style="display: inline-block;margin: auto;">
							<img class="img-responsive" src="img/xad-1.jpg.pagespeed.ic.C1dNWPxojd.jpg" alt="">
						</a>
					</div>

                    @empty($most_reads)
                        <div class="aside-widget">
                            <div class="section-title">
                                <h2>Most Read</h2>
                            </div>

                            <div class="post post-widget">
                                <a class="post-img" href="blog-post.html"><img
                                        src="img/xwidget-1.jpg.pagespeed.ic.nqEkEDP2_z.jpg" alt=""></a>
                                <div class="post-body">
                                    <h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And
                                            Development Tools</a></h3>
                                </div>
                            </div>
                            
                        </div>
                    @endempty
					
					@empty($posts)
                        <div class="aside-widget">
                            <div class="section-title">
                                <h2>Featured Posts</h2>
                            </div>
                            @foreach ($posts as $post)
                                <div class="post post-thumb">
                                    <a class="post-img" href="{{ '/posts/details/'.$post->post_slug }}">
                                        <img src="{{ asset('public/uploads/'.$post->post_image) }}" alt="">
                                    </a>
                                    <div class="post-body">
                                        <div class="post-meta">
                                            <a class="post-category cat-3" href="javascript:void(0)">{{ __('Category') }}</a>
                                            <span class="post-date">{{ date('F d, Y', strtotime($post->created_at)) }}</span>
                                        </div>
                                        <h3 class="post-title"><a href="{{ '/posts/details/'.$post->post_slug }}">{{ ucwords($post->post_title) }}</a></h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endempty

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
								<li><a href="javascript:void(0)">Tags</a></li>
							</ul>
						</div>
					</div>
					<div class="aside-widget">
						<div class="section-title">
							<h2>Archive</h2>
						</div>
						<div class="archive-widget">
							<ul>
								<li><a href="javascript:void(0)">January 2022</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <script>
        const quote = document.querySelectorAll('blockquote')
        if (quote != null || quote != undefined) {
            quote.forEach(element => {
				element.classList.add('blockquote');
			});
        }
    </script>
@endsection