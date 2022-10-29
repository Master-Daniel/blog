@extends('layout.guest')

@section('content')
    <header id="header">
        @include('layout.guest_navigation')
        <div class="page-header">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<ul class="page-header-breadcrumb">
							<li><a href="{{ route('home') }}">Home</a></li>
							<li>Contact</li>
						</ul>
						<h1>Contact</h1>
					</div>
				</div>
			</div>
		</div>
    </header>

    <div class="section">

		<div class="container">

			<div class="row">
				<div class="col-md-6">
					<div class="section-row">
						<h3>Contact Information</h3>
						<p></p>
						<ul class="list-style">
							<li>
								<p>
                                    <strong>Email:</strong>
                                    <a href="#">
                                        <span class="__cf_email__" data-cfemail="207745424d414760454d41494c0e434f4d">[email&#160;protected]</span>
                                    </a>
								</p>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-5 col-md-offset-1">
					<div class="section-row">
						<h3>Send A Message</h3>
						<form>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<span>Email</span>
										<input class="input" type="email" name="email">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<span>Subject</span>
										<input class="input" type="text" name="subject">
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
			</div>
		</div>
	</div>
@endsection