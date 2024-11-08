@if (empty($data->timezone_id))
    

    <label for="timezone_id" class="mt-3 form-label">{{ __('webstring.timezone') }} </label>
        <select id="timezone_id" class="form-control selectpicker" name="timezone_id" data-live-search="true" required>
            @foreach($dbdata['timezone'] as $tkey => $tvalue)
                <option data-tokens="{{ $tvalue->timezones }}" value="{{ $tvalue->id }}">{{ $tvalue->timezones }}</option>
            @endforeach

        </select>

            @if($errors->has('timezone_id'))
                <div class="error text-danger m-2">{{ $errors->first('timezone_id') }}</div>
            @endif

@else


    <label for="timezone_id" class="mt-3 form-label">{{ __('webstring.timezone') }} </label>
        <select id="timezone_id" class="form-control selectpicker" name="timezone_id" data-live-search="true" required>

            @foreach($dbdata['timezone'] as $tkey => $tvalue)
                @if ($tvalue->id == $data->timezone_id )
                    <option data-tokens="{{ $tvalue->timezones }}" value="{{ $tvalue->id }}" selected>{{ $tvalue->timezones }}</option>
                @else
                    <option data-tokens="{{ $tvalue->timezones }}" value="{{ $tvalue->id }}">{{ $tvalue->timezones }}</option>
                @endif

                
            @endforeach

        </select>

        @if($errors->has('timezone_id'))
            <div class="error text-danger m-2">{{ $errors->first('timezone_id') }}</div>
        @endif
        
@endif