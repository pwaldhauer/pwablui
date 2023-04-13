<x-card class="p-4">
    <x-slot name="title">
        Manage your API keys
    </x-slot>

    @if (session()->has('message'))
        <div class="px-4 py-2 bg-lime-100 rounded">
            {{ session('message') }}
        </div>
    @endif

    @foreach(auth()->user()->tokens as $token)

        <li class="flex py-4">
            API key created at {{ $token->created_at }}

            <x-pwablui::form.button
                    class="ml-auto"
                    type="secondary"
                    size="small"
                    wire:click.prevent="deleteApiKey({{ $token->id }})"
            >
                Remove key
            </x-pwablui::form.button>
        </li>
    @endforeach

    <x-pwablui::form.button
            type="primary"
            wire:click.prevent="createApiKey()"
    >
        Create new API key
    </x-pwablui::form.button>

</x-card>