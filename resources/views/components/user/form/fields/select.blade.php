@props(['field_name', 'required', 'label', 'name_parent'])

<div class="{!! $name_parent !!}__formRow">
    <label class="{!! $name_parent !!}__formRow__label" for="{!! $field_name !!}">{!! $label !!}
        @if($required)
            <span class="text-red-600 required">*</span>
        @endif</label>
    <select {!! $attributes !!} class="{!! $name_parent !!}__formRow__select" name="{!! $field_name !!}" id="{!! $field_name !!}"  @if($required) required @endif>
        {!! $slot !!}
    </select>
</div>
