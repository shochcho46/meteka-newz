@if (!empty($data['post_main_menu']))

<label for="subhead" class="form-label">{{ __('webstring.main_menu') }} <span class="text-danger">*</span></label>
    <select multiple="multiple" name="mainmenu_id[]" id="mainmenu" class="testselect2" >
        @foreach ($data['main_menu'] as $main_menu_value)
         <option value="{{ $main_menu_value->id }}" {{  in_array($main_menu_value->id, $data['post_main_menu']->toArray()) ? 'selected' : '' }}>{{ $main_menu_value->name }}</option>
        @endforeach
     </select>
    @if($errors->has('mainmenu_id'))
        <div class="error text-danger m-2">{{ $errors->first('mainmenu_id') }}</div>
    @endif
@else

<label for="subhead" class="form-label">{{ __('webstring.main_menu') }} <span class="text-danger">*</span></label>
    <select multiple="multiple" name="mainmenu_id[]" id="mainmenu" class="testselect2" >
        @foreach ($data['main_menu'] as $main_menu_value)
            <option value="{{ $main_menu_value->id }}">{{ $main_menu_value->name }}</option>
        @endforeach
     </select>
    @if($errors->has('mainmenu_id'))
        <div class="error text-danger m-2">{{ $errors->first('mainmenu_id') }}</div>
    @endif
@endif


 
    



@section('pagepartjs')
   
<script src="{{ asset('js/ajax.js') }}" ></script>
   

@endsection