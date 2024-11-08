@extends('layout.admin.home')

@section('content')

@include('common.message')
    <div class="row">
        <div class="col-xxl-4 col-xl-4 col-md-3 col-sm-1"></div>
        <div class="col-xxl-4 col-xl-4 col-md-6 col-sm-10">
        
            <form action="{{ route('role.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                 
                <div class="card-style mb-30">
                    <h4 class="mb-25">{{ __('webstring.permission_role_add') }}</h4>

                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="name" class="form-label">{{ __('webstring.permission_role_name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('webstring.permission_role_name') }}"  value="{{ old('name') }}" >
                        
                        </div>
                        @if($errors->has('name'))
                            <div class="error text-danger m-2">{{ $errors->first('name') }}</div>
                        @endif
                    </div>

                    <div class="col-12">
                        <h6 class="mb-25">{{ __('webstring.status') }}</h6>
                        <div class="ml-5 row ">
                             <div class="col-3 form-check radio-style mb-20 ">
                                 <input class="form-check-input" type="radio" name="status" value="1" checked  required/>
                                 <label class="form-check-label" for="radio-1">{{ __('webstring.active') }}</label>
                             </div>
         
                             <div class=" col-3 form-check radio-style mb-20">
                                 <input class="form-check-input" type="radio" name="status" value="0"  />
                                 <label class="form-check-label" for="radio-1">{{ __('webstring.disable') }}</label>
                             </div>
         
                         </div>
                     </div>
         
                     <div class="col-12 mt-4 mb-3">
                         <button class="main-btn primary-btn rounded-md btn-hover" type="submit">{{ __('webstring.save') }}</button>
                     </div>

                </div>

        </div>

        <div class="col-xxl-4 col-xl-4 col-md-3 col-sm-1"></div>
    </div>


@endsection
