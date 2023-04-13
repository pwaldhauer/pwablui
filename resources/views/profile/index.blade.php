<x-layout>

    <div class="space-y-8">

        <h4 class="text-4xl">User profile</h4>

        @foreach($sections as $section)

            @livewire($section)

        @endforeach


    </div>

</x-layout>

