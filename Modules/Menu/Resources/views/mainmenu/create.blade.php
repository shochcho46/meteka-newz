@extends('layout.admin.home')

@section('content')

@include('common.message')
    <div class="row">
        <div class="col-xxl-4 col-xl-4 col-md-3 col-sm-1"></div>
        <div class="col-xxl-4 col-xl-4 col-md-6 col-sm-10">
        
            <form action="{{ route('mainmenu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                 
                <div class="card-style mb-30">
                    <h4 class="mb-25">{{ __('webstring.add') }} {{ __('webstring.main_menu') }}</h4>

                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="name" class="form-label">{{ __('webstring.main_menu') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('webstring.main_menu') }}"  value="{{ old('name') }}" >
                        
                        </div>
                        @if($errors->has('name'))
                            <div class="error text-danger m-2">{{ $errors->first('name') }}</div>
                        @endif
                    </div>


                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="serial" class="form-label">{{ __('webstring.serial') }}</label>
                        <input type="number" class="form-control" id="serial" name="serial" placeholder="{{ __('webstring.serial') }}"  value="{{ old('serial') }}" >
                        
                        </div>
                        @if($errors->has('serial'))
                            <div class="error text-danger m-2">{{ $errors->first('serial') }}</div>
                        @endif
                    </div>


         
                     <div class="col-12 mt-4 mb-3">
                         <button class="main-btn primary-btn rounded-md btn-hover" type="submit">{{ __('webstring.save') }}</button>
                     </div>

                </div>

        </div>

        <div class="col-xxl-4 col-xl-4 col-md-3 col-sm-1"></div>
    </div>


@endsection
