<?php

namespace App\Livewire\Donation;

use App\Models\Donation;
use Livewire\Component;

class Index extends Component
{
    public $donations;

    public function mount()
    {
        $this->donations = Donation::all();

        dd($this->donations);
    }

    public function render()
    {
        return view('donation.index');
    }
}
