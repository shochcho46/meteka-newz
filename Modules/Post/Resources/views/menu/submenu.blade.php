@if (!empty( $data['post_sub_menu']))
    <label for="subhead" class="form-label">{{ __('webstring.sub_menu') }} </label>
        <select multiple="multiple" id="submenu" name="submenu_id[]" class="optgroup_test">
        @foreach ($data['sub_menu'] as $sub_menu_value)
            @if (in_array($sub_menu_value->id, $data['post_sub_menu']->toArray()))
            <option value="{{ $sub_menu_value->id }}" selected>{{ $sub_menu_value->name }}</option>
            @endif
         
        @endforeach
        </select>
@else
    <label for="subhead" class="form-label">{{ __('webstring.sub_menu') }}  </label>
        <select multiple="multiple" id="submenu" name="submenu_id[]" class="optgroup_test">
        </select>
@endif


