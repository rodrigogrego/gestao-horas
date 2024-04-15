@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://img.dortech-group.com/LOGO3DX1.png" class="logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
