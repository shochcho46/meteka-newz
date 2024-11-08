<h3 class="border-bottom border-danger  p-2">
    <a href="{{ route('home.mainmenupost',16) }}" class="bg-success text-white  p-2"> লাইফস্টাইল </a>
</h3>

<div class="row mt-4">


@forelse ( $getPostDetail['lifestyle'] as  $lifeStyleValue)



    <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6 col-sm-12 mt-3 mb-3">
        <a href="{{ route('home.newsWithSlug',[$lifeStyleValue->id, $lifeStyleValue->post->slug]) }}" class="hvr-grow">
        <div class="overLayNewBox">

                <figure class="img1 embed xlarge dark">

                    @if ($lifeStyleValue->post->hasMedia('postpic'))
                                <img src="{{ $lifeStyleValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid" />
                            @else
                                <img src="{{ url( $lifeStyleValue->post->imgloc) }}" class="img-fluid rounded-start" alt="news-picture">
                            @endif
                    <figcaption>
                        @if(!empty( $lifeStyleValue->post->subhead))
                                <small class="d-md-none text-danger text-start"><b> {{ Str::limit($lifeStyleValue->post->subhead,25);  }}</b></small>
                                <small class="d-none d-md-block text-danger text-start"><b> {{ Str::limit($lifeStyleValue->post->subhead,40);  }}</b></small>
                        @endif

                        <div class="d-md-none  text-white text-start">{{ Str::limit($lifeStyleValue->post->head,28); }}</div>
                        <div class="d-none d-md-block text-white text-start">{{ Str::limit($lifeStyleValue->post->head, 50); }}</div>
                    </figcaption>
                </figure>

        </div>
        </a>
    </div>


@empty

@endforelse

</div>
