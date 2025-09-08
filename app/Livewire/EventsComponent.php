<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EventsComponent extends Component
{
    public $searchTerm;
    public $name;
    public $location;
    public $description;
    public $is_favourite;
    public $status;

    public function delete (Event $event) {
       $event -> delete();
       session()->flash('success', 'Event Deleted');
    }

    public function create () {

    }

    public function edit () {

    }


    public function toggleFavourite (Event $event) {
        $event->is_favourite =! $event->is_favourite;
        $event->save();
    }

    public function render()
    {
        $events = Event::where('user_id', Auth::id())
                        ->where('name', 'LIKE', '%'.$this->searchTerm.'%')
                        ->orderBy('created_at', 'DESC')
                        ->paginate(10);

        return view('livewire.events-component',compact('events'));
    }
}
