@extends('layout.normal.main')
@push('custom-css')
<link href="{{ asset('web/css/captionss.min.css') }}" rel="stylesheet">
<link href="{{ asset('gallery/css/fancyapp.css') }}" rel="stylesheet">
<link href="{{ asset('web/css/newsbox.css') }}" rel="stylesheet">
@endpush
@section('content')

<div class="row">

    <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-12"></div>
    <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-12 text-sm-center">

        <form action="{{ route('home.archive') }}" method="POST" id="postfrom" enctype="multipart/form-data">
            @csrf

            <div class="card-style mb-30 mt-3 text-sm-center">
                <div class="row">
                    <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-12">

                        <div class="input-style-2 mt-4">
                            <input type="text" class="form-control" id="archive" name="date" value="{{ old('date') ?? $postdate}}" required>

                        </div>


                        @if($errors->has('date'))
                        <div class="error text-danger m-2">{{ $errors->first('date') }}</div>
                        @endif


                    </div>

                    <div class="col-xxl-4 col-xl-4 col-md-4 col-sm-12 mt-4 text-center">
                        <button class="main-btn primary-btn rounded-md btn-hover " id="postBtn" type="submit"><i class="mdi mdi-archive-search mdi-24px"></i></button>
                    </div>

                </div>



            </div>
        </form>
    </div>

    <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-12"></div>

</div>

<div class="row">

    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12">
        @forelse ($getPostDetail as $postValue)

        <div class="d-md-none">
            <div class="row ">
                <div class="col-sm-12 mt-2 mb-2 shadow rounded">
                    <a href="{{ route('home.newsWithSlug',[$postValue->id, $postValue->post->slug]) }}" class=" hvr-grow">
                    <div class="card">

                        @if ($postValue->post->hasMedia('postpic'))
                            <img src="{{ $postValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid rounded-start" />
                        @else
                            <img class="card-img-top" src="{{ url($postValue->post->imgloc) }}" alt="Card image cap" class="img-fluid">
                        @endif

                        <div class="card-body">

                        <h5 class="card-title"><b class="text-danger"> {{ Str::limit($postValue->post->subhead,30);  }}</b></h5>
                        <p class="card-text text-dark">{{ Str::limit($postValue->post->head,60);  }}</p>

                        </div>
                    </div>
                    </a>
                </div>


            </div>
        </div>


        <div class="d-none d-md-block">

            <div class="row ">
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 mt-3 mb-2 shadow rounded">
                    <a href="{{ route('home.newsWithSlug',[$postValue->id, $postValue->post->slug]) }}" class=" hvr-grow">
                        <div class="row bg-white">
                        <div class="col-4 text-start">

                            @if ($postValue->post->hasMedia('postpic'))
                                <img src="{{ $postValue->post->getFirstMediaUrl('postpic', 'webp_format') }}" alt="news-picture" class="img-fluid rounded-start" />
                            @else
                                <img src="{{ url($postValue->post->imgloc) }}" class="img-fluid p-1" alt="news-picture">
                            @endif
                         </div>
                         <div class="col-8 text-start overflow-hidden mt-lg-4 mt-xxl-4 mt-xl-4 mt-md-1">

                                 @if(!empty( $postValue->post->subhead))
                                     <h6 class="p-1 mt-1 text-danger"><b> {{ Str::limit($postValue->post->subhead,25);  }}</b></h6>
                                 @endif
                                 <span class="d-none d-md-block d-lg-none p-1 text-dark font-bold">{{ Str::limit($postValue->post->head, 35); }}</span>
                                 <h5 class="d-none d-lg-block p-1 text-dark font-bold">{{ Str::words($postValue->post->head, 13);}}</h5>



                         </div>
                        </div>

                    </a>
                </div>


            </div>

        </div>



        @empty

        @endforelse

        <div class="pagination justify-content-center mt-2 mb-2">
            {{ $getPostDetail->onEachSide(5)->links()}}
        </div>

    </div>

    {{-- <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-3 ">
                <a href="{{ $advertise->firstWhere('add_type','sidebarone')->link }}" target="_blank">
                    <img src="{{ url('/'.$advertise->firstWhere('add_type','sidebarone')->location) }}" class="img-fluid">
                </a>
            </div>
        </div>


        <div class = "mt-4 mb-2">
            <a href="{{ $advertise->firstWhere('add_type','rectangle')->link }}" target="_blank" class=" ">
                <img src="{{ url('/'.$advertise->firstWhere('add_type','rectangle')->location) }}" class="img-fluid  ">
            </a>
          </div>

    </div> --}}

</div>


@endsection
@push('custom-scripts')
<script src="{{ asset('gallery/js/fancyapp.js') }}"></script>
<script src="{{ asset('js/datetimepicker.js') }}"></script>

@endpush
