<div
    class="flex flex-wrap w-full lg:w-8/12 max-w-3xl lg:h-full m-auto py-4 lg:py-0 items-center justify-center gap-8">
    <img src="/img/cat.png" class="block w-8/12 lg:w-5/12 aspect-square"/>

    <div class="w-10/12 md:w-6/12 lg:w-6/12 space-y-8">
        <h1 class="font-bold text-3xl text-center lg:text-left lg:text-6xl">{{ config('app.name') }}</h1>
        <div class="rounded-lg p-4 bg-white shadow w-full">
            <form action="{{ route('login.auth') }}" method="post" class="space-y-6">

                <x-pwablui::form.row>
                    <x-pwablui::form.label for="username">Username</x-pwablui::form.label>
                    <x-pwablui::form.text id="username" name="username" type="text" placeholder=""/>
                </x-pwablui::form.row>

                <x-pwablui::form.row>
                    <x-pwablui::form.label for="password">Password</x-pwablui::form.label>
                    <x-pwablui::form.text name="password" type="password" placeholder=""/>
                </x-pwablui::form.row>

                @csrf

                <x-pwablui::form.row>
                    <x-pwablui::form.button variant="primary" class="w-full bg-primary-600 text-center">Log in
                    </x-pwablui::form.button>
                </x-pwablui::form.row>
                <x-pwablui::form.row>
                    <x-pwablui::form.passkey-button />
                </x-pwablui::form.row>
            </form>
        </div>
    </div>



</div>
