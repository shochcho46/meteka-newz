
<div class="heading-headline-heading">
    <a href="{{ route('home.mainmenupost',13) }}">আন্তর্জাতিক</a>
    <span class="heading-style-heading"></span>
</div>

    @forelse ( $getPostDetail['international'] as  $internationallValue)


    @if ($loop->first)
    <div class="row mt-3 text-center">
        <div class="col-12">
            <div class="categoryNewBox">
                <a href="{{ route('home.newsWithSlug',[$internationallValue->id, $internationallValue->post->slug]) }}">
                    <figure class="img1 embed xlarge dark ">
                        @if ($internationallValue->post->hasMedia('postpic'))
                            <img src="{{ $internationallValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid" />
                        @else
                            <img src="{{ url( $internationallValue->post->imgloc) }}" class="img-fluid rounded-start" alt="news-picture">
                        @endif

                        <figcaption>
                            <div class="text-white text-start"> {{ Str::limit($internationallValue->post->head, 50); }}</div>

                        </figcaption>
                    </figure>
                </a>
            </div>

        </div>
    </div>
    @else
    <div class="row  mt-2">
        <a href="{{ route('home.newsWithSlug',[$internationallValue->id, $internationallValue->post->slug]) }}" class=" hvr-grow">
           <div class="categorySingleNewsBox rounded">

               <div class=" row shadow rounded bg-white border border-2">

                   <div class="col-4 text-start">

                      @if ($internationallValue->post->hasMedia('postpic'))
                            <img src="{{ $internationallValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid" />
                        @else
                            <img src="{{ url($internationallValue->post->imgloc) }}" class="img-thumbnail p-1" alt="news-picture">
                        @endif
                   </div>
                   <div class="col-8 text-start overflow-hidden">

                           @if(!empty( $internationallValue->post->subhead))
                               <small class="p-2 text-danger"><b> {{ Str::limit($internationallValue->post->subhead,25);  }}</b></small>
                           @endif
                           <h6 class="d-none d-md-block p-1 text-dark">{{ Str::limit($internationallValue->post->head, 50); }}</h6>
                           <span class="d-md-none p-1 text-dark font-bold"><strong>{{ Str::limit($internationallValue->post->head, 30); }}</strong></span>

                   </div>

               </div>
           </div>
       </a>
    </div>

    @endif
    @empty

    @endforelse

    <div class="d-grid gap-2 mt-2">
        <a href="{{ route('home.mainmenupost',13) }}" class="btn btn-danger btn-block radius-30 hvr-wobble-horizontal">
           <p class="">আরও</p>
        </a>
    </div>
