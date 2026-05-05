@props(['field_name', 'placeholder', 'label', 'name_parent', 'required'])

<div class="{!! $name_parent !!}__formRow">
    <label class="{!! $name_parent !!}__formRow__label" for="{!! $field_name !!}">
        {!! $label !!}
        @if(isset($required))
            <span class="text-red-600 required">*</span>
        @endif
    </label>
    <textarea name="{!! $field_name !!}" id="{!! $field_name !!}" cols="25" rows="5" class="{!! $name_parent !!}__formRow__textarea" placeholder="{!! $placeholder !!}"></textarea>
</div>
