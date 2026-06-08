@props(['value', 'option_name', 'selected', 'name_parent'])

<option class="{!! $name_parent !!}__formRow__select__option" {!! $selected?? '' !!} value="{!! $value !!}">{!! $option_name !!}</option>
