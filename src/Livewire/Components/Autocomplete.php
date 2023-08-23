<?php

namespace PwaBlui\Livewire\Components;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Livewire\Component;

class Autocomplete extends Component
{


    public string $cssClass = '';

    public string $class = '';

    public bool $multiple = false;

    public string $name = '';

    public string $search = '';

    public string $label = '';

    public array $value = [];

    public array $selections = [];

    public bool $sendTabEvent = false;


    public function mount()
    {
        $this->selections = Arr::map($this->value, fn($id) => [
            'id' => $id,
            'label' => $this->class::find($id)->name
        ]);
    }

    public function getResultsProperty()
    {
        if (empty($this->search)) {
            return [];
        }

        $query = $this->class::query();
        $query->where('name', 'like', '%' . $this->search . '%');
        $query->limit(15);

        return $query->get();
    }

    public function selectNonExisting()
    {
        $tag = $this->class::create([
            'name' => $this->search,
            'slug' => Str::slug($this->search)
        ]);

        $this->select($tag->id, $tag->name);
    }

    public function select($id, $label)
    {
        $selection = ['id' => $id, 'label' => $label];

        if ($this->multiple) {
            $this->selections[] = $selection;
        } else {
            $this->selections[0] = $selection;
        }

        $this->search = '';

        $this->emit('autocomplete:selection', ['name' => $this->name, 'values' => Arr::pluck($this->selections, 'id')]);
    }

    public function remove(int $id)
    {
        $this->selections = Arr::where($this->selections, fn($selection) => $selection['id'] !== $id);

        $this->emit('autocomplete:selection', ['name' => $this->name, 'values' => Arr::pluck($this->selections, 'id')]);
    }

    public function render()
    {
        return view('pwablui::livewire.components.autocomplete');
    }
}
