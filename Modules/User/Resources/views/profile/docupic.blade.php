<form action="{{ route('profile.documentimgupdate',$data->udtail->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-style mb-30">
        <h6 class="mb-25">{{ __('webstring.docuimage') }} </h6>

        <div id="editdocupic">

        </div>
        <h6>max 1920X1080 px</h6>

        @if($errors->has('docupicupload.*'))
            <div class="error text-danger m-2">{{ $errors->first('docupicupload.*') }}</div>
        @endif

        <input type="hidden"  id="olddocupic"  value="{{ $data->udtail->getFirstMediaUrl('userdocument')}}"  >
        <input type="hidden"   name="updatedocupic" value="{{ $data->idimgloc }}"  >

        <div class="col-12 mt-4 mb-3">
            <button class="main-btn primary-btn rounded-md btn-hover" type="submit">{{ __('webstring.update') }}</button>
        </div>


    </div>
</form>
