<?php

namespace App\Livewire;

use App\Models\Memo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MemoComponent extends Component
{
    public $searchTerm;
    public $memoId, $title, $info;
    public $is_favourite;    

    public function delete (Memo $memo) {
        $memo->delete();

        session()->flash('success', 'Memo Deleted');
    }

    public function setMemo (Memo $memo) {
        $this->memoId = $memo->id;
        $this->title = $memo->title;
        $this->info = $memo->info;
    }


    public function edit (Memo $memo) {
        $this->validate([
            'title' => 'required|string',
            'info' => 'nullable|string',
        ]);

        $memo->update([
            'title' => $this->title,
            'info' => $this->info,
        ]);

        session()->flash('success', 'Memo Updated!');
    }

    public function toggleFavourite (Memo $memo) {
        $memo->is_favourite =! $memo->is_favourite;
        $memo->save();
    }

    public function render()
    {
        $memos = Memo::where('user_id', Auth::id())
                    ->where(function ($query){
                        $query->where('title', 'LIKE', '%'.$this->searchTerm.'%')
                              ->orWhere('info', 'LIKE', '%'.$this->searchTerm.'%');
                        })
                     ->latest()
                     ->get();
        return view('livewire.memo-component',compact('memos'));
    }
}
