<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

class CreateEvent extends Component
{
    public $name;
    public $starts;
    public $ends;
    public $location;
    public $description;

    protected $rules = [
        'name' => 'required|string',
        'starts' => 'required|date',
        'ends' => 'required|date',
        'location' => 'string',
        'description' => 'required|string',
    ];

    public function save () {
        $this->validate();
        Event::create([
            'user_id' => Auth::id(),
            'name' =>$this->name,
            'from' =>$this->starts,
            'due' =>$this->ends,
            'location' =>$this->location,
            'description' =>$this->description,
        ]);

        $this->reset();

        session()->flash('success', 'Event Created!');

        return redirect()->route('tasks');
    }
    
    #[Layout('components.layouts.user-layout')]
    public function render()
    {
        return view('livewire.create-event');
    }
}
