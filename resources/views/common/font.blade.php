@if (empty($data->font_id))
    

        <label for="font_id" class="mt-3 form-label">{{ __('webstring.font') }} </label>
            <select id="font_id" class="form-control selectpicker" name="font_id" data-live-search="true" required>
                @foreach($dbdata['font'] as $tkey => $fvalue)
                    <option data-tokens="{{ $fvalue->font_name }}" value="{{ $fvalue->id }}">{{ $fvalue->font_name }}</option>
                @endforeach
            </select>
                @if($errors->has('font_id'))
                    <div class="error text-danger m-2">{{ $errors->first('font_id') }}</div>
                @endif

@else

        <label for="font_id" class="mt-3 form-label">{{ __('webstring.font') }} </label>
        <select id="font_id" class="form-control selectpicker" name="font_id" data-live-search="true" required>
            @foreach($dbdata['font'] as $tkey => $fvalue)

                @if ($fvalue->id == $data->font_id )
                    <option data-tokens="{{ $fvalue->font_name }}" value="{{ $fvalue->id }}" selected>{{ $fvalue->font_name }}</option>
                @else
                    <option data-tokens="{{ $fvalue->font_name }}" value="{{ $fvalue->id }}">{{ $fvalue->font_name }}</option>
                @endif
                
            @endforeach
        </select>
            @if($errors->has('font_id'))
                <div class="error text-danger m-2">{{ $errors->first('font_id') }}</div>
            @endif  

@endif