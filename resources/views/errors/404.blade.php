<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="author" content="{!! applicationSettings('site-name') !!}" />
        <meta name="description" content="{!! applicationSettings('site-name') !!}">
        <!-- Document title -->
        <title>{!! applicationSettings('site-name') !!}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('images/site-images/'.applicationSettings('favicon')) }}">
        <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    </head>
    <body class="error_pages">
        <div class="error_content">
<div class="container">
            <div class="row inner">
                <div class="col-md-6 text">
                    <a class="logo" href="{{ url('/') }}">
                        <img alt="{!! applicationSettings('site-name')
                        !!}" src="{{ asset('images/site-images/'.applicationSettings('logo')) }}" />
                    </a>
<h1><span>Error 404,</span> Page not found.</h1>
<p>The page you are looking for doesn't exit or an error occured.</p>
<div class="text-left">
    <a href="{{ url('/') }}" class="btn btn-primary">Go to Home Page</a>
</div>
                </div>
<div class="col-md-6  pic">
<figure>
    <img alt="{!! applicationSettings('site-name')
    !!}"  src="{{ asset('images/404error.svg') }}">
</figure>
</div>
            </div>
        </div>

        </div>

</body>
</html>
