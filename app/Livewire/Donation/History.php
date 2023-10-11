<?php

namespace App\Livewire\Donation;

use Livewire\Component;

class History extends Component
{
    public $donations;

    public function mount()
    {
        $this->donations = auth()->user()->transactions;
    }
    public function render()
    {
        return view('donation.history');
    }
}
