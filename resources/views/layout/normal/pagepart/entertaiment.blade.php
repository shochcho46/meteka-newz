<h3 class="border-bottom border-danger  p-2">
    <a href="{{ route('home.mainmenupost', 15) }}" class="bg-success text-white  p-2"> বিনোদন </a>
</h3>


<div class="row">



    @forelse ($getPostDetail['entertainment'] as $entertaimentValue)
        <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-12  mt-2 mb-2 text-dark">
            <a class="hvr-bounce-out"
                href="{{ route('home.newsWithSlug', [$entertaimentValue->id, $entertaimentValue->post->slug]) }}">
                <div class=" d-none d-lg-block threeColbox shadow rounded text-center">

                    <div class="p-1">
                        @if ($entertaimentValue->post->hasMedia('postpic'))
                            <img src="{{ $entertaimentValue->post->getFirstMediaUrl('postpic', 'webp_format') }}"
                                alt="news-picture" class="img-fluid" />
                        @else
                            <img src="{{ url($entertaimentValue->post->imgloc) }}" class="p-1 img-fluid "
                                alt="news-picture">
                        @endif
                    </div>
                    <div class="p-1 text-start">
                        @if (!empty($entertaimentValue->post->subhead))
                            <small class="d-md-none p-1 text-danger text-start"><b>
                                    {{ Str::limit($entertaimentValue->post->subhead, 20) }}</b></small>
                            <small class="d-none d-md-block p-1 text-danger text-start"><b>
                                    {{ Str::limit($entertaimentValue->post->subhead, 40) }}</b></small>
                        @endif
                        <div class="d-md-none p-1 text-dark text-start"><strong>
                                {{ Str::limit($entertaimentValue->post->head, 25, '...') }}</strong></div>
                        <div class="d-none d-md-block p-1 text-dark text-start"><strong>
                                {{ Str::limit($entertaimentValue->post->head, 30, '...') }}</strong></div>
                    </div>

                </div>



                <div class="d-lg-none verticalNewBox shadow rounded  bg-white ">

                    <div class="row">


                        <div class="col-4 text-start">

                            @if ($entertaimentValue->post->hasMedia('postpic'))
                                <img src="{{ $entertaimentValue->post->getFirstMediaUrl('postpic', 'webp_format') }}"
                                    alt="news-picture" class="img-fluid" />
                            @else
                                <img src="{{ url($entertaimentValue->post->imgloc) }}" class="img-thumbnail p-1"
                                    alt="news-picture">
                            @endif
                        </div>
                        <div class="col-8 text-start overflow-hidden">

                            @if (!empty($entertaimentValue->post->subhead))
                                <span class="p-1 text-danger"><b>
                                        {{ Str::limit($entertaimentValue->post->subhead, 25) }}</b></span>
                            @endif
                            <span
                                class="p-1 text-dark font-bold"><strong>{{ Str::limit($entertaimentValue->post->head, 35) }}</strong></span>

                        </div>
                    </div>
                </div>



            </a>

        </div>

    @empty
    @endforelse
</div>
