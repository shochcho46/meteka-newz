@extends('layout.normal.main')
@push('custom-css')
<link href="{{ asset('web/css/captionss.min.css') }}" rel="stylesheet">
<link href="{{ asset('gallery/css/fancyapp.css') }}" rel="stylesheet">
<link href="{{ asset('web/css/newsbox.css') }}" rel="stylesheet">
@endpush
@section('content')

<div class="row">

    <div class="col-12 mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="#" class="text-danger"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $mainMenu}}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ $displyName}}</li>
            </ol>
        </nav>
    </div>
</div>




<div class="row">

  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">

    <div class="row">

      <div class="col-sm-12 col-xs-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8">
          <div class="menuPostDetail mt-3">
              <a href="{{ route('home.newsWithSlug',[$getPostDetail['firstrow'][0]->id, $getPostDetail['firstrow'][0]->post->slug]) }}">
                @if (!empty($getPostDetail['firstrow'][0]))
                  <figure class="img1 embed xlarge dark">

                    @if ($getPostDetail['firstrow'][0]->post->hasMedia('postpic'))
                        <img src="{{ $getPostDetail['firstrow'][0]->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid rounded-start" />
                    @else
                        <img src="{{ url( $getPostDetail['firstrow'][0]->post->imgloc) }}" class="img-fluid rounded-start" alt="news-picture">
                    @endif

                      <figcaption>
                          <div class="d-none d-md-block p-1 text-white">{{ Str::limit($getPostDetail['firstrow'][0]->post->head, 70); }}</div>
                          <span class="d-md-none  text-white  font-semibold">{{ Str::limit($getPostDetail['firstrow'][0]->post->head, 40); }}</span>

                      </figcaption>
                  </figure>
                  @endif
              </a>
          </div>

      </div>



      <div class="col-sm-12 col-xs-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
        <div class="row mt-3">
            <div class="col-12 col-sm-12 col-xs-12 col-md-6 col-lg-12 col-xl-12 col-xxl-12 mb-2">
                <div class="menusidePostDetail">
                    <a href="{{ route('home.newsWithSlug',[$getPostDetail['firstrow'][1]->id, $getPostDetail['firstrow'][1]->post->slug]) }}">
                      @if (!empty($getPostDetail['firstrow'][1]))
                        <figure class="img1 embed xlarge dark">

                            @if ($getPostDetail['firstrow'][1]->post->hasMedia('postpic'))
                                <img src="{{ $getPostDetail['firstrow'][1]->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid rounded-start" />
                            @else
                                <img src="{{ url( $getPostDetail['firstrow'][1]->post->imgloc) }}" class="img-fluid rounded-start" alt="news-picture">
                            @endif
                            <figcaption>
                              <div class="d-none d-md-block p-1 text-white">{{ Str::limit($getPostDetail['firstrow'][1]->post->head, 30); }}</div>
                                <span class="d-md-none  text-white  font-semibold">{{ Str::limit($getPostDetail['firstrow'][1]->post->head, 40); }}</span>

                            </figcaption>
                        </figure>
                        @endif
                    </a>
                  </div>
            </div>

            <div class="col-12 col-sm-6 col-xs-12 col-md-6 col-lg-12 col-xl-12 col-xxl-12 ">
                <div class="menusidePostDetail">
                    <a href="{{ route('home.newsWithSlug',[$getPostDetail['firstrow'][2]->id, $getPostDetail['firstrow'][2]->post->slug]) }}">
                      @if (!empty($getPostDetail['firstrow'][2]))
                        <figure class="img1 embed xlarge dark">
                            @if ($getPostDetail['firstrow'][2]->post->hasMedia('postpic'))
                                <img src="{{ $getPostDetail['firstrow'][2]->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid rounded-start" />
                            @else
                                <img src="{{ url( $getPostDetail['firstrow'][2]->post->imgloc) }}" class="img-fluid rounded-start" alt="news-picture">
                            @endif

                            <figcaption>
                              <div class="d-none d-md-block p-1 text-white">{{ Str::limit($getPostDetail['firstrow'][2]->post->head, 30); }}</div>
                                <span class="d-md-none  text-white  font-semibold">{{ Str::limit($getPostDetail['firstrow'][2]->post->head, 40); }}</span>

                            </figcaption>
                        </figure>
                        @endif
                    </a>
                  </div>
            </div>

        </div>

      </div>



    </div>

    <div class="row">
        @forelse ( $getPostDetail['secondrow'] as $secondrowValue)
        <div class="col-6 col-xl-4 col-xxl-4 col-lg-4 col-md-4 col-sm-6  mt-2 mb-2 text-dark">
            <a class="hvr-bounce-out" href="{{ route('home.newsWithSlug',[$secondrowValue->id, $secondrowValue->post->slug]) }}">
                <div class=" threeColbox shadow rounded text-center">

                    <div class="p-1">
                        @if ( $secondrowValue->post->hasMedia('postpic'))
                        <img src="{{  $secondrowValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="p-1 img-fluid " />
                        @else
                            <img src="{{ url( $secondrowValue->post->imgloc) }}" class="p-1 img-fluid " alt="news-picture">
                        @endif
                    </div>
                    <div class="p-1 text-start">
                        @if(!empty( $secondrowValue->post->subhead))
                        <small class="d-md-none p-1 text-danger text-start"><b> {{ Str::limit($secondrowValue->post->subhead,20);  }}</b></small>
                        <small class="d-none d-md-block p-1 text-danger text-start"><b> {{ Str::limit($secondrowValue->post->subhead,40);  }}</b></small>
                        @endif
                        <div class="d-md-none p-1 text-dark text-start"><strong> {{ Str::limit($secondrowValue->post->head,25, '...'); }}</strong></div>
                        <div class="d-none d-md-block p-1 text-dark text-start"> <strong>{{ Str::limit($secondrowValue->post->head, 30, '...'); }}</strong></div>
                    </div>

                </div>
            </a>

        </div>

    @empty

    @endforelse

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-3 mb-3"  style="width: auto; height:150px">
                {{-- <a href="{{ $advertise->firstWhere('add_type','fbanner')->link }}" target="_blank">
                    <img src="{{ url('/'.$advertise->firstWhere('add_type','fbanner')->location) }}" class="img-fluid" alt="news-picture">
                </a> --}}
            </div>
        </div>


    </div>

  </div>



  <div class="col-sm-12 col-xs-12 col-md-12 col-lg-4 col-xl-4 col-xxl-4">
    <div class="row">
        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-3 mb-3" style="width: auto; height:350px">
            {{-- <a href="{{ $advertise->firstWhere('add_type','sidebarone')->link }}" target="_blank">
                <img src="{{ url('/'.$advertise->firstWhere('add_type','sidebarone')->location) }}" class="img-fluid" alt="news-picture">
            </a> --}}
        </div>
    </div>

    @include('layout.normal.pagepart.latestmost')



</div>



</div>


<div class="row" id="post-data">
    @include('layout.normal.pagepart.loadmore')
</div>

<div class="row ">





    <input type="hidden" value="{{ url()->current() }}" id="weburl">


    <div class="ajax-load text-center" style="display:none">
        <p><img src="{{ asset('asset/load.gif') }}" width="50"></p>
    </div>

    <div class="text-center mt-3 mb-3"  id="loadmore">
        <span class="btn btn-outline-primary">Load More </span>
    </div>

</div>


@endsection


@push('custom-scripts')
<script src="{{ asset('js/ajax.js') }}" ></script>
@endpush
