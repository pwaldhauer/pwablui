@props(['size' => 'full'])
<input
        @class([
            'block text-md text-gray-600 px-2 py-2 border rounded',
            'w-full' => $size === 'full',
            'w-10' => $size === 'small',
        ])

        {{ $attributes }}
/>
