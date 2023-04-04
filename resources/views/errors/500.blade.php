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
        <div class="error_content 500_page">
<div class="container">
            <div class="row inner">
                <div class="col-md-6 text">
                    <a class="logo" href="{{ url('/') }}">
                        <img alt="{!! applicationSettings('site-name')
                        !!}" src="{{ asset('images/site-images/'.applicationSettings('logo')) }}" />
                    </a>
<h1><span>Server Error 500,</span> Something went wrong.</h1>
<p>The server encountered an error and could not complete your request</p>

                </div>
<div class="col-md-6  pic">
<figure>
    <img alt="{!! applicationSettings('site-name')
    !!}"  src="{{ asset('images/500eroor.svg') }}">
</figure>
</div>
            </div>
        </div>

        </div>

</body>
</html>
