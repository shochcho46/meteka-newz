
<form action="{{ route('profile.logininfoupdate',$data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-style mb-30">
        <h6 class="mb-25">{{ __('webstring.login_credential') }} </h6>

        <div class="col-12">
            <div class="input-style-2">
            <label for="email" class="form-label">{{ __('webstring.email') }}</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? $data->email }}" placeholder="{{ __('webstring.email') }}" required>
            <span class="icon"> <i class="mdi mdi-email"></i> </span>
            </div>
            @if($errors->has('email'))
                <div class="error text-danger m-2">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="col-12">
            <div class="input-style-2">
            <label for="mobile" class="form-label">{{ __('webstring.mobile') }}</label>
            <input type="number" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') ?? $data->mobile }}" placeholder="{{ __('webstring.mobile') }}" required>
            <span class="icon"> <i class="mdi mdi-phone-plus"></i> </span>
            </div>
            @if($errors->has('mobile'))
                <div class="error text-danger m-2">{{ $errors->first('mobile') }}</div>
            @endif
        </div>



        <div class="col-12">
            <div class="input-style-2">
            <label for="password" class="form-label">{{ __('webstring.password') }}</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('webstring.password') }}" required>
            <span class="icon"> <i class="mdi mdi-lock"></i> </span>
            </div>
            @if($errors->has('password'))
                <div class="error text-danger m-2">{{ $errors->first('password') }}</div>
            @endif
        </div>

       

           
            <div class="col-12 mt-4 mb-3">
                <button class="main-btn primary-btn rounded-md btn-hover" type="submit">{{ __('webstring.update') }}</button>
            </div>
        

    </div>
</form>