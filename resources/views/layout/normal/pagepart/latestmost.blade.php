<div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-3 mb-3">
        <div class="row">
            <div class="col-6 d-grid gap-2">
                <h3 class="btn btn-outline-secondary active" id="latest" type="button">সর্বশেষ</h3>
            </div>
            <div class="col-6 d-grid gap-2">
                <h3 class="btn btn-outline-secondary" id="maxread" type="button">জনপ্রিয়</h3>
            </div>
        </div>

    </div>

    <div class="" id="recentupdate">

        @forelse ($getPostDetail['recentUpdate'] as $recentUpdateValue)


        <div class="row shadow rounded mt-3 ">
            {{-- <a href="{{ route('home.postshow',$recentUpdateValue->id) }}" class="hvr-wobble-horizontal bg-white mostRecentNewsBox"> --}}
            <a href="{{ route('home.newsWithSlug',[$recentUpdateValue->id, $recentUpdateValue?->post->slug]) }}" class="hvr-wobble-horizontal bg-white mostRecentNewsBox">

                <div class="row ">

                    <div class="col-4 p-0">
                        @if ($recentUpdateValue->post->hasMedia('postpic'))
                            <img src="{{ $recentUpdateValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid" />
                        @else
                            <img src="{{ url($recentUpdateValue->post->imgloc) }}" class="img-fluid" alt="news-picture" >
                        @endif

                    </div>

                    <div class="col-8 overflow-hidden">
                        @if(!empty( $recentUpdateValue->post->subhead))
                            <small class="text-danger p-1 "><b>{{ Str::limit($recentUpdateValue->post->subhead,25);  }}</b></small>

                        @endif
                        <h6 class="d-none d-md-block p-1 text-dark">{{ Str::limit($recentUpdateValue->post->head, 50); }}</h6>
                        <span class="d-md-none p-1 text-dark font-bold"><strong>{{ Str::limit($recentUpdateValue->post->head, 30); }}</strong></span>
                    </div>

                </div>

            </a>
        </div>
        @empty

        @endforelse


    </div>


    <div class="d-none" id="mostread">

        @forelse ($getPostDetail['mostRead'] as $mostReadValue)


        <div class="row shadow rounded mt-3 ">

            <a href="{{ route('home.newsWithSlug',[$mostReadValue->displayid,$mostReadValue->slug]) }}" class="hvr-wobble-horizontal bg-white mostRecentNewsBox">

                <div class="row">

                    <div class="col-4 p-0">
                        @if ($mostReadValue->hasMedia('postpic'))
                            <img src="{{ $mostReadValue->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid" />
                        @else
                            <img src="{{ url($mostReadValue->imgloc) }}" class="img-fluid" alt="news-picture">
                        @endif

                    </div>

                    <div class="col-8 overflow-hidden">
                        @if(!empty( $mostReadValue->subhead))
                            <small class="text-danger p-1 "><b>{{ Str::limit($mostReadValue->subhead,20);  }}</b></small>

                        @endif
                        <h6 class="d-none d-md-block p-1 text-dark">{{ Str::limit($mostReadValue->head, 50); }}</h6>
                        <span class="d-md-none p-1 text-dark font-bold"><strong>{{ Str::limit($mostReadValue->head, 30); }}</strong></span>
                    </div>

                </div>

            </a>
        </div>
        @empty
        @endforelse


    </div>

</div>
