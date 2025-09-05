<?php

namespace App\Livewire;

use App\Models\Memo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FavouritesComponent extends Component
{

    public function removeFavourite (Memo $memo) {
        $memo->is_favourite = 0;
        $memo->save();
    }

    public function render()
    {
        $memos = Memo::where('user_id', Auth::id())
                     ->where('is_favourite', 1)
                     ->latest()
                     ->get();
        return view('livewire.favourites-component',compact('memos'));
    }
}
