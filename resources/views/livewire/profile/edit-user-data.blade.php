<x-card class="p-4">
    <x-slot name="title">
        Edit your data
    </x-slot>

    @if (session()->has('message'))
        <div class="px-4 py-2 bg-lime-100 rounded">
            {{ session('message') }}
        </div>
    @endif

    <div
            class="space-y-4"
    >
        @csrf

        <x-pwablui::form.row>
            <x-pwablui::form.label for="username">Username</x-pwablui::form.label>
            <x-pwablui::form.text
                    id="username"
                    name="username"
                    type="text"
                    placeholder=""
                    wire:model.defer="user.username"
            />
        </x-pwablui::form.row>

        <x-pwablui::form.row>
            <x-pwablui::form.label for="email">Email</x-pwablui::form.label>
            <x-pwablui::form.text
                    id="email"
                    name="email"
                    type="text"
                    placeholder=""
                    wire:model.defer="user.email"
            />
        </x-pwablui::form.row>


        <div class="flex justify-between">

            <x-pwablui::form.button
                    variant="secondary"
                    wire:click.prevent="logout"
            >
                Logout
            </x-pwablui::form.button>

            <x-pwablui::form.button
                wire:click.prevent="save"
            >
                Save
            </x-pwablui::form.button>

        </div>

    </div>
</x-card>