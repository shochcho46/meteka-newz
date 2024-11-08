
<div class="heading-headline-heading">
    <a href="{{ route('home.mainmenupost',10) }}">সারাদেশ</a>
    <span class="heading-style-heading"></span>
</div>

    @forelse ( $getPostDetail['allcountry'] as  $allcountryValue)


    @if ($loop->first)
    <div class="row mt-3 text-center">
        <div class="col-12">
            <div class="categoryNewBox">
                <a href="{{ route('home.newsWithSlug',[$allcountryValue->id, $allcountryValue->post->slug]) }}" class="">
                    <figure class="img1 embed xlarge dark">

                        @if ($allcountryValue->post->hasMedia('postpic'))
                            <img src="{{ $allcountryValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid" />
                        @else
                            <img src="{{ url( $allcountryValue->post->imgloc) }}" class="img-fluid rounded-start" alt="news-picture">
                        @endif
                        <figcaption>
                            <div class="text-white text-start">{{ Str::limit($allcountryValue->post->head, 50); }}</div>
                        </figcaption>
                    </figure>
                </a>
            </div>

        </div>
    </div>
    @else

<div class="row  mt-2">
    <a href="{{ route('home.newsWithSlug',[$allcountryValue->id, $allcountryValue->post->slug]) }}" class=" hvr-grow">
       <div class="categorySingleNewsBox rounded">

           <div class=" row shadow rounded bg-white border border-2">

               <div class="col-4 text-start">

                  @if ($allcountryValue->post->hasMedia('postpic'))
                        <img src="{{ $allcountryValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid" />
                    @else
                        <img src="{{ url($allcountryValue->post->imgloc) }}" class="img-thumbnail p-1" alt="news-picture">
                    @endif
               </div>
               <div class="col-8 text-start overflow-hidden">

                       @if(!empty( $allcountryValue->post->subhead))
                           <small class="p-2 text-danger"><b> {{ Str::limit($allcountryValue->post->subhead,25);  }}</b></small>
                       @endif
                       <h6 class="d-none d-md-block p-1 text-dark">{{ Str::limit($allcountryValue->post->head, 50); }}</h6>
                       <span class="d-md-none p-1 text-dark font-bold"><strong>{{ Str::limit($allcountryValue->post->head, 30); }}</strong></span>

               </div>

           </div>
       </div>
   </a>
</div>

    @endif
    @empty

    @endforelse

    <div class="d-grid gap-2 mt-2">
        <a href="{{ route('home.mainmenupost',10) }}" class="btn btn-danger btn-block radius-30 hvr-wobble-horizontal">
           <p class="">আরও</p>
        </a>
    </div>
