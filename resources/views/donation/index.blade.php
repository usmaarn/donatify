

    <div class="max-w-7xl mx-auto mt-16">

        <div class="flex items-center justify-between">
            <h1 class="text-xl capitalize font-semibold">Fund Raisers near you</h1>
            <div class="flex items-center gap-5 text-sm">
                <button class=" py-2 px-5 capitalize border rounded {{ $current }}"
                        wire:click="filterAll">All</button>
                <button class="py-2 px-5 capitalize border rounded" wire:click="filterUncompleted">Uncompleted</button>
                <button class="py-2 px-5 capitalize border rounded" wire:click="filterCompleted">completed</button>
            </div>
        </div>

        <div class="grid grid-cols-4 gap-5 mt-10">
            @foreach($donations as $donation)

                @php
                    $percent = ceil(($donation->realised * 100) / $donation->target);
                @endphp

                <div class="relative">

                    @if($donation->completed)
                        <span class="absolute top-5 right-5 p-1 rounded bg-white text-red-500 text-xs uppercase font-medium">
                            completed</span>
                    @endif

                    <a href="{{ route('donations.show', ['donation' => $donation->id]) }}"
                        class="block hover:bg-zinc-100 transition duration-300 rounded-xl p-2">

                        <img class="object-cover w-full h-36 rounded-xl" src="{{ $donation->thumbnail() }}" alt="{{ $donation->title }}">

                        <div class="p-3 space-y-3">

                            <h3 class=" font-medium leading-5 text-zinc-600 hover:text-green-600 capitalize hover:underline">
                                {{$donation->title}}
                            </h3>

                            <p class="text-zinc-400 text-sm">{{str($donation->summary)->limit(50)}}</p>

                            <div class="w-full h-1 rounded overflow-hidden bg-zinc-200">
                                <div class="h-full bg-green-500 text-sm text-center leading-5"
                                     style="width: {{$percent}}%;"></div>
                            </div>

                            <div class="text-sm">
                                <p class="font-bold">
                                    ${{number_format($donation->realised)}} raised
                                    <span class="inline-block mx-2 text-zinc-400">of</span>
                                    ${{number_format($donation->target)}}
                                </p>
                                <p class="font-semibold text-zinc-500 capitalize">
                                    - <span class="ml-1">1,600 donations</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
