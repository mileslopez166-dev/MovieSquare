@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'auth-alert auth-alert-success']) }}>
        {{ $status }}
    </div>
@endif
