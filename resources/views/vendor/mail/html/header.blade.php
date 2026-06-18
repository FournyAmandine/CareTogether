@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="../../../../images/svg/logo-header.svg" class="logo" alt="CareTogether">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
