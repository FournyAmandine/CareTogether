@props(['field_name', 'type', 'placeholder', 'required', 'label', 'name_parent'])

<div class="{!! $name_parent !!}__formRow ">
    <label class="{!! $name_parent !!}__formRow__label" for="{!! $field_name !!}">{!! $label !!}
        @if(isset($required))
            <span class="text-red-600 required">*</span>
        @endif
    </label>
    <input class="{!! $name_parent !!}__formRow__input"
           type="{!! $type ?? 'text' !!}"
           value="{{ old($field_name, $value ?? '') }}"
           name="{!! $field_name !!}"
           id="{!! $field_name !!}"
           placeholder="{!! $placeholder ?? '' !!}"
        {!! $required ?? '' !!} {!! $attributes !!}>

    @error($field_name)
        <p class="error">
            {{ $message }}
        </p>
    @enderror
</div>
