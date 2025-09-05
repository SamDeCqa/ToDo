<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RecentsComponent extends Component
{

    public function toggleFavourite (Event $event) {
        $event->is_favourite =! $event->is_favourite;
        $event->save();
    }

    public function render()
    {
        $events = Event::where('user_id', Auth::id())
                        ->latest()
                        ->limit(4)
                        ->get();

        $memos = Memo::where('user_id', Auth::id())
                        ->latest()
                        ->limit(4)
                        ->get();
        return view('livewire.recents-component',compact('events','memos'));
    }
}
