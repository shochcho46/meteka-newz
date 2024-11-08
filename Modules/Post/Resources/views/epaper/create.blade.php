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
            <h4 class="mb-25">{{ __('webstring.add') }} {{ __('webstring.epaper') }}</h4>

            <form action="{{ route('epost.store') }}" method="POST" id="postfrom" enctype="multipart/form-data">
                @csrf


                <div class="col-12">
                    <div class="select-style-1">
                         <label for="page_number" class="form-label">{{ __('webstring.page') }}</label>
                         <div class="select-position">
                           <select  name="page_number" id="page_number"  required>
                             {{--  <option value="1" {{ $data->udtail->blood== "A+" ? "selected" : "" }}> A+</option>  --}}
                             <option value="">None</option>
                             <option value="1">Page One</option>
                             <option value="2">Page Two</option>
                             <option value="3">Page Three</option>
                             <option value="4">Page Four</option>
                            
                           </select>
                         </div>
                     </div>
                     @if($errors->has('page_number'))
                        <div class="error text-danger m-2">{{ $errors->first('page_number') }}</div>
                    @endif
                 </div>

                <div class="col-12">
                    <label for="epaper" class="form-label">{{ __('webstring.epaper_image') }}</label>
                    <div id="epaperpic">

                    </div>
                    
            
                    @if($errors->has('epaper.*'))
                        <div class="error text-danger m-2">{{ $errors->first('epaper.*') }}</div>
                    @endif
                </div>


                 <div class="col-12 mt-4 mb-3">
                    <button class="main-btn primary-btn rounded-md btn-hover" id="epaper" type="submit">{{ __('webstring.save') }}</button>
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







