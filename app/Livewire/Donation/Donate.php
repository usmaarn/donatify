<?php

namespace App\Livewire\Donation;

use App\Models\Donation;
use App\Models\Transaction;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Donate extends Component
{

    public $donation;

    #[Rule('required|numeric|min:1')]
    public $amount;
    #[Rule('required|email')]
    public $email;
    #[Rule('nullable|string')]
    public $name;
    public $reference_id;


    #[On('donate')]
    public function donate()
    {
        $this->validate();
        $ref = 'DTY-' .bin2hex(random_bytes(10));
        $this->dispatch('pay', [
           'ref' => $ref,
           'amount' => $this->amount,
            'email' => $this->email,
        ]);
    }

    public function mount(Donation $donation)
    {
        $this->donation = $donation;
        $this->amount = 1000;
        $this->email = auth()->user() ? auth()->user()->email : '';
    }

    #[On('verifyPayment')]
    public function verifyPayment($ref)
    {
        $response = \Http::withToken('sk_test_d83b6da38e956ce931472430a0dcbe41574b48de')
            ->get("https://api.paystack.co/transaction/verify/$ref");
        $res = $response->object()->data;

        if ($res->status === 'success') {
            $this->donation->realised += $res->amount/100;
            $this->donation->save();

            $this->donation->completed = $this->donation->realised >= $this->donation->target;
            $this->donation->save();

            $this->donation->transactions()->create([
                'user_id' => auth()->id() ? auth()->id() : null,
                'donor' =>  $this->name ?? 'Anonymous',
                'email' => $this->email ?? null,
                'amount' => $res->amount/100,
                'ref' => $res->reference
            ]);

            return redirect(route('donations.all'));
        }

        $this->addError('payment_error', "Payment Not Successful..");
    }

    public function render()
    {
        return view('donation.donate');
    }
}
