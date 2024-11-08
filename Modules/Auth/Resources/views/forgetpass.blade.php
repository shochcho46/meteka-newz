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
                            <form action="{{ route('auth.checkAccount') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                <div class="invalid-feedback">
                                    Email is invalid
                                </div>
                            </div>


                            <div class="text-center">
                               
                                <button type="submit" class="mt-1 btn btn-primary">
                                    Find Account
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