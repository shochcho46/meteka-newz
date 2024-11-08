@extends('layout.admin.home')

@section('content')
@include('common.message')
<div class="row">
    <div class="col-3"></div>
    <div class=" col-xl-6 col-xxl-6 col-md-6 col-sm-12 ">
       <form action="{{ route('footer.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-style mb-30">
                    <h6 class="mb-25">{{ __('webstring.edit') }} {{ __('webstring.footer') }}</h6>

                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="contact" class="form-label">{{ __('webstring.contact') }}</label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="{{ __('webstring.contact') }}" value="{{ old('contact') ?? $data->contact }}" required>
                        <span class="icon"> <i class="mdi mdi-phone-plus"></i> </span>
                        </div>
                        @if($errors->has('contact'))
                            <div class="error text-danger m-2">{{ $errors->first('contact') }}</div>
                        @endif
                    </div>

                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="email" class="form-label">{{ __('webstring.email') }}</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('webstring.email_placeholder') }}" value="{{ old('email') ?? $data->email }}" required>
                        <span class="icon"> <i class="mdi mdi-email"></i> </span>
                    </div>
                        @if($errors->has('email'))
                            <div class="error text-danger m-2">{{ $errors->first('email') }}</div>
                        @endif
                    </div>


                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="house" class="form-label">{{ __('webstring.house') }}</label>
                        <input type="text" class="form-control" id="house" name="house" placeholder="{{ __('webstring.house_placeholder') }} " value="{{ old('house') ?? $data->house }}" required>
                        <span class="icon"> <i class="mdi mdi-home"></i> </span>
                    </div>
                        @if($errors->has('house'))
                            <div class="error text-danger m-2">{{ $errors->first('house') }}</div>
                        @endif
                    </div>



                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="road" class="form-label">{{ __('webstring.road') }}</label>
                        <input type="text" class="form-control" id="road" name="road" placeholder="{{ __('webstring.road') }}" value="{{ old('road') ?? $data->road }}" required>
                        <span class="icon"> <i class="mdi mdi-road"></i> </span>
                        </div>
                        @if($errors->has('road'))
                            <div class="error text-danger m-2">{{ $errors->first('road') }}</div>
                        @endif
                    </div>

                    <div class="col-12">
                        <div class="input-style-2">
                            <label for="location" class="form-label">{{ __('webstring.location') }}</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="{{ __('webstring.location') }}" value="{{ old('location') ?? $data->location }}" required>
                            <span class="icon"> <i class="mdi mdi-map-marker"></i> </span>
                        </div>
                        @if($errors->has('location'))
                        <div class="error text-danger m-2">{{ $errors->first('location') }}</div>
                        @endif
                    </div>

                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="location_text" class="form-label">{{ __('webstring.location_text') }}</label>
                        <input type="text" class="form-control" id="location_text" name="location_text" placeholder="{{ __('webstring.location_text') }}" value="{{ old('location_text') ?? $data->location_text }}" >
                        <span class="icon"> <i class="mdi mdi-map-marker"></i> </span>
                        </div>
                        @if($errors->has('location_text'))
                            <div class="error text-danger m-2">{{ $errors->first('location_text') }}</div>
                        @endif
                    </div>



                    <div class="col-12">
                        <label for="footer_detail" class="form-label">{{ __('webstring.footer_detail') }}</label>
                         <div class="input-style-3">
                           
                            <textarea placeholder="{{ __('webstring.message') }}" rows="5" class="form-control" id="footer_detail" name="footer_detail" required>{{ old('footer_detail') ?? $data->footer_detail }}</textarea>
                            <span class="icon"><i class="mdi mdi-format-text-rotation-down-vertical"></i></span>
                        </div>
                       @if($errors->has('footer_detail'))
                            <div class="error text-danger m-2">{{ $errors->first('footer_detail') }}</div>
                        @endif
                    </div>

                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="copyright" class="form-label">{{ __('webstring.copy_right') }}</label>
                        <input type="text" class="form-control" id="copyright" name="copyright" placeholder="{{ __('webstring.copy_right') }}" value="{{ old('copyright') ?? $data->copyright }}" required>
                        <span class="icon"> <i class="mdi mdi-copyright"></i> </span>
                        </div>
                        @if($errors->has('copyright'))
                            <div class="error text-danger m-2">{{ $errors->first('copyright') }}</div>
                        @endif
                    </div>

                    <div class="col-12 mt-4 mb-3">
                        <button class="main-btn primary-btn rounded-md btn-hover" type="submit">{{ __('webstring.update') }}</button>
                    </div>
                 </div>


                </form>
           

    </div>

    <div class="col-3"></div>
        

    
</div>
@endsection




