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

            <form action="{{ route('gallery.update',$data->id) }}" method="POST" id="updategallery" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="col-12">
                    <div class="select-style-1">
                         <label for="albam_id" class="form-label">{{ __('webstring.album') }}</label>

                            <select name="albam_id" id="albam_id" class="search_test" required>

                             <option value="">None</option>
                             @foreach ( $albumList as $albumValue )
                                <option value="{{ $albumValue->id }}" {{ ($albumValue->id == $data->albam_id) ? 'selected' : '' }}>{{ $albumValue->name }}</option>
                             @endforeach

                           </select>


                     </div>
                     @if($errors->has('albam_id'))
                        <div class="error text-danger m-2">{{ $errors->first('albam_id') }}</div>
                    @endif
                 </div>

                <div class="card-style mb-30">
                    <h6 class="mb-25">{{ __('webstring.caption') }} </h6>

                    <div id="editgalleypic">

                    </div>


                    @if($errors->has('gallerypicupload'))
                        <div class="error text-danger m-2">{{ $errors->first('gallerypicupload') }}</div>
                    @endif


                <input type="hidden"  id="oldgallerypic"  value="{{ $data->getFirstMediaUrl('gallery', 'webp_format') }}" >
                <input type="hidden"   name="updategallerypic" value="{{ $data->getFirstMediaUrl('gallery', 'webp_format') }}" >

                </div>

                <div class="col-12">
                    <div class="input-style-2">
                    <label for="caption" class="form-label">{{ __('webstring.caption') }}</label>
                    <input type="text" class="form-control" id="caption" name="caption"   value="{{ old('caption') ?? $data->caption }}" >

                    </div>
                    @if($errors->has('caption'))
                        <div class="error text-danger m-2">{{ $errors->first('caption') }}</div>
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







