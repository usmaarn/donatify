<div class="">
    <h1>{{$donation->title}}</h1>

    <div class="">
        <img src="{{ $donation->thumbnail() }}" alt="{{ $donation->title}}" />
    </div>

    <p>{{ $donation->user->name }} is organizing this fundraiser.</p>

    <p>{{ $donation->description }}</p>

    <div class="flex items-center gap-5">
        <a href="{{ route('donations.donate', ['donation' => $donation->id]) }}"
           class="px-5 py-3 rounded-lg bg-amber-500">Donate</a>
        <button>Share</button>
    </div>

</div>
