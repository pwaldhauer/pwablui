<div x-data="{ focusedOption: '', labelVisible: true }" class="{{ $cssClass }}">

    @if($this->multiple)
        <div x-ref="label">
            <ul class="flex gap-2 mb-4">
                @foreach($selections as $arr)
                    <li
                            class="py-1 px-4 bg-primary-400/30 rounded-xl text-sm cursor-pointer"
                            x-on:click.prevent="$wire.call('remove', '{{ $arr['id'] }}')"
                    >
                        {{ $arr['label'] }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="relative">
        <span
                x-show="labelVisible"
                x-on:click="labelVisible = false; $refs.input.focus();"
                class="absolute top-0 left-0 w-full h-full bg-white block text-md text-gray-600 px-2 py-2 border rounded"
        >
            {{isset($selections[0]) ? $selections[0]['label'] : '' }}
        </span>


        <x-pwablui::form.text
                x-ref="input"
                wire:model="search"
                class="outline-0"
                placeholder="Search..."
                x-on:focus="labelVisible = false"
                x-on:blur="labelVisible = true"
                x-on:keydown.enter.stop.prevent="labelVisible = true; focusedOption ? $wire.call('select', focusedOption.dataset.id, focusedOption.innerText) : $wire.call('selectNonExisting')"
                x-on:keydown.arrow-up.stop.prevent="focusedOption = focusedOption ? focusedOption.previousElementSibling : $refs.list.lastElementChild"
                x-on:keydown.arrow-down.stop.prevent="focusedOption = focusedOption ? focusedOption.nextElementSibling : $refs.list.firstElementChild"
                x-on:keydown.tab="{{ $sendTabEvent ? 'event.preventDefault(); $wire.emit(\'autocomplete:tab\')' : '' }}"
        />
    </div>


    @if (filled($this->results))
        <ul class="bg-white border-2 border-t-0 rounded-b-lg py-2" x-ref="list">
            @foreach ($this->results as $result)
                <li data-id="{{ $result->id }}" class="px-2 py-2 hover:bg-blue-600 hover:text-white cursor-pointer"
                    x-on:click.stop.prevent="labelVisible = true; $wire.call('select', {{ $result->id }}, '{{ $result->name }}');"
                    :class="{ 'text-white bg-blue-600': $el === focusedOption, 'text-gray-900': $el !== focusedOption }">
                    {{ $result->name }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
