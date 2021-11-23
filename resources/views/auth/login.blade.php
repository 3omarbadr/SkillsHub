@extends('web.layout')

@section('title')
    Log In 
@endsection

@section('main')
    		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{url("web/img/page-background.jpg")}})"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="{{url('/')}}">{{__('web.home')}}</a></li>
							<li>{{__('web.signin')}}</li>
						</ul>
						<h1 class="white-text">{{__("web.signinExam")}}</h1>

					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- Contact -->
		<div id="contact" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- login form -->
					<div class="col-md-6 col-md-offset-3">
						<div class="contact-form">
							<h4>{{__('web.signin')}}</h4>

                            @include('web.inc.messages')
							<form method="POST" action="{{url('login')}}">
                                @csrf
								<input class="input" type="email" name="email" placeholder="Email">
								<input class="input" type="password" name="password" placeholder="Password">
                                <input type="checkbox" name="remember" id=""> {{__('web.rememberme')}}
                                <br>
								<button type="submit" class="main-button icon-button pull-right">{{__('web.signin')}}</button>
							</form>
							<a href="{{url('forgot-password')}}" class="text-muted">{{__('web.forgotPassword')}} ?</a>
						</div>
					</div>
					<!-- /login form -->

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact -->
@endsection