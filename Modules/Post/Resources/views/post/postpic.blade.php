
{{-- @if ($data['post']->hasMedia('postpic')) --}}
@if (isset($data['post']) && $data['post']->hasMedia('postpic'))

    <div class="card-style mb-30">
        <h6 class="mb-25">{{ __('webstring.post_pic') }} </h6>

        <div id="editpostpic">

        </div>
        <h6 class="text-center">max 1920X1080 px</h6>

        @if($errors->has('postpicupload'))
            <div class="error text-danger m-2">{{ $errors->first('postpicupload') }}</div>
        @endif

    <input type="hidden"  id="oldpostpic"  value="{{ $data['post']->getFirstMediaUrl('postpic', 'webp_format') }}" >
    <input type="hidden"   name="updatepostpic" value="{{ $data['post']->getFirstMediaUrl('postpic', 'webp_format') }}" >

    </div>
@else


<div class="card-style mb-30">
    <h6 class="mb-25">{{ __('webstring.post_pic') }} </h6>

    <div id="postpicture">

    </div>
    <h6 class="text-center">max 1920X1080 px</h6>

    @if($errors->has('picturepost.*'))
        <div class="error text-danger m-2">{{ $errors->first('picturepost') }}</div>
    @endif

</div>


@endif
