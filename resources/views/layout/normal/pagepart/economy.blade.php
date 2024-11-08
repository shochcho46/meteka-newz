
<div class="heading-headline-heading">
    <a href="{{ route('home.mainmenupost',12) }}"> অর্থনীতি </a>
    <span class="heading-style-heading"></span>
</div>
    @forelse ( $getPostDetail['economy'] as  $economyValue)


    @if ($loop->first)
    <div class="row mt-3 text-center">
        <div class="col-12">
            <div class="categoryNewBox">
                <a href="{{ route('home.newsWithSlug',[$economyValue->id, $economyValue->post->slug]) }}">
                    <figure class="img1 embed xlarge dark">

                        @if ($economyValue->post->hasMedia('postpic'))
                            <img src="{{ $economyValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid" />
                        @else
                            <img src="{{ url( $economyValue->post->imgloc) }}" class="img-fluid rounded-start" alt="news-picture">
                        @endif
                        <figcaption>
                            <div class="text-white text-start">{{ Str::limit($economyValue->post->head, 50); }}</div>

                        </figcaption>
                    </figure>
                </a>
            </div>

        </div>
    </div>
    @else
    <div class="row  mt-2">
        <a href="{{ route('home.postshow',[$economyValue->id, $economyValue->post->slug]) }}" class=" hvr-grow">
           <div class="categorySingleNewsBox rounded">

               <div class=" row shadow rounded bg-white border border-2">

                   <div class="col-4 text-start">

                      @if ($economyValue->post->hasMedia('postpic'))
                            <img src="{{ $economyValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid" />
                        @else
                            <img src="{{ url($economyValue->post->imgloc) }}" class="img-thumbnail p-1" alt="news-picture">
                        @endif

                   </div>
                   <div class="col-8 text-start overflow-hidden">

                           @if(!empty( $economyValue->post->subhead))
                               <small class="p-2 text-danger"><b> {{ Str::limit($economyValue->post->subhead,25);  }}</b></small>
                           @endif
                           <h6 class="d-none d-md-block p-1 text-dark">{{ Str::limit($economyValue->post->head, 50); }}</h6>
                           <span class="d-md-none p-1 text-dark font-bold"><strong>{{ Str::limit($economyValue->post->head, 30); }}</strong></span>

                   </div>

               </div>
           </div>
       </a>
    </div>

    @endif
    @empty

    @endforelse

    <div class="d-grid gap-2 mt-2">
        <a href="{{ route('home.mainmenupost',12) }}" class="btn btn-danger btn-block radius-30 hvr-wobble-horizontal">
           <p class="">আরও</p>
        </a>
    </div>
