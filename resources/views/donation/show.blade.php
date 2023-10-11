<div class="space-y-10">
    <h1 class="text-4xl font-medium capitalize ">{{$donation->title}}</h1>

    <div class="h-[500px] p-5">
        <img src="{{ $donation->thumbnail() }}" alt="{{ $donation->title}}" class="h-full w-full object-cover" />
    </div>

    <p class="capitalize text-zinc-500">{{ $donation->user->name }} is organizing this fundraiser.</p>

    <p class="text-lg tracking-wide leading-8">{{ $donation->description }}</p>

    @if(! $donation->completed)
        <div class="flex items-center gap-5">
            <a href="{{ route('donations.donate', ['donation' => $donation->id]) }}"
               class="px-5 py-3 rounded-lg bg-amber-500">Donate</a>
            <button>Share</button>
        </div>
    @endif

    <div class="bg-zinc-50 shadow p-5 mb-20">

        <h1 class="text-xl font-bold">Donors</h1>

        <ul class="space-y-3 mt-5">
            @forelse($donation->transactions as $transaction)
                <li class="flex gap-2 py-3 border-y ">
                    <span class="font-bold">{{$transaction->donor}}</span>
                   donated <p>${{ number_format($transaction->amount) }}</p>
                </li>
            @empty
                <li class="">No Donors yet, be the first to donate to this course</li>
            @endforelse
        </ul>
    </div>

</div>
