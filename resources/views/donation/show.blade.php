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

    <div class="">

        <h1>Donors</h1>

        <div class="">

        </div>
    </div>

</div>
