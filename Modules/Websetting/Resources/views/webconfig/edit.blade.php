@extends('layout.admin.home')

@push('sub_page_styles')
    <link href="{{ asset('css/selectpicker.css') }}" rel="stylesheet">
@endpush



@section('content')
@include('common.message')
<div class="row">
    <div class=" col-xl-8 col-xxl-8 col-md-8 col-sm-12 ">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('websetting.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <h3 class="card-title text-center text-capitalize">{{ __('webstring.edit') }} {{ __('webstring.webconfig') }}</h3>
                    <div class="row">

                        <div class="col-6">
                           <label for="logotext" class="form-label">{{ __('webstring.text') }} {{ __('webstring.logo') }}</label>
                            <input type="text" class="form-control" id="logotext" name="logotext" placeholder="{{ __('webstring.text') }} {{ __('webstring.logo') }}" value="{{ old('logotext') ?? $data->logotext }}" required>
                            @if($errors->has('logotext'))
                                    <div class="error text-danger m-2">{{ $errors->first('logotext') }}</div>
                            @endif
                         </div>

                         <div class="col-6">
                            <label for="apptitle" class="form-label">{{ __('webstring.app') }} {{ __('webstring.title') }}</label>
                             <input type="text" class="form-control" id="apptitle" name="apptitle" placeholder="{{ __('webstring.app') }} {{ __('webstring.title') }}" value="{{ old('apptitle') ?? $data->apptitle }}" >
                             @if($errors->has('apptitle'))
                                    <div class="error text-danger m-2">{{ $errors->first('apptitle') }}</div>
                             @endif
                          </div>


                    </div>

                    <div class="row">

                        <div class="col-6">
                            @include('common.country')
                         </div>

                         <div class="col-6">
                            @include('common.timezone')
                          </div>


                    </div>

                    <div class="row">

                        <div class="col-6">
                            @include('common.font')
                         </div>

                         <div class="col-6">
                            @include('common.language')
                          </div>


                    </div>

                    <div class="col-12 mt-4 mb-3">
                        <button class="btn btn-primary btn-sm" type="submit">{{ __('webstring.update') }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class=" col-xl-2 col-xxl-2 col-md-2 col-sm-12">
        <form action="{{ route('websetting.favicon') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card">
            <div class="card-body">
                <div class="text-center" >
                    <h4 class="m-2">{{ __('webstring.favicon') }} {{ __('webstring.upload') }}</h4>
                    <div id="editfaveicone">

                    </div>
                    <h6>70X70 px</h6>
                    @if($errors->has('favupload.*'))
                        <div class="error text-danger m-2">{{ $errors->first('favupload.*') }}</div>
                    @endif
                </div>
                <input type="hidden"  id="editfavioc"  value="{{ url('/'.$data->favicone) }}"  >
                <input type="hidden"   name="upeditfavioc" value="{{ $data->favicone }}"  >
                
                <div class="col-12 mt-4 mb-3">
                    <button class="btn btn-primary btn-sm" type="submit">{{ __('webstring.update') }}</button>
                </div>

            </div>

        </div>
        </form>
    </div>
        

    <div class=" col-xl-2 col-xxl-2 col-md-2 col-sm-12">
        <form action="{{ route('websetting.logo') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card">
            <div class="card-body">
                <div class="text-center" >
                    <h4 class="m-2">{{ __('webstring.logo') }} {{ __('webstring.upload') }}</h4>
                    <div id="editlogoup">

                    </div>

                    <h6>80X150 px</h6>
                    @if($errors->has('logoupload.*'))
                        <div class="error text-danger m-2">{{ $errors->first('logoupload.*') }}</div>
                    @endif
                </div>
                <input type="hidden"  id="editlogo"  value="{{ url('/'.$data->logo) }}"  >
                <input type="hidden"   name="upeditlogo" value="{{ $data->logo}}"  >
                <div class="col-12 mt-4 mb-3">
                    <button class="btn btn-primary btn-sm" type="submit">{{ __('webstring.update') }}</button>
                </div>

            </div>

        </div>
        </form>

    </div>
</div>
@endsection




@push('sub_page_js')
    <script src="{{ asset('js/myimage.js') }}" ></script>
@endpush

@section('subpagejs')
    <script src="{{ asset('js/custome.js') }}" ></script>
@endsection