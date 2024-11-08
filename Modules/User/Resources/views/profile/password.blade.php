
<form action="{{ route('profile.passwordupdate',$data->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-style mb-30">
        <h6 class="mb-25">{{ __('webstring.security') }} </h6>

        <div class="col-12">
            <div class="input-style-2">
            <label for="oldpassword" class="form-label">{{ __('webstring.oldpassword') }}</label>
            <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="{{ __('webstring.oldpassword') }}" required>
            <span class="icon"> <i class="mdi mdi-lock"></i> </span>
            </div>
            @if($errors->has('oldpassword'))
                <div class="error text-danger m-2">{{ $errors->first('oldpassword') }}</div>
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

        <div class="col-12">
            <div class="input-style-2">
            <label for="repassword" class="form-label">{{ __('webstring.repassword') }}</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="{{ __('webstring.repassword') }}" required>
            <span class="icon"> <i class="mdi mdi-lock"></i> </span>
            </div>
           
        </div>

           
            <div class="col-12 mt-4 mb-3">
                <button class="main-btn primary-btn rounded-md btn-hover" type="submit">{{ __('webstring.update') }}</button>
            </div>
        

    </div>
</form>