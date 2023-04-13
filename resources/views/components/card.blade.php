<div {{ $attributes->merge(['class' => 'shadow rounded-lg bg-white']) }}>
    @if(isset($title))
        <div class="bg-gray-50 -m-4 px-4 py-2 rounded-t-lg mb-4">
            <h3 class="text-lg font-bold">{{ $title }}</h3>
        </div>
    @endif


    {{ $slot }}
</div>
