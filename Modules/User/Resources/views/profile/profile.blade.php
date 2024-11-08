@extends('layout.admin.home')

@push('sub_page_styles')
    <link href="{{ asset('css/selectpicker.css') }}" rel="stylesheet">
@endpush

@section('content')
@include('common.message')
<div class="row">
    <div class="col-sm-12 col-xl-3 col-xxl-3 col-md-6">
        @include('user::profile.password')
    </div>
    <div class="col-sm-12 col-xl-3 col-xxl-3 col-md-6">
        @include('user::profile.login')
    </div>

    <div class="col-sm-12 col-xl-3 col-xxl-3 col-md-6">
        @include('user::profile.pic')
    </div>

    <div class="col-sm-12 col-xl-3 col-xxl-3 col-md-6">
        @include('user::profile.docupic')
    </div>

    <div class="col-sm-12 col-xl-12 col-xxl-12 col-md-12">
        @include('user::profile.personal')
    </div>



</div>



@endsection

@push('sub_page_js')
    <script src="{{ asset('js/myimage.js') }}" ></script>
@endpush

@section('subpagejs')
    <script src="{{ asset('js/custome.js') }}" ></script>
@endsection


