<?php

namespace App\Livewire;

use App\Models\Memo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

class CreateMemo extends Component
{
    public $title;
    public $info;

    protected $rules = [
        'info' => 'required',
    ];

    public function save () {
        $this->validate();
        Memo::create([
            'user_id' => Auth::id(),
            'title' =>$this->title,
            'info' =>$this->info,
        ]);

        $this->reset();

        session()->flash('success', 'Memo Created!');

        return redirect()->route('tasks');
    }

    public function back() {
        return redirect()->route('tasks');
    }


    #[Layout('components.layouts.user-layout')]
    public function render()
    {
        return view('livewire.create-memo');
    }
}
