<?php

namespace App\Livewire\Donation;

use App\Models\Donation;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;

    #[Rule('required|string|min:10|max:100|unique:'. Donation::class)]
    public $title;
    #[Rule('required|string|min:50|max:255')]
    public $summary;
    #[Rule('required|string|min:255')]
    public $description;
    #[Rule('required|integer|min:1000|max:999999999')]
    public $target;

    #[Rule('nullable|image:png,jpg,jpeg|max:2048')]
    public $thumbnail;

    public function create()
    {
        $this->validate();

        $donation = new Donation();
        $donation->title = $this->title;
        $donation->summary = $this->summary;
        $donation->description = $this->description;
        $donation->target = $this->target;
        $donation->user_id = auth()->id();
        $donation->thumbnail = $this->thumbnail->storeAs('public/thumbnails', str_replace(' ', '_', $this->title) . '.png');

        $donation->save();

        return $this->redirect(route('donations.all'));
    }

    public function render()
    {
        return view('donation.create');
    }
}
