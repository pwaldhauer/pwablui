@props(['active' => false, 'variant' => 'primary', 'size' => 'default', 'class' => '', 'href' => ''])

@php
    $classes = [
            'rounded tracking-wide flex items-center justify-center gap-2',
            'bg-primary-500 hover:bg-primary-600 text-white' => $variant === 'primary',
            'text-xs py-1 px-3' => $size === 'small',
            'text-sm py-2 px-6' => $size === 'default',
            'border-2 bg-white border-primary-300 hover:bg-primary-50 text-primary-300' => $variant === 'secondary',
            'bg-red-500 hover:bg-red-600 text-white' => $variant === 'danger',
            'ring-2 ring-primary-900' => $active,
            $class,
        ];

@endphp

@if(filled($href))
    <a
        href="{{ $href }}"
        {{ $attributes }}
        @class($classes)
    >
        {{ $slot }}
    </a>
@else
    <button
        {{ $attributes }}
        @class($classes)
    >
        <x-ri-arrow-down-line
            @class([
                'w-5 h-5 ' => $size === 'default',
                'w-3 h-3 ' => $size === 'small',
                'hidden group-[.is-loading]:block animate-spin transition-all'
            ])
        />

        {{ $slot }}
    </button>
@endif
