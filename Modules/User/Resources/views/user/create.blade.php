@extends('layout.admin.home')

@section('content')

@include('common.message')
<div class="row">
    <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-1"></div>
    <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-10">

        <form action="{{ route('createuser.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-style mb-30">
                <h4 class="mb-25">{{ __('webstring.add') }} {{ __('webstring.user') }}</h4>

                <div class="col-12">
                    <div class="input-style-2">
                        <label for="name" class="form-label">{{ __('webstring.name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('webstring.name') }}" value="{{ old('name') }}" required>

                    </div>
                    @if($errors->has('name'))
                    <div class="error text-danger m-2">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <div class="col-12">
                    <div class="input-style-2">
                        <label class="mb-2 text-muted" for="email">{{ __('webstring.email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('webstring.email_placeholder') }}" value="{{ old('email') }}" required>
                    </div>
                    @if($errors->has('email'))
                    <div class="error text-danger m-2">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="col-12">
                    <div class="input-style-2">
                        <label class="mb-2 text-muted" for="email">{{ __('webstring.mobile') }}</label>
                        <input type="number" class="form-control" id="mobile" name="mobile" placeholder="{{ __('webstring.mobile') }}" value="{{ old('mobile') }}" required>
                    </div>
                    @if($errors->has('mobile'))
                    <div class="error text-danger m-2">{{ $errors->first('mobile') }}</div>
                    @endif
                </div>

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


                <div class="col-12">
                    <div class="select-style-1">
                        <label class="text-muted" for="role_id">{{ __('webstring.user_type') }}  <span class="text-danger">*</span></label>
                        <div class="select-position">
                            <select  name="role_id" id="role_id" class="" required>
                                <option value="">None</option>
                                @foreach ($data['role'] as $role_value)
                                    <option value="{{ $role_value->id }}">{{ $role_value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                       
                    </div>
                    @if($errors->has('role_id'))
                        <div class="error text-danger m-2">{{ $errors->first('role_id') }}</div>
                    @endif
                </div>




                <div class="col-12">
                    <h6 class="mb-25">{{ __('webstring.status') }}</h6>
                    <div class="ml-5 row ">
                        <div class="col-3 form-check radio-style mb-20 ">
                            <input class="form-check-input" type="radio" name="status" value="1" checked required />
                            <label class="form-check-label" for="radio-1">{{ __('webstring.active') }}</label>
                        </div>

                        <div class=" col-3 form-check radio-style mb-20">
                            <input class="form-check-input" type="radio" name="status" value="0" />
                            <label class="form-check-label" for="radio-1">{{ __('webstring.disable') }}</label>
                        </div>

                    </div>
                </div>

                <div class="col-12 mt-4 mb-3">
                    <button class="main-btn primary-btn rounded-md btn-hover" type="submit">{{ __('webstring.save') }}</button>
                </div>

            </div>
        </form>
    </div>

    <div class="col-xxl-2 col-xl-2 col-md-2 col-sm-1"></div>
</div>


@endsection
