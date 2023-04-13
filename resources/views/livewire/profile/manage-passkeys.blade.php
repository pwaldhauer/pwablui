<x-card class="p-4">
    <x-slot name="title">
        Manage your Passkeys
    </x-slot>

    @foreach(auth()->user()->webAuthnCredentials as $credential)

        <li class="flex py-4">
            Passkey created at {{ $credential->created_at }}

            <x-pwablui::form.button
                    class="ml-auto"
                    type="secondary"
                    size="small"
                    wire:click.prevent="deletePasskey({{ $credential->id }})"
            >
                Remove credential
            </x-pwablui::form.button>
        </li>
    @endforeach

    <x-pwablui::form.button
            type="primary"
            onclick="register(event)"
    >
        Register new Passkey
    </x-pwablui::form.button>
    <!-- Registering credentials -->
    <script>
        const register = event => {
            event.preventDefault()

            new WebAuthn().register()
                .then(response => alert('Registration successful!'))
                .catch(error => alert('Something went wrong, try again!'))
        }

    </script>
</x-card>