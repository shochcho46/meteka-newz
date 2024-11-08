@extends('layout.admin.home')

@section('content')

@include('common.message')
    <div class="row">
        <div class="col-xxl-4 col-xl-4 col-md-3 col-sm-1"></div>
        <div class="col-xxl-4 col-xl-4 col-md-6 col-sm-10">
        
            <form action="{{ route('social.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-style mb-30">
                    <h4 class="mb-25">{{ __('webstring.edit') }} {{ __('webstring.social_network') }}</h4>

                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="link" class="form-label">{{ __('webstring.link') }}</label>
                        <input type="url" class="form-control" id="link" name="link" placeholder="{{ __('webstring.link') }}"  value="{{ old('link') ?? $data->link }}" >
                        <span class="icon"> <i class="mdi mdi-link-variant"></i> </span>
                        </div>
                        @if($errors->has('link'))
                            <div class="error text-danger m-2">{{ $errors->first('link') }}</div>
                        @endif
                    </div>



                    <div class="col-12">
                        <div class="select-style-1">
                             <label for="icone" class="form-label">{{ __('webstring.icone') }}</label>
                             <div class="select-position">
                               <select  name="icone" id="icone"  required>
                                    <option value="mdi mdi-facebook" {{ $data->icone == "mdi mdi-facebook" ? "selected" : "" }}> facebook </option>
                                    <option value="mdi mdi-whatsapp" {{ $data->icone == "mdi mdi-whatsapp" ? "selected" : "" }}> whatsapp </option>
                                    <option value="mdi mdi-instagram" {{ $data->icone == "mdi mdi-instagram" ? "selected" : "" }}> instagram </option>
                                    <option value="mdi mdi-youtube" {{ $data->icone == "mdi mdi-youtube" ? "selected" : "" }}> youtube </option>
                                    <option value="mdi mdi-twitter" {{ $data->icone == "mdi mdi-twitter" ? "selected" : "" }}> twitter </option>
                                    <option value="mdi mdi-pinterest" {{ $data->icone == "mdi mdi-pinterest" ? "selected" : "" }}> pinterest </option>
                                    <option value="mdi mdi-snapchat" {{ $data->icone == "mdi mdi-snapchat" ? "selected" : "" }}> snapchat </option>
                                    <option value="mdi mdi-skype" {{ $data->icone == "mdi mdi-skype" ? "selected" : "" }}> skype </option>
                                    <option value="mdi mdi-linkedin" {{ $data->icone == "mdi mdi-linkedin" ? "selected" : "" }}> linkedin </option>
                                    <option value="mdi mdi-reddit" {{ $data->icone == "mdi mdi-reddit" ? "selected" : "" }}> reddit </option>
                                    <option value="mdi mdi-discord" {{ $data->icone == "mdi mdi-discord" ? "selected" : "" }}> discord </option>
                                    <option value="mdi mdi-qqchat" {{ $data->icone == "mdi mdi-qqchat" ? "selected" : "" }}> qqchat </option>
                               </select>
                             </div>
                         </div>
                         @if($errors->has('icone'))
                            <div class="error text-danger m-2">{{ $errors->first('icone') }}</div>
                        @endif
                     </div>


                     <div class="col-12">
                        <h6 class="mb-25">{{ __('webstring.status') }}</h6>
                        <div class="ml-5 row ">
                             <div class="col-3 form-check radio-style mb-20 ">
                                 <input class="form-check-input" type="radio" name="status" value="1" {{ $data->status == 1 ? "checked" : "" }}  required/>
                                 <label class="form-check-label" for="radio-1">{{ __('webstring.active') }}</label>
                             </div>
         
                             <div class=" col-3 form-check radio-style mb-20">
                                 <input class="form-check-input" type="radio" name="status" value="0"  {{ $data->status == 0 ? "checked" : "" }}  />
                                 <label class="form-check-label" for="radio-1">{{ __('webstring.disable') }}</label>
                             </div>
         
                         </div>
                     </div>
         
                     <div class="col-12 mt-4 mb-3">
                         <button class="main-btn primary-btn rounded-md btn-hover" type="submit">{{ __('webstring.update') }}</button>
                     </div>

                </div>

        </div>

        <div class="col-xxl-4 col-xl-4 col-md-3 col-sm-1"></div>
    </div>


@endsection
