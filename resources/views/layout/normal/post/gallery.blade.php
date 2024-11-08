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

        <form action="{{ route('home.albumlist') }}" method="POST" id="postfrom" enctype="multipart/form-data">
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

        <div class="row">


        @forelse ($getAlbumDetail as $postValue)


        <div class="col-xl-6 col-xxl-6 col-lg-6 col-md-6 col-sm-12 mt-3 mb-3 text-center">

            <div class="galaryBox">
            <a href="{{ route('home.imagedisplay',$postValue->id) }}" class="hvr-grow">
            <div class="overlayGallery">

                    <figure class="img1 embed xlarge dark">


                        @if ($postValue->galleries[0]->hasMedia('gallery'))
                            <img src="{{ $postValue->galleries[0]->getFirstMediaUrl('gallery', 'webp_format') }}" alt="news-picture" class="img-fluid rounded-start" />
                        @else
                            <img src="{{ url($postValue->galleries[0]->location)}}" class="galaryBox rounded-start" >
                        @endif

                        <figcaption>
                            <div class=" text-white text-center">{{$postValue->name  }}</div>

                        </figcaption>
                    </figure>

            </div>
            </a>
            </div>

        </div>



        @empty

        @endforelse
        </div>
        <div class="pagination justify-content-center mt-2 mb-2">
            {{ $getAlbumDetail->onEachSide(5)->links()}}
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
