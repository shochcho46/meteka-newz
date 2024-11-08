@extends('layout.normal.main')
@push('custom-css')
<link href="{{ asset('web/css/captionss.min.css') }}" rel="stylesheet">
<link href="{{ asset('gallery/css/fancyapp.css') }}" rel="stylesheet">
<link href="{{ asset('web/css/newsbox.css') }}" rel="stylesheet">
@endpush
@section('content')


<div class="row">

    <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 mt-2">

        <div class="row">


        @forelse ($getAlbumDetail as $imageValue)


        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-6 col-sm-12  mt-2 mb-2 ">
            <div class="">
                <a data-fancybox="gallery" data-caption="{{ $imageValue->caption }}" href="{{ url($imageValue->location)  }}">
                    @if ($imageValue->hasMedia('gallery'))
                        <img src="{{ $imageValue->getFirstMediaUrl('gallery', 'webp_format') }}" alt="news-picture" class="img-fluid rounded-start" />
                    @else
                        <img class="img-fluid img-thumbnail rounded" width="100%"   src="{{ url($imageValue->location)  }}" />
                    @endif
                </a>
            </div>
            <p class="text-start text-dark p-1 m-2">{{ $imageValue->caption }}</p>
        </div>



        @empty

        @endforelse
        </div>


    </div>

    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">

        {{-- <div class="row">
            <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-3 ">
                <a href="{{ $advertise->firstWhere('add_type','sidebarone')->link }}" target="_blank">
                    <img src="{{ url('/'.$advertise->firstWhere('add_type','sidebarone')->location) }}" class="img-fluid">
                </a>
            </div>
        </div>

        <div class="row">
            <div class = "mt-4 mb-2">
                <a href="{{ $advertise->firstWhere('add_type','rectangle')->link }}" target="_blank" class=" ">
                    <img src="{{ url('/'.$advertise->firstWhere('add_type','rectangle')->location) }}" class="img-fluid  ">
                </a>
           </div>
        </div> --}}

        <div class="row">


            @forelse ($albamList as $postValue)


            <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 mt-3 mb-3 text-center">

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


    </div>

</div>


@endsection
@push('custom-scripts')
<script src="{{ asset('gallery/js/fancyapp.js') }}"></script>
<script src="{{ asset('js/datetimepicker.js') }}"></script>

@endpush
