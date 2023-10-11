<?php

namespace App\Livewire;

use App\Models\Donation;
use Livewire\Component;

class Dashboard extends Component
{
    public $donations = [];

    public function mount()
    {
        $this->donations = auth()->user()->donations;
    }

    public function filterCompleted()
    {
        $this->donations =  auth()->user()->donations()->where('completed', true)->latest()->get();
    }

    public function filterUncompleted()
    {
        $this->donations = auth()->user()->donations()->where('completed', false)->latest()->get();
    }

    public function filterAll()
    {
        $this->donations =  auth()->user()->donations()->latest()->get();
    }

    public function render()
    {
        return view('dashboard');
    }
}
