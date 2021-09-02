<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('/uploads/header-logo.png') }}" class="logo" alt="Argo Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
