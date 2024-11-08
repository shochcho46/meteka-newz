@extends('layout.normal.main')

@section('content')
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-5">
                    <img src=" {{url('/'.$webcongigData->logo) }}" alt="amader-protidin logo" class = "img-fluid" >
                </div>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">Sign up</h1>
                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="name">{{ __('webstring.name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('webstring.name') }}" value="{{ old('name') }}" required>
                                @if($errors->has('name'))
                                        <div class="error text-danger m-2">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">{{ __('webstring.email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('webstring.email_placeholder') }}" value="{{ old('email') }}" required>
                                @if($errors->has('email'))
                                        <div class="error text-danger m-2">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">{{ __('webstring.mobile') }}</label>
                                <input type="number" class="form-control" id="mobile" name="mobile" placeholder="{{ __('webstring.mobile') }}" value="{{ old('mobile') }}" required>
                                @if($errors->has('mobile'))
                                        <div class="error text-danger m-2">{{ $errors->first('mobile') }}</div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="password">{{ __('webstring.password') }}</label>
                                 </div>
                                 <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('webstring.password') }}" required>
                                 @if($errors->has('password'))
                                         <div class="error text-danger m-2">{{ $errors->first('password') }}</div>
                                 @endif
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="password">{{ __('webstring.repassword') }}</label>
                                 </div>
                                 <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{ __('webstring.repassword') }}" required>
                                
                            </div>

                            <div class="text-center">
                               
                                <div class="col-12 mt-4 mb-3">
                                    <button class="btn btn-primary btn-sm" type="submit">{{ __('webstring.signup') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
               
            </div>
        </div>
    </div>

</section>
<div class="mt-5">
    &nbsp;
</div>
@endsection