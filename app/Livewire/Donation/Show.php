<?php

namespace App\Livewire\Donation;

use App\Models\Donation;
use App\Models\donations;
use Livewire\Component;

class Show extends Component
{
    public $donation;

    public function mount(Donation $donation){
        $this->donation = $donation;
    }

    public function render()
    {
        return view('donation.show');
    }
}
