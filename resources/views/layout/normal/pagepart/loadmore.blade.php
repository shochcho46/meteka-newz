@forelse ($paginatePost as $loadValue)

<div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 mt-2 mb-2 ">
    <a class="hvr-glow verticalAllMenuNewBox" href="{{ route('home.newsWithSlug',[$loadValue->id, $loadValue->post->slug]) }}">
        <div class="bg-white shadow rounded " >

            <div class="row">


                <div class="col-4 text-start">

                    @if ($loadValue->post->hasMedia('postpic'))
                        <img src="{{ $loadValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid rounded-start" />
                    @else
                        <img src="{{ url($loadValue->post->imgloc) }}" class="img-fluid p-1" alt="news-picture">
                    @endif
                </div>
                <div class="col-8 text-start overflow-hidden">

                    @if(!empty( $loadValue->post->subhead))
                        <span class="p-1 text-danger"><b> {{ Str::limit($loadValue->post->subhead,25);  }}</b></span>
                    @endif
                    <h6 class="d-none d-md-block p-1 text-dark">{{ Str::limit($loadValue->post->head, 50); }}</h6>
                    <span class="d-md-none p-1 text-dark font-bold"><strong>{{ Str::limit($loadValue->post->head, 30); }}</strong></span>

                </div>
            </div>
        </div>
    </a>
</div>



@empty

@endforelse
