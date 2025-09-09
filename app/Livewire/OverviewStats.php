<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OverviewStats extends Component
{


    public function render()
    {
        $completedEvents = Event::where('user_id', Auth::id())
                                ->where('is_completed', true)
                                ->count();
        $allEvents = Event::where('user_id', Auth::id())
                                ->count();
        $futureEvents = Event::where('user_id', Auth::id())
                            ->whereDate('due', '>=', today() )
                            ->count();
        $memos = Memo::where('user_id', Auth::id())
                            ->count();
                            
        return view('livewire.overview-stats',compact('completedEvents','allEvents','futureEvents', 'memos'));
    }
}
