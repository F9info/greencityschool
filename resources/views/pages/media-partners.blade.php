@if (getMediaPartners() != null)
    <section class="sponser-block media-partners text-center">
        <div class="container">
            <h2 class="home-title">Media Partners</h2>
            <div class="five-items">
                @foreach (getMediaPartners() as $sponsor)
                    <a href="{{ $sponsor->url }}" target="_blank">
                        <figure><img src="{{ asset('images/sponsor/' . $sponsor->image) }}" alt="image" />
                        </figure>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endif
