<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EventsComponent extends Component
{
    public $searchTerm;
    public $eventId, $name, $from, $due, $location, $description, $is_favourite;
    public $status;

    protected $rules = [
            'name' => 'required|string',
            'location' => 'required|string',
            'description' => 'nullable|string',
            'from' => 'required|date|after_or_equal:today',
            'due' => 'required|date|after_or_equal:from',
    ];

    public function delete (Event $event) {
       $event -> delete();
       session()->flash('success', 'Event Deleted');
    }

    public function setEvent($id)
    {
        $event = Event::findOrFail($id);

        $this->eventId = $event->id;
        $this->name = $event->name;
        $this->location = $event->location;
        $this->from = $event->from->format('Y-m-d\TH:i'); // so datetime-local works
        $this->due = $event->due->format('Y-m-d\TH:i');
        $this->description = $event->description;
    }

    public function edit (Event $event) {
        try{
        $this->validate();
        $event->update([
            'name' => $this->name,
            'location' => $this->location,
            'description' => $this->description,
            'from' => $this->from,
            'due' => $this->due,
        ]);
        session()->flash('success', 'Event Updated!');
        } catch (\Exception $e) {
        session()->flash('error', 'An error occurred while updating the event: ' . $e->getMessage());
     }
    }


    public function toggleFavourite (Event $event) {
        $event->is_favourite =! $event->is_favourite;
        $event->save();
    }

    public function render()
    {

        $events = Event::where('user_id', Auth::id())
                        ->where(function ($query){
                            $query->where('name', 'LIKE', '%'.$this->searchTerm.'%')
                            ->orWhere('location', 'LIKE', '%'.$this->searchTerm.'%')
                            ->orWhere('from', 'LIKE', '%'.$this->searchTerm.'%');
                        })
                        ->orderBy('created_at', 'DESC')
                        ->paginate(10);

        return view('livewire.events-component',compact('events'));
    }
}
