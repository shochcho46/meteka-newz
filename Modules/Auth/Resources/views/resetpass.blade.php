
@extends('layout.normal.main')

@section('content')
<section class="h-100">
    <div class="container h-100">
        @include('common.message')
        <div class="row justify-content-sm-center h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="text-center my-5">
                    <img src="{{url('/'.$webcongigData->logo) }}" alt="logo"  class="img-fluid">
                </div>
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">Forget Password</h1>
                        <form action="{{ route('auth.resetPassWord') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="code">Code</label>
                                    <input id="code" type="text" class="form-control" name="code" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        code is invalid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    @if($errors->has('password'))
                                        <div class="error text-danger m-2">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>


                            <div class="mb-3">
                                <div class="mb-2 w-100">
                                    <label class="text-muted" for="password">Re-Password</label>
                                </div>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                               
                            </div>
                            <input type="hidden" value="{{ $userData->id }}" name="userId">

                            <div class="text-center">
                               
                                <button type="submit" class="mt-1 btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                    
                </div>
                <div class="text-center mt-5 text-muted">
                    Copyright &copy; {{ date('Y') }} &mdash; Your Company 
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


@section('subpagejs')
    <script src="{{ asset('js/custome.js') }}" ></script>
@endsection