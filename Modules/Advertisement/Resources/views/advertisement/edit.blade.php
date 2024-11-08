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
            <h4 class="mb-25">{{ __('webstring.edit') }} {{ __('webstring.advertise') }}</h4>

            <form action="{{ route('advertisement.update',$data->id) }}" method="POST" id="updateAdvertise" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="col-12">
                    <div class="select-style-1">
                        <label for="add_type" class="form-label">{{ __('webstring.advertise_type') }}</label>

                        <select name="add_type" id="add_type" class="search_test" required>

                            <option value="">None</option>
                            <option value="popup" {{ $data->add_type == "popup" ? "selected" : "" }}>Pop Up</option>
                            <option value="hbanner" {{ $data->add_type == "hbanner" ? "selected" : "" }}>Head Banner</option>
                            <option value="fbanner" {{ $data->add_type == "fbanner" ? "selected" : "" }}>Footer Banner</option>
                            <option value="sidebarone" {{ $data->add_type == "sidebarone" ? "selected" : "" }}>Sidebar One</option>
                            <option value="sidebartwo" {{ $data->add_type == "sidebartwo" ? "selected" : "" }}>Sidebar Two</option>
                            <option value="rectangle" {{ $data->add_type == "rectangle" ? "selected" : "" }}>Rectangle</option>
                        </select>


                    </div>
                    @if($errors->has('add_type'))
                    <div class="error text-danger m-2">{{ $errors->first('add_type') }}</div>
                    @endif
                </div>

                <div class="card-style mb-30">
                    <h6 class="mb-25">{{ __('webstring.caption') }} </h6>
            
                    <div id="editadvertisepic">
            
                    </div>
                    
            
                    @if($errors->has('advertisepicupload.*'))
                        <div class="error text-danger m-2">{{ $errors->first('advertisepicupload.*') }}</div>
                    @endif
            
                <input type="hidden"  id="oldadvertisepic"  value="{{ url($data->location) }}"  >
                <input type="hidden"   name="updateadvertisepic" value="{{ $data->location }}"  >
            
                </div>


                <div class="col-12">
                    <div class="input-style-2">
                        <label for="link" class="form-label">{{ __('webstring.advertise_website_link') }}</label>
                        <input type="text" class="form-control" id="link" name="link"  value="{{ old('link') ?? $data->link }}">

                    </div>
                    @if($errors->has('link'))
                    <div class="error text-danger m-2">{{ $errors->first('link') }}</div>
                    @endif
                </div>


                 <div class="col-12 mt-4 mb-3">
                    <button class="main-btn primary-btn rounded-md btn-hover" id="epaper" type="submit">{{ __('webstring.update') }}</button>
                </div>
           

            </form>
        </div>
    </div>


    <div class="col-xxl-2 col-xl-2 col-md-1 col-sm-1">
    </div>
   
    
</div>



@endsection

@push('sub_page_js')
    <script src="{{ asset('js/myimage.js') }}" ></script>
@endpush

@section('subpagejs')
    <script src="{{ asset('js/custome.js') }}" ></script>
@endsection







