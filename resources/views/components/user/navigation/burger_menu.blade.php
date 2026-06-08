@props(['name_parent'])

<div class="{!! $name_parent !!}__burger">
    <input class="{!! $name_parent !!}__burger__input nav__check" type="checkbox" id="menu-toggle">
    <label class="{!! $name_parent !!}__burger__label nav__toggle" for="menu-toggle">
        <svg class="{!! $name_parent !!}__burger__label__svg" width="30" height="30" viewBox="0 0 40 40" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <path class="{!! $name_parent !!}__burger__label__svg__path" d="M6.25 9.30469H35.75" stroke-width="2"></path>
            <path class="{!! $name_parent !!}__burger__label__svg__path" d="M6.25 18.554H35.75" stroke-width="2"></path>
            <path class="{!! $name_parent !!}__burger__label__svg__path" d="M6.25 27.8047H35.75" stroke-width="2"></path>
        </svg>
    </label>


    <x-user.navigation.list.list-burger name_parent="{!! $name_parent !!}__burger__container" li_class="burger_link"/>
</div>
