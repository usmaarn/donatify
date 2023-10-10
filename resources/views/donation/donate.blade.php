<div class="max-w-2xl bg-zinc-100 rounded-xl p-5 mx-auto space-y-5">
    <div class="flex items-center gap-3">
        <img src="{{ $donation->thumbnail() }}" class="w-20" alt="" />
        <h1 class="text-sm">
            You are supporting
            <span class="font-semibold">
            {{ $donation->title }}
        </span>
        </h1>
    </div>

    <div class="space-y-5" id="paymentForm">
        <div>
            <label for="amount" class="block font-bold capitalize">Enter your donation</label>
            <input type="number" value="1000.00" wire:model="amount"
                   class="text-4xl font-bold rounded-xl border-zinc-300 w-full text-right py-3 px-5">
        </div>

        <hr class="border-zinc-300">

        <div class="">
            <label for="amount" class="block font-bold capitalize">payment method</label>
        </div>

        <button wire:click="dispatch('donate')">Pay Now</button>


    </div>
        <script>

            document.addEventListener('livewire:initialized', () => {
                @this.on('pay', (event) => {

                    let [data] = event;

                    let handler = PaystackPop.setup({
                        key: 'pk_test_57104082aaa74faf3153e0fd92cf8d2e4705b31b',
                        email: data.email,
                        amount: data.amount * 100,
                        currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
                        ref: data.ref, // Replace with a reference you generated
                        callback: function(response) {
                            @this.dispatchSelf('verifyPayment', {'ref': response.reference})
                        },
                        onClose: function() {
                            @this.dispatchSelf('verifyPayment', {'ref': 'response.reference'})
                        },
                    });

                    handler.openIframe();
                });
            })
        </script>
</div>
