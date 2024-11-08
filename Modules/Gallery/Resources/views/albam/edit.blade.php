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
            <h4 class="mb-25">{{ __('webstring.edit') }} {{ __('webstring.album') }}</h4>

            <form action="{{ route('albam.update',$data->id) }}" method="POST" id="updatealbum" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="col-12">
                    <div class="input-style-2">
                    <label for="name" class="form-label">{{ __('webstring.album_name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('webstring.album_name') }}"  value="{{ old('name') ?? $data->name }}" >
                    
                    </div>
                    @if($errors->has('name'))
                        <div class="error text-danger m-2">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="col-12">
                    <h6 class="mb-25">{{ __('webstring.slider') }}</h6>
                    <div class="ml-5 row ">
                         <div class="col-3 form-check radio-style mb-20 ">
                             <input class="form-check-input" type="radio" name="slider" value="1" {{ $data->slider == 1 ? "checked" : "" }}  required/>
                             <label class="form-check-label" for="radio-1">{{ __('webstring.active') }}</label>
                         </div>
     
                         <div class=" col-3 form-check radio-style mb-20">
                             <input class="form-check-input" type="radio" name="slider" value="0"  {{ $data->slider == 0 ? "checked" : "" }}  />
                             <label class="form-check-label" for="radio-1">{{ __('webstring.disable') }}</label>
                         </div>
     
                     </div>
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

@section('subpagejs')
    <script src="{{ asset('js/custome.js') }}" ></script>
@endsection







