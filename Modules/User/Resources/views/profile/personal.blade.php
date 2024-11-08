
<form action="{{ route('profile.updatepersonal',$data->udtail->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-style mb-30">
        <h6 class="mb-25">{{ __('webstring.personal') }} </h6>
        <div class="row">
            <div class="col-3">
                <div class="input-style-2">
                    <label for="name" class="form-label">{{ __('webstring.name') }}</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $data->udtail->name }}" placeholder="{{ __('webstring.name') }}" required>
                    <span class="icon"> <i class="mdi mdi-account-box-outline"></i> </span>
                </div>
                @if($errors->has('name'))
                    <div class="error text-danger m-2">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="col-3">
                <div class="input-style-2">
                <label for="idtype" class="form-label">{{ __('webstring.nid') }}</label>
                <input type="text" class="form-control" id="idtype" name="idtype" value="{{ old('idtype') ?? $data->udtail->idtype }}"  placeholder="{{ __('webstring.nid') }}" >
                
                </div>
                @if($errors->has('idtype'))
                    <div class="error text-danger m-2">{{ $errors->first('idtype') }}</div>
                @endif
            </div>

            <div class="col-3">
                <div class="input-style-2">
                    <label for="idnumber" class="form-label">{{ __('webstring.nid_number') }}</label>
                    <input type="text" class="form-control" id="idnumber" name="idnumber" value="{{ old('idnumber') ?? $data->udtail->idnumber }}" placeholder="{{ __('webstring.nid_number') }}" >
                    <span class="icon"> <i class="mdi mdi-card-account-details"></i> </span>
                </div>
                @if($errors->has('idnumber'))
                    <div class="error text-danger m-2">{{ $errors->first('idnumber') }}</div>
                @endif
            </div>

            <div class="col-3">
                <div class="input-style-2">
                    <label for="age" class="form-label">{{ __('webstring.age') }}</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ old('age') ?? $data->udtail->age }}" placeholder="{{ __('webstring.age') }}" >
                </div>
                @if($errors->has('age'))
                    <div class="error text-danger m-2">{{ $errors->first('age') }}</div>
                @endif
            </div>

            <div class="col-3">
                <div class="input-style-2">
                <label for="city" class="form-label">{{ __('webstring.city') }}</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city') ?? $data->udtail->city }}" placeholder="{{ __('webstring.city') }}" required>
                
                </div>
                @if($errors->has('city'))
                    <div class="error text-danger m-2">{{ $errors->first('city') }}</div>
                @endif
            </div>

           

            <div class="col-3">
                <div class="input-style-2">
                <label for="zip" class="form-label">{{ __('webstring.zip') }}</label>
                <input type="number" class="form-control" id="zip" name="zip" value="{{ old('zip') ?? $data->udtail->zip }}" placeholder="{{ __('webstring.zip') }}" >
                
                </div>
                @if($errors->has('zip'))
                    <div class="error text-danger m-2">{{ $errors->first('zip') }}</div>
                @endif
            </div>

            
            <div class="col-6">
                <div class="input-style-2">
                <label for="address" class="form-label">{{ __('webstring.address') }}</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') ?? $data->udtail->address }}"  placeholder="{{ __('webstring.address_placeholder') }}" >
                
                </div>
                @if($errors->has('address'))
                    <div class="error text-danger m-2">{{ $errors->first('address') }}</div>
                @endif
            </div>


            <div class="col-3">
                <div class="select-style-1">
                     <label for="blood" class="form-label">{{ __('webstring.blood') }}</label>
                     <div class="select-position">
                       <select  name="blood" id="blood"  required>
                        <option value="A+" {{ $data->udtail->blood== "A+" ? "selected" : "" }}> A+</option>
                         <option value="A-" {{ $data->udtail->blood== "A-" ? "selected" : "" }}>A-</option>
                         <option value="B+" {{ $data->udtail->blood== "B+" ? "selected" : "" }}>B+</option>
                         <option value="B-" {{ $data->udtail->blood== "B-" ? "selected" : "" }}>B-</option>
                         <option value="O+" {{ $data->udtail->blood== "O+" ? "selected" : "" }}>O+</option>
                         <option value="O-" {{ $data->udtail->blood== "O-" ? "selected" : "" }}>O-</option>
                         <option value="AB+"{{ $data->udtail->blood== "AB+" ? "selected" : "" }}>AB+</option>
                         <option value="AB-"{{ $data->udtail->blood== "AB-" ? "selected" : "" }}>AB-</option>
                       </select>
                     </div>
                 </div>
                 @if($errors->has('blood'))
                    <div class="error text-danger m-2">{{ $errors->first('blood') }}</div>
                @endif
             </div>


            <div class="col-3">
                @include('common.country')
            </div>


            <div class="col-6">
               <h6 class="mb-25">{{ __('webstring.gender') }}</h6>
               <div class="row">
                    <div class="col-3 form-check radio-style mb-20">
                        <input class="form-check-input" type="radio" name="gender" value="male" {{ $data->udtail->gender== "male" ? "checked" : "" }}  required/>
                        <label class="form-check-label" for="radio-1">{{ __('webstring.male') }}</label>
                    </div>

                    <div class=" col-3 form-check radio-style mb-20">
                        <input class="form-check-input" type="radio" name="gender" value="female" {{ $data->udtail->gender== "female" ? "checked" : "" }} />
                        <label class="form-check-label" for="radio-1">{{ __('webstring.female') }}</label>
                    </div>

                </div>
            </div>

            <div class="col-12 mt-4 mb-3">
                <button class="main-btn primary-btn rounded-md btn-hover" type="submit">{{ __('webstring.update') }}</button>
            </div>
        

    </div>
</form>




