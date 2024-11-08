@extends('layout.admin.home')

@section('content')

@include('common.message')


    <div class="row">
        <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-1"></div>
        <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-10">
        
            <form action="{{ route('facebook.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-style mb-30">
                    <h4 class="mb-25">{{ __('webstring.edit') }} {{ __('webstring.fb_setting') }}</h4>

                    <div class="row">

                        <div class="col-12">
                            <div class="input-style-2">
                                <label for="appid" class="form-label">{{ __('webstring.facebook_app_id') }} </label>
                                <input type="number" class="form-control" id="appid" name="appid" placeholder="1xxxxxxxxxx" value="{{ old('appid') ?? $data->appid}}" required>
                                    <span class="icon"> <i class="mdi mdi-numeric"></i> </span>
                            </div>
                            @if($errors->has('appid'))
                                <div class="error text-danger m-2">{{ $errors->first('appid') }}</div>
                            @endif
                        </div>

                       
                        <div class="col-12">
                            <div class="input-style-2">
                                <label for="app_secrete_kye" class="form-label">{{ __('webstring.facebook_app_secrete_key') }}</label>
                                <input type="text" class="form-control" id="app_secrete_kye" name="app_secrete_kye" placeholder="{{ __('webstring.facebook_app_secrete_key') }}" value="{{ old('app_secrete_kye') ?? $data->app_secrete_kye }}" >
                                <span class="icon"> <i class="mdi mdi-folder-key"></i> </span>
                            </div>
                             @if($errors->has('app_secrete_kye'))
                                    <div class="error text-danger m-2">{{ $errors->first('app_secrete_kye') }}</div>
                             @endif
                         </div>

                         


                         <div class="col-12">
                            <div class="input-style-2">
                                <label for="pageid" class="form-label">{{ __('webstring.fb_page_id') }}</label>
                                <input type="text" class="form-control" id="pageid" name="pageid" placeholder="{{ __('webstring.fb_page_id') }}" value="{{ old('pageid') ?? $data->pageid }}" >
                                <span class="icon"> <i class="mdi mdi-numeric"></i> </span>
                            </div>
                             @if($errors->has('pageid'))
                                    <div class="error text-danger m-2">{{ $errors->first('pageid') }}</div>
                             @endif
                         </div>

                        


                         <div class="col-12">
                            <div class="input-style-2">
                                <label for="app_token_page" class="form-label">{{ __('webstring.facebook_token_page') }}</label>
                                <input type="text" class="form-control" id="app_token_page" name="app_token_page" placeholder="{{ __('webstring.facebook_token_page') }}" value="{{ old('app_token_page') ?? $data->app_token_page }}" >
                                <span class="icon"> <i class="mdi mdi-ticket-percent-outline"></i> </span>
                            </div>
                             @if($errors->has('app_token_page'))
                                    <div class="error text-danger m-2">{{ $errors->first('app_token_page') }}</div>
                             @endif
                         </div>

                         
                         <div class="col-12">
                            <div class="input-style-2">
                                <label for="app_long_token_page" class="form-label">{{ __('webstring.facebook_token_page_long') }}</label>
                                <input type="text" class="form-control" id="app_long_token_page" name="app_long_token_page"  value="{{ old('app_long_token_page') ?? $data->app_long_token_page }}" readonly>
                                <span class="icon"> <i class="mdi mdi-ticket-percent-outline"></i> </span>
                            </div>
                             @if($errors->has('app_long_token_page'))
                                    <div class="error text-danger m-2">{{ $errors->first('app_long_token_page') }}</div>
                             @endif
                         </div>


                    </div>
         
                     <div class="col-12 mt-4 mb-3">
                         <button class="main-btn primary-btn rounded-md btn-hover" type="submit">{{ __('webstring.update') }}</button>
                     </div>

                </div>

        </div>

        <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-1"></div>
    </div>

   
@endsection

@section('subpagejs')

@endsection