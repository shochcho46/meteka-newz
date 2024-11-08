@extends('layout.admin.home')

@section('content')

@include('common.message')
    <div class="row">
        <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12">

            <form action="{{ route('createuser.passupdate',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                
                <div class="card-style mb-30">
                    <h4 class="mb-25">{{ __('webstring.edit') }} {{ __('webstring.user_admin') }} {{ __('webstring.security') }}</h4>

                    <div class="col-12">
                        <div class="input-style-2">
                            <label class="text-muted" for="password">{{ __('webstring.password') }}</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('webstring.password') }}" required>
                        </div>
                        @if($errors->has('password'))
                        <div class="error text-danger m-2">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
    
                    <div class="col-12">
                        <div class="input-style-2">
                            <label class="text-muted" for="password">{{ __('webstring.repassword') }}</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{ __('webstring.repassword') }}" required>
                        </div>
                    </div>
                
         
                     <div class="col-12 mt-4 mb-3">
                         <button class="main-btn primary-btn rounded-md btn-hover" type="submit">{{ __('webstring.update') }}</button>
                     </div>

                </div>
            </form>


        </div>
        <div class="col-xxl-6 col-xl-6 col-md-6 col-sm-12">
        
            <form action="{{ route('createuser.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                
                <div class="card-style mb-30">
                    <h4 class="mb-25">{{ __('webstring.edit') }} {{ __('webstring.user_admin') }}</h4>

                    <div class="col-12">
                        <div class="input-style-2">
                            <label class="mb-2 text-muted" for="email">{{ __('webstring.email') }}</label>
                            <input type="email" class="form-control" id="email" name="email"  value="{{ old('email') ?? $data->email }}" required>
                        </div>
                        @if($errors->has('email'))
                        <div class="error text-danger m-2">{{ $errors->first('email') }}</div>
                        @endif
                    </div>

                    <div class="col-12">
                        <div class="input-style-2">
                            <label class="mb-2 text-muted" for="email">{{ __('webstring.mobile') }}</label>
                            <input type="number" class="form-control" id="mobile" name="mobile"  value="{{ old('mobile') ?? $data->mobile }}" required>
                        </div>
                        @if($errors->has('mobile'))
                        <div class="error text-danger m-2">{{ $errors->first('mobile') }}</div>
                        @endif
                    </div>


                
         
                     <div class="col-12 mt-4 mb-3">
                         <button class="main-btn primary-btn rounded-md btn-hover" type="submit">{{ __('webstring.update') }}</button>
                     </div>

                </div>
            </form>
        </div>

        
    </div>


@endsection
