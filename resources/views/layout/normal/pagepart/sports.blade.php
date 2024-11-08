<h3 class="border-bottom border-danger  p-2">
    <a href="{{ route('home.mainmenupost',14) }}" class="bg-success text-white  p-2"> খেলা </a>
</h3>

<div class="row">


    <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6 col-sm-12  mt-4 mb-2 text-dark">
        <div class="row">
             @forelse ( $getPostDetail['headsports'] as $headsportsValue)
                <a href="{{ route('home.newsWithSlug',[$headsportsValue->id, $headsportsValue->post->slug]) }}" class="hvr-shadow">
                     <div class="sportsMainBox shadow rounded">
                         <div class="m-1  p-1 ">

                            @if ($headsportsValue->post->hasMedia('postpic'))
                                <img src="{{ $headsportsValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid rounded-start" />
                            @else
                                <img src="{{ url( $headsportsValue->post->imgloc) }}" class="img-fluid rounded-start" alt="news-picture">
                            @endif
                        </div>

                         <div class="p-1 m-1">
                             @if(!empty( $headsportsValue->post->subhead))
                            <small class="d-md-none p-2 text-danger text-start"><b> {{ Str::limit($headsportsValue->post->subhead,30);  }}</b></small>
                            <small class="d-none d-md-block p-2 text-danger text-start"><b> {{ Str::limit($headsportsValue->post->subhead);  }}</b></small>
                            @endif

                            <h6 class="d-md-none p-1 text-dark"> {{ Str::limit($headsportsValue->post->head, 69, '...'); }}</h6>
                            <h4 class="d-none d-md-block p-1 text-dark"> {{ Str::limit($headsportsValue->post->head, 70, '...'); }}</h4>

                          <div class="d-md-none p-1 text-dark"> {!! Str::limit(htmlspecialchars(trim(strip_tags($headsportsValue->post->detail))), 150, '...'); !!}</div>
                          <div class="d-none d-md-block p-2 text-dark"> {!! Str::limit(htmlspecialchars(trim(strip_tags($headsportsValue->post->detail))), 250, '...'); !!}</div>
                         </div>
                    </div>
                </a>
              @empty

            @endforelse
        </div>

    </div>

    <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6 col-sm-12  mt-4  text-dark">


        <div class="row">

            @forelse ( $getPostDetail['subheadsports'] as $subheadsportsValue)
            <div class="col-6 mt-2 mb-2">
                <a class="hvr-bounce-out" href="{{ route('home.newsWithSlug',[$subheadsportsValue->id, $subheadsportsValue->post->slug]) }}">
                    <div class="sportsSubBox shadow rounded text-center">

                        <div class="p-1">

                            @if ($subheadsportsValue->post->hasMedia('postpic'))
                                <img src="{{ $subheadsportsValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="p-1  img-fluid rounded-start" />
                            @else
                                <img src="{{ url( $subheadsportsValue->post->imgloc) }}" class=" p-1  img-fluid rounded-start" alt="news-picture">
                            @endif
                        </div>

                        <div class="p-1 text-start">
                            @if(!empty( $subheadsportsValue->post->subhead))
                            <small class="d-md-none p-1 text-danger text-start"><b> {{ Str::limit($subheadsportsValue->post->subhead,20);  }}</b></small>
                            <small class="d-none d-md-block p-1 text-danger text-start"><b> {{ Str::limit($subheadsportsValue->post->subhead,40);  }}</b></small>
                            @endif
                            <div class="d-md-none p-1 text-dark text-start"> <strong>{{ Str::limit($subheadsportsValue->post->head,25, '...'); }}</strong></div>
                            <div class="d-none d-md-block p-1 text-dark text-start"><strong> {{ Str::limit($subheadsportsValue->post->head, 30, '...'); }}</strong></div>
                        </div>

                    </div>
                </a>

            </div>

            @empty

            @endforelse

        </div>



    </div>
</div>

<div class="row">



    @forelse ( $getPostDetail['sidesports'] as $sidesportsValue)
    <div class="col-6 col-xl-3 col-xxl-3 col-lg-3 col-md-3 col-sm-6  mt-2 mb-2 text-dark">
        <a class="hvr-bounce-out" href="{{ route('home.newsWithSlug',[$sidesportsValue->id, $sidesportsValue->post->slug]) }}">
            <div class=" sportsSubBox shadow rounded text-center">

                <div class="p-1">

                    @if ($sidesportsValue->post->hasMedia('postpic'))
                        <img src="{{ $sidesportsValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="p-1 img-fluid" />
                    @else
                        <img src="{{ url( $sidesportsValue->post->imgloc) }}" class="p-1 img-fluid " alt="news-picture">
                    @endif
                </div>
                <div class="p-1 text-start">
                    @if(!empty( $sidesportsValue->post->subhead))
                    <small class="d-md-none p-1 text-danger text-start"><b> {{ Str::limit($sidesportsValue->post->subhead,20);  }}</b></small>
                    <small class="d-none d-md-block p-1 text-danger text-start"><b> {{ Str::limit($sidesportsValue->post->subhead,40);  }}</b></small>
                    @endif
                    <div class="d-md-none p-1 text-dark text-start"> <strong>{{ Str::limit($sidesportsValue->post->head,25, '...'); }}</strong></div>
                    <div class="d-none d-md-block p-1 text-dark text-start"> <strong>{{ Str::limit($sidesportsValue->post->head, 30, '...'); }}</strong></div>
                </div>

            </div>
        </a>

    </div>

    @empty

    @endforelse
</div>
