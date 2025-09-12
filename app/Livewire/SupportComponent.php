<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class SupportComponent extends Component
{

   #[Layout('components.layouts.user-layout')]
    public function render()
    {
        return view('livewire.support-component');
    }
}
