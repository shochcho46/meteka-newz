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
            <h4 class="mb-25">{{ __('webstring.edit') }} {{ __('webstring.epaper') }}</h4>

            <form action="{{ route('epost.update',$data->id) }}" method="POST" id="updatePost" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="col-12">
                    <div class="select-style-1">
                         <label for="page_number" class="form-label">{{ __('webstring.page') }}</label>
                         <div class="select-position">
                           <select  name="page_number" id="page_number"  required>
                             <option value="">None</option>
                             <option value="1" {{ $data->page_number== 1 ? "selected" : "" }}>Page One</option>
                             <option value="2" {{ $data->page_number== 2 ? "selected" : "" }}>Page Two</option>
                             <option value="3" {{ $data->page_number== 3 ? "selected" : "" }}>Page Three</option>
                             <option value="4" {{ $data->page_number== 4 ? "selected" : "" }}>Page Four</option>
                            
                           </select>
                         </div>
                     </div>
                     @if($errors->has('page_number'))
                        <div class="error text-danger m-2">{{ $errors->first('page_number') }}</div>
                    @endif
                 </div>

                <div class="card-style mb-30">
                    <h6 class="mb-25">{{ __('webstring.epaper_image') }} </h6>
            
                    <div id="editepaperpic">
            
                    </div>
                    
            
                    @if($errors->has('epaperpicupload.*'))
                        <div class="error text-danger m-2">{{ $errors->first('postpicupload.*') }}</div>
                    @endif
            
                <input type="hidden"  id="oldepapertpic"  value="{{ url($data->location) }}"  >
                <input type="hidden"   name="updateepaperpic" value="{{ $data->location }}"  >
            
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







