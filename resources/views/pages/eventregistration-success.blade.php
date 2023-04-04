@extends('frontend.app')

@section('content')
        <!-- Page title -->
        <section id="page-title" data-bg-parallax="{{  asset('images/site-images/' . applicationSettings('inner-banner')) }}" class="inner-banner">
            <div class="bg-overlay"></div>
            
            </div>
        </section>
        <!-- end: Page title -->







        
        <section class="news_secion_details">
            <div class="container">
                <div class="col-lg-12" align="center">
                    <h3>Your Event Registration Submitted Successfully!!</h3>
                    <a href="{{ url('/') }}" class="btn btn-primary">Go Back</a>
                </div>
            </div>
        </section>
@endsection