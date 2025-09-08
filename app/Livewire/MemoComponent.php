<?php

namespace App\Livewire;

use App\Models\Memo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MemoComponent extends Component
{
    public $searchTerm;
    public $title;
    public $info;
    public $is_favourite;    

    public function delete (Memo $memo) {
        $memo->delete();

        session()->flash('success', 'Memo Deleted');
    }

    public function create () {
        
    }


    public function edit () {

    }

    public function toggleFavourite (Memo $memo) {
        $memo->is_favourite =! $memo->is_favourite;
        $memo->save();
    }

    public function render()
    {
        $memos = Memo::where('user_id', Auth::id())
                    ->where('title', 'LIKE', '%'.$this->searchTerm.'%')
                     ->latest()
                     ->get();
        return view('livewire.memo-component',compact('memos'));
    }
}
