@extends('layout.normal.main')

@section('content')
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            @include('common.message')
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-5">
                    <img src=" {{url('/'.$webcongigData->logo) }}" alt="amader-protidin logo" class = "img-fluid" >
                </div>
                <div class="card shadow-lg mb-5">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>

                        <form action="{{ route('auth.logincheck') }}" method="POST" enctype="multipart/form-data">
                            @csrf


                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="emailormobile">User Name</label>
                                <input id="emailormobile" type="text" class="form-control" name="emailormobile" value="" required autofocus>
                                @if($errors->has('emailormobile'))
                                    <div class="error text-danger m-2">{{ $errors->first('emailormobile') }}</div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="password">Password</label>
                                    <a href="{{ route('auth.forgetpass') }}" class="float-end">
                                        Forgot Password?
                                    </a>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if($errors->has('password'))
                                        <div class="error text-danger m-2">{{ $errors->first('password') }}</div>
                                @endif
                            </div>

                            <div class="d-flex align-items-center">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                    <label for="remember" class="form-check-label">Remember</label>
                                </div>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Login
                                </button>
                            </div>

                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            {{--  Don't have an account? <a href="{{ route('auth.registration') }}" class="text-dark">Create One</a>  --}}
                        </div>
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

@section('subpagejs')
    <script src="{{ asset('js/custome.js') }}" ></script>
@endsection