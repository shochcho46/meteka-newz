
@if (empty($data->country_id))
    

<label for="country_id" class="mt-3 form-label">{{ __('webstring.country') }} </label>
    <select id="country_id" class="form-control selectpicker" name="country_id" data-live-search="true" required>
        @foreach($dbdata['country'] as $key => $cvalue)
            <option data-tokens="{{ $cvalue->name }}" value="{{ $cvalue->id }}">{{ $cvalue->name }}</option>
        @endforeach
    </select>
        @if($errors->has('country_id'))
            <div class="error text-danger m-2">{{ $errors->first('country_id') }}</div>
        @endif

@else


<label for="country_id" class="mt-3 form-label">{{ __('webstring.country') }} </label>
    <select id="country_id" class="form-control selectpicker" name="country_id" data-live-search="true" required>
        @foreach($dbdata['country'] as $key => $cvalue)
            @if ($cvalue->id == $data->country_id )
                <option data-tokens="{{ $cvalue->name }}" value="{{ $cvalue->id }}" selected>{{ $cvalue->name }}</option>
            @else
                <option data-tokens="{{ $cvalue->name }}" value="{{ $cvalue->id }}">{{ $cvalue->name }}</option>
            @endif
           
        @endforeach
    </select>
        @if($errors->has('country_id'))
            <div class="error text-danger m-2">{{ $errors->first('country_id') }}</div>
        @endif


@endif



