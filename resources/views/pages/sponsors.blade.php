
@if(getSponsors() != null)
    <section class="sponser-block text-center">
        <div class="container">
            <h2 class="home-title">Sponsors</h2>
            <div class="five-items">
                @foreach(getSponsors() as $sponsor)
                    <a href="{{ $sponsor->url }}" target="_blank">
                        <figure><img src="{{ asset('images/sponsor/'.$sponsor->image) }}" alt="image" />
                        </figure>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif
