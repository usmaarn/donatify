<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $donations = [];

    public function mount()
    {
        $this->donations = auth()->user()->donations;
    }
    public function render()
    {
        return view('dashboard');
    }
}
