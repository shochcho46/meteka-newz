@extends('layout.admin.home')

@section('content')

@include('common.message')
    <div class="row">
        <div class="col-xxl-4 col-xl-4 col-md-3 col-sm-1"></div>
        <div class="col-xxl-4 col-xl-4 col-md-6 col-sm-10">
        
            <form action="{{ route('submenu.update',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-style mb-30">
                    <h4 class="mb-25">{{ __('webstring.edit') }} {{ __('webstring.sub_menu') }}</h4>


                    <div class="col-12">

                        <div class="select-style-1">
                             <label for="mainmenu_id" class="form-label">{{ __('webstring.main_menu') }}</label>
                             <div class="select-position">
                               <select  name="mainmenu_id" id="mainmenu_id"  required>
                                @foreach ($mainmenu as $mainValue)
                                    <option value="{{ $mainValue->id }}" {{ $data->mainmenu_id == $mainValue->id ? "selected" : "" }}> {{ $mainValue->name }}</option>
                                @endforeach
                                </select>
                             </div>
                         </div>

                         @if($errors->has('mainmenu_id'))
                            <div class="error text-danger m-2">{{ $errors->first('mainmenu_id') }}</div>
                        @endif
                     </div>

                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="name" class="form-label">{{ __('webstring.sub_menu') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('webstring.sub_menu') }}"  value="{{ old('name') ?? $data->name }}" >
                        
                        </div>
                        @if($errors->has('name'))
                            <div class="error text-danger m-2">{{ $errors->first('name') }}</div>
                        @endif
                    </div>


                    <div class="col-12">
                        <div class="input-style-2">
                        <label for="serial" class="form-label">{{ __('webstring.serial') }}</label>
                        <input type="number" class="form-control" id="serial" name="serial" placeholder="{{ __('webstring.serial') }}"  value="{{ old('serial') ?? $data->serial}}" >
                        
                        </div>
                        @if($errors->has('serial'))
                            <div class="error text-danger m-2">{{ $errors->first('serial') }}</div>
                        @endif
                    </div>


         
                     <div class="col-12 mt-4 mb-3">
                         <button class="main-btn primary-btn rounded-md btn-hover" type="submit">{{ __('webstring.update') }}</button>
                     </div>

                </div>

        </div>

        <div class="col-xxl-4 col-xl-4 col-md-3 col-sm-1"></div>
    </div>


@endsection
