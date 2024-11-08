
<div class="heading-headline-heading">

<a href="{{ route('home.mainmenupost',9) }}">জাতীয়</a>
<span class="heading-style-heading"></span>
</div>

@forelse ( $getPostDetail['national'] as  $nationalValue)


@if ($loop->first)
<div class="row mt-3 text-center">
    <div class="col-12 categoryNewBox">

          <a href="{{ route('home.newsWithSlug',[$nationalValue->id, $nationalValue->post->slug]) }}">
                <figure class="img1 embed xlarge dark">
                    @if ($nationalValue->post->hasMedia('postpic'))
                        <img src="{{ $nationalValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid rounded-start" />
                    @else
                        <img src="{{ url( $nationalValue->post->imgloc) }}" class="img-fluid rounded-start" alt="news-picture">
                    @endif
                    <figcaption>
                        <div class="d-none d-md-block text-white text-start"> {{ Str::limit($nationalValue->post->head, 70); }}</div>
                        <div class="d-md-none text-white text-start"><strong> {{ Str::limit($nationalValue->post->head, 30); }}</strong></div>
                    </figcaption>
                </figure>
            </a>


    </div>
</div>
@else


<div class="row  mt-2">
     <a href="{{ route('home.newsWithSlug',[$nationalValue->id, $nationalValue->post->slug]) }}" class="hvr-grow">

        <div class="categorySingleNewsBox rounded">

            <div class=" row shadow rounded bg-white border border-2">

                <div class="col-4 text-start">
                    @if ($nationalValue->post->hasMedia('postpic'))
                        <img src="{{ $nationalValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid p-1" />
                    @else
                        <img src="{{ url($nationalValue->post->imgloc) }}" class="img-fluid p-1" alt="news-picture">
                    @endif

                </div>
                <div class="col-8 text-start overflow-hidden">

                        @if(!empty( $nationalValue->post->subhead))
                            <small class="p-2 text-danger"><b> {{ Str::limit($nationalValue->post->subhead,25);  }}</b></small>
                        @endif
                        <h6 class="d-none d-md-block p-1 text-dark">{{ Str::limit($nationalValue->post->head, 50); }}</h6>
                        <span class="d-md-none p-1 text-dark font-bold"><strong>{{ Str::limit($nationalValue->post->head, 30); }}</strong></span>

                </div>

            </div>
        </div>
    </a>
</div>



@endif
@empty

@endforelse
<div class="d-grid gap-2 mt-2">
    <a href="{{ route('home.mainmenupost',9) }}" class="btn btn-danger btn-block radius-30 hvr-wobble-horizontal">
       <p class="">আরও</p>
    </a>
</div>
