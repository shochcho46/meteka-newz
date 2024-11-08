@extends('layout.normal.main')
@push('custom-css')
<link href="{{ asset('web/css/captionss.min.css') }}" rel="stylesheet">
<link href="{{ asset('gallery/css/fancyapp.css') }}" rel="stylesheet">
<link href="{{ asset('web/css/newsbox.css') }}" rel="stylesheet">
<link href="{{ asset('textscroll/css/marquee.css') }}" rel="stylesheet">
{{--  <link href="{{ asset('textscroll/css/example.css') }}" rel="stylesheet">  --}}
@endpush
@section('content')

<div class="row mt-3">
    @include('layout.normal.pagepart.headlinblock')
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-4 mb-4"  style="width: auto; height:150px">
        {{-- <a href="{{ $advertise->firstWhere('add_type','hbanner')->link }}" target="_blank">
            <img src="{{ url('/'.$advertise->firstWhere('add_type','hbanner')->location) }}" class="img-fluid" alt="amader protidin">
        </a> --}}
    </div>
</div>




<div class="row">

    @if($mainMenuStatus['national'])
    <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12  mt-3 mb-3">
        @include('layout.normal.pagepart.national')
    </div>
    @endif

    @if($mainMenuStatus['politics'])
    <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12  mt-3 mb-3">
        @include('layout.normal.pagepart.politics')
    </div>
    @endif

    @if($mainMenuStatus['international'])
    <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12  mt-3 mb-3">
        @include('layout.normal.pagepart.international')
    </div>
    @endif


    @if($mainMenuStatus['allcountry'])
    <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12  mt-3 mb-3">
        @include('layout.normal.pagepart.allcountry')
    </div>
    @endif

    @if($mainMenuStatus['economy'])
    <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12  mt-3 mb-3">
        @include('layout.normal.pagepart.economy')
    </div>
    @endif

    @if($mainMenuStatus['other'])
    <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12  mt-3 mb-3">
        @include('layout.normal.pagepart.other')
    </div>
    @endif

</div>

{{--  <div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-4 mb-4">
        <a href="{{ $advertise->firstWhere('add_type','hbanner')->link }}" target="_blank">
            <img src="{{ url('/'.$advertise->firstWhere('add_type','hbanner')->location) }}" class="img-fluid">
        </a>
    </div>
</div>  --}}
<div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-4 mb-4 googleAdd">

    </div>
</div>


<div class="row">


    @if($mainMenuStatus['sports'])
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12  mt-4 mb-4">
        @include('layout.normal.pagepart.sports')
    </div>
    @endif


</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-4 mb-4 googleAdd">

    </div>
</div>

<div class="row mb-3">

    <div class="col-xl-9 col-xxl-9 col-lg-9 col-md-9 col-sm-12  mt-4 mb-4">

        @if($mainMenuStatus['entertainment'])
          @include('layout.normal.pagepart.entertaiment')
        @endif
    </div>
    <div class="col-xl-3 col-xxl-3 col-lg-3 col-md-3 col-sm-12 ">
      <div class = "rectaboxadd mb-2">

        {{-- <a href="{{ $advertise->firstWhere('add_type','rectangle')->link }}" target="_blank" class=" mt-xxl-5 mt-xl-5 mt-lg-5">
            <img src="{{ url('/'.$advertise->firstWhere('add_type','rectangle')->location) }}" class="img-fluid mt-xxl-5 mt-xl-5 mt-lg-5" alt="amader protidin">
        </a> --}}
      </div>


    </div>



</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-4 mb-4 googleAdd">

    </div>
</div>

<div class="row mb-3">

  <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12  mt-4 mb-4">

      @if($subMenuStatus['campus'])
        @include('layout.normal.pagepart.campus')
      @endif
  </div>
</div>

<div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-4 mb-4 googleAdd">

    </div>
</div>



<div class="row mb-3">

    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12  mt-4 mb-4">

        @if($mainMenuStatus['lifestyle'])
          @include('layout.normal.pagepart.lifestyle')
        @endif
    </div>
</div>


  {{-- <div class="row mb-3">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12  mt-4 mb-4">
        @include('layout.normal.pagepart.todaypaper')
    </div>
  </div> --}}

  <div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-4 mb-4 googleAdd">

    </div>
</div>

<div class="row">

<div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12  mt-3 mb-3">
    @if($subMenuStatus['job'])
        @include('layout.normal.pagepart.job')
    @endif
</div>

<div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12  mt-3 mb-3">
    @if($subMenuStatus['science'])
        @include('layout.normal.pagepart.science')
    @endif
</div>

<div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12  mt-3 mb-3">
    @if($subMenuStatus['religion'])
        @include('layout.normal.pagepart.religion')
    @endif
</div>


</div>


<div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12 text-center mt-4 mb-4 googleAdd">

    </div>
</div>

<div class="row mb-3">
    @if(!empty($imageGallery))
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12  mt-4 mb-4">
        @include('layout.normal.pagepart.slider')
    </div>
    @endif
  </div>





@endsection
@push('custom-scripts')
<script src="{{ asset('gallery/js/fancyapp.js') }}" ></script>
<script type="text/javascript" src="{{ asset('textscroll/js/marquee.js') }}"></script>
<script>
    $(function (){
        $('.simple-marquee-container').SimpleMarquee();
    });
</script>
@endpush
