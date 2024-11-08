<div class="row d-none d-lg-block">
    @include('layout.normal.pagepart.scroll')
</div>

<div class="col-sm-12 col-xs-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
    <div class="row">


        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mt-3 text-center">
            <div class="headNewsBox">
                <a href="{{ route('home.newsWithSlug',[$getPostDetail['newshead']->id, $getPostDetail['newshead']->post->slug]) }}">
                    <figure class="img1 embed xlarge dark">
                        @if ($getPostDetail['newshead']->post->hasMedia('postpic'))
                            <img src="{{ $getPostDetail['newshead']->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-thumbnail" width="100" />
                        @else
                            <img src="{{ url( $getPostDetail['newshead']->post->imgloc) }}" class="img-thumbnail rounded-start" alt="news-picture">
                        @endif

                        <figcaption>
                            <div class="d-none d-md-block p-1 text-white">{{ $getPostDetail['newshead']->post->head }}</div>
                            <span class="d-md-none  text-white  font-semibold">{{ Str::limit($getPostDetail['newshead']->post->head, 40); }}</span>

                        </figcaption>
                    </figure>
                </a>
            </div>
        </div>


    </div>

    <div class="row mt-2">
        @forelse( $getPostDetail['hedaSection'] as $secleadval )

        <div class="col-sm-12 col-xs-12 col-md-6 col-lg-6 col-xl-6 col-xxl-6 overflow-hidden">

                <a href="{{ route('home.newsWithSlug',[$secleadval->id, $secleadval?->post->slug]) }}">


                <div class="card leadNewsBox  shadow p-3 bg-white rounded">
                        @if ($secleadval->post->hasMedia('postpic'))
                            <img src="{{ $secleadval->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid" />
                        @else
                            <img src="{{ url( $secleadval->post->imgloc) }}" class="img-fluid rounded-start" alt="news-picture">
                        @endif

                    <div class="card-body">
                        @if(!empty($secleadval->post->subhead))
                            <small class="p-1 d-none d-md-block text-danger"><b>{{  Str::limit($secleadval->post->subhead,25);  }}</b></small>
                            <small class="p-1 d-md-none text-danger"><b>{{  Str::limit($secleadval->post->subhead,15);  }}</b></small>
                        @endif

                        <h6 class="d-none d-md-block p-1 text-dark font-bold">{{ Str::limit($secleadval->post->head, 40); }}</h6>
                        <h6 class="d-md-none p-1 text-dark font-bold">{{ Str::limit($secleadval->post->head, 25); }}</h6>

                    </div>
                </div>
            </a>

        </div>
        @empty

        @endforelse
    </div>

</div>

<div class="col-sm-12 col-xs-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-3 mb-3" style="width: auto; height:350px">
            {{-- <a href="{{ $advertise->firstWhere('add_type','sidebarone')->link }}" target="_blank">
                <img src="{{ url('/'.$advertise->firstWhere('add_type','sidebarone')->location) }}" class="img-fluid" alt="amader-protidin">
            </a> --}}
        </div>
    </div>

    @include('layout.normal.pagepart.latestmost')



</div>
