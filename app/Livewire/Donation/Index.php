<?php

namespace App\Livewire\Donation;

use App\Models\Donation;
use Livewire\Component;

class Index extends Component
{
    public $donations;
    public $current = 'all';

    public function mount()
    {
        $this->donations = Donation::all();
    }

    public function filterCompleted()
    {
        $this->donations =  Donation::where('completed', true)->latest()->get();
    }

    public function filterUncompleted()
    {
        $this->donations =  Donation::where('completed', false)->latest()->get();
    }

    public function filterAll()
    {
        $this->donations =  Donation::latest()->get();
    }

    public function render()
    {
        return view('donation.index');
    }
}
