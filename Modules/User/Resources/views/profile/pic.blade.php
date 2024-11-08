<form action="{{ route('profile.profileimgupdate',$data->udtail->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-style mb-30">
        <h6 class="mb-25">{{ __('webstring.profileimage') }} </h6>

        <div id="editprofilepic">

        </div>
        <h6>max 1920X1080 px</h6>

        @if($errors->has('profilepicupload.*'))
            <div class="error text-danger m-2">{{ $errors->first('profilepicupload.*') }}</div>
        @endif

        <input type="hidden"  id="oldprofilepic"  value="{{ $data->udtail->getFirstMediaUrl('profilepic')}}"  >
        <input type="hidden"   name="updateprofilepic" value="{{ $data->imgloc }}"  >

        <div class="col-12 mt-4 mb-3">
            <button class="main-btn primary-btn rounded-md btn-hover" type="submit">{{ __('webstring.update') }}</button>
        </div>


    </div>
</form>
