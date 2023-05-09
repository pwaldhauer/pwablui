<x-pwablui::form.button
    variant="secondary"
    class="w-full bg-primary-600 text-center"
    x-data="passKeys()"
    x-on:click.prevent="login('{{ route('home') }}')"
>
    <x-heroicon-m-key class="w-5 h-5"/>

    Use Passkey
</x-pwablui::form.button>
