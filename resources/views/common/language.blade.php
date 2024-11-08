@if (empty($data->language_id))
    

        <label for="language_id" class="mt-3 form-label">{{ __('webstring.langcode') }} </label>
            <select id="language_id" class="form-control selectpicker" name="language_id" data-live-search="true" required>
            @foreach($dbdata['lngcode'] as $tkey => $lvalue)
                <option data-tokens="{{ $lvalue->name }}" value="{{ $lvalue->id }}">{{ $lvalue->name }}</option>
            @endforeach
            </select>
            @if($errors->has('language_id'))
                <div class="error text-danger m-2">{{ $errors->first('language_id') }}</div>
            @endif

@else


        <label for="language_id" class="mt-3 form-label">{{ __('webstring.langcode') }} </label>
            <select id="language_id" class="form-control selectpicker" name="language_id" data-live-search="true" required>
            @foreach($dbdata['lngcode'] as $tkey => $lvalue)

            @if ($lvalue->id == $data->language_id )
                <option data-tokens="{{ $lvalue->name }}" value="{{ $lvalue->id }}" selected>{{ $lvalue->name }}</option>
            @else
                <option data-tokens="{{ $lvalue->name }}" value="{{ $lvalue->id }}">{{ $lvalue->name }}</option>
            @endif
               
            @endforeach
            </select>
            @if($errors->has('language_id'))
                <div class="error text-danger m-2">{{ $errors->first('language_id') }}</div>
            @endif




@endif