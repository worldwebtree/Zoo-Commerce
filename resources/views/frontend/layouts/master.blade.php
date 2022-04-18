<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('tittle')</title>
 
    @include('frontend.partials.style')
  
  
</head><!--/head-->

<body>
	@include('frontend.partials.header')
	
    @yield('slider_content')
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
				@include('frontend.partials.sidebar')
				</div>
				
				<div class="col-sm-9 padding-right">
                @yield('content')
                </div>
				</div>
			</div>
		</div>
	</section>
	
	@include('frontend.partials.footer')
	

  
  @include('frontend.partials.scripts')
</body>
</html>