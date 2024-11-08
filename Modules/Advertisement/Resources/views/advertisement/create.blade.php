@extends('layout.admin.home')

@push('sub_page_styles')
<link href="{{ asset('css/selectpicker.css') }}" rel="stylesheet">
@endpush

@section('content')
@include('common.message')
<div class="row">
    <div class="col-xxl-2 col-xl-2 col-md-1 col-sm-1">
    </div>


    <div class="col-xxl-8 col-xl-8 col-md-10 col-sm-10">
        <div class="card-style mb-30">
            <h4 class="mb-25">{{ __('webstring.add') }} {{ __('webstring.advertise') }}</h4>

            <form action="{{ route('advertisement.store') }}" method="POST" id="advertisementfrom" enctype="multipart/form-data">
                @csrf


                <div class="col-12">
                    <div class="select-style-1">
                        <label for="add_type" class="form-label">{{ __('webstring.advertise_type') }}</label>

                        <select name="add_type" id="add_type" class="search_test" required>

                            <option value="">None</option>
                            <option value="popup">Pop Up</option>
                            <option value="hbanner">Head Banner</option>
                            <option value="fbanner">Footer Banner</option>
                            <option value="sidebarone">Sidebar One</option>
                            <option value="sidebartwo">Sidebar Two</option>
                            <option value="rectangle">Rectangle</option>
                        </select>


                    </div>
                    @if($errors->has('add_type'))
                    <div class="error text-danger m-2">{{ $errors->first('add_type') }}</div>
                    @endif
                </div>

                <div class="col-12">
                    <label for="advertisement" class="form-label">{{ __('webstring.image') }}</label>
                    <div id="advertisepic">

                    </div>


                    @if($errors->has('picadvertise.*'))
                    <div class="error text-danger m-2">{{ $errors->first('picadvertise.*') }}</div>
                    @endif
                </div>

                <div class="col-12">
                    <div class="input-style-2">
                        <label for="link" class="form-label">{{ __('webstring.advertise_website_link') }}</label>
                        <input type="text" class="form-control" id="link" name="link" placeholder="{{ __('webstring.advertise_website_link') }}" value="{{ old('link') }}">

                    </div>
                    @if($errors->has('link'))
                    <div class="error text-danger m-2">{{ $errors->first('link') }}</div>
                    @endif
                </div>

                <div class="col-12 mt-4 mb-3">
                    <button class="main-btn primary-btn rounded-md btn-hover" id="advertise" type="submit">{{ __('webstring.save') }}</button>
                </div>


            </form>
        </div>
    </div>


    <div class="col-xxl-2 col-xl-2 col-md-1 col-sm-1">
    </div>


</div>



@endsection

@push('sub_page_js')
<script src="{{ asset('js/myimage.js') }}"></script>
@endpush

@section('subpagejs')
<script src="{{ asset('js/custome.js') }}"></script>
@endsection
